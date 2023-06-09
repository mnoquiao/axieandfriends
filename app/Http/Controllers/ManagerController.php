<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Iluunimate\Http\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Str;
use Carbon\Carbon;

class ManagerController extends Controller
{


    // change currency of the current manager
    public function change_currency(Request $request)
    {

        // manage must already have a valid session
        if ( null !== session('manager_uniqid') ) {

            // To Do: add validation to the passed currency code and symbol
            $currency_code      = $request->__cc;
            $currency_symbol    = $request->__cs;
            
            DB::table('managers')
            ->where([
                ['unique_id', session('manager_uniqid')]
            ])
            ->update([
                'currency_code'     => $currency_code,
                'currency_Symbol'   => $currency_symbol
            ]);

            // update currency code and symbol sessions
            session([
                'currency_code'                 => $currency_code,
                'currency_symbol'               => $currency_symbol,
                'selected_currency_display'     => sprintf('%s %s', $currency_symbol, strtoupper($currency_code)),
            ]);

            return true;

        }

    }



    // changes current set timezone of the manager
    public function change_timezone(Request $request)
    {

        // manage must already have a valid session
        if (null !== session('manager_uniqid')) {

            // To Do: add validation to the passed currency code and symbol
            $timezone_id        = $request->__tzi;

            DB::table('managers')
                ->where([
                    ['unique_id', session('manager_uniqid')]
                ])
                ->update([
                    'timezone_id'           => $timezone_id,
                ]);

            // update timezone session
            session([
                'timezone_id'                 => $timezone_id,
                'selected_timezone_id'        => $timezone_id,
            ]);

            return true;

        }
    }



    // this will handle manager's session with existing localStorage id but already lost it's laravel session
    public function is_manager_session(Request $request) 
    {
        
        // set sorting value if present on user's local storage
        if ( !empty($request->sort_by) ) {

            // $this->sort_by($request->sortBy);

        }

        if ( null === session('manager_uniqid') ) {

            $manager_unique_id = $request->muid;

            $manager    = DB::table('managers')
                        ->where('unique_id', $manager_unique_id)
                        ->select([
                            'id',
                            'unique_id',
                            'currency_code',
                            'currency_symbol',
                            'timezone_id',
                        ])
                        ->first();
                 
            if (null == $manager) {
                abort(404);
            }
            else {

                // create session of manager's unique id / id
                session([
                    'manager_id'                                => $manager->id,
                    'manager_uniqid'                            => $manager->unique_id,
                    'currency_code'                             => $manager->currency_code,
                    'currency_symbol'                           => $manager->currency_symbol,
                    'selected_currency_display'                 => sprintf('%s %s', $manager->currency_symbol, strtoupper($manager->currency_code)),
                    'timezone_id'                               => $manager->timezone_id,
                    'selected_timezone_id'                      => $manager->timezone_id,
                ]);   

                $data = [   
                        'redirect'  => true,
                        'uniq'      => $manager->unique_id,
                        'url'       => route('fetch_manager', ['unique_id' => $manager->unique_id])
                    ];
                
            }


        }
        else {

            $data = ['sess_id' => session('manager_uniqid')];
            
        }

        return $data;

    }



    //
    public function fetch_manager($unique_id)
    {

        // check for manager's session
        // visitor has no existing session of a manager
        if ( null === session('manager_uniqid') ) {

            $manager_unique_id = $unique_id;

            $manager    = DB::table('managers')
                        ->where('unique_id', $manager_unique_id)
                        ->select([
                            'id',
                            'unique_id',
                            'currency_code',
                            'currency_symbol',
                            'timezone_id',
                            'total_scholars',
                            'custom_slp_plus_market',
                            'custom_slp_minus_market',
                            'custom_slp_custom',
                            'visited'
                        ])
                        ->first();

            if (null == $manager) {
                abort(404);
            }
            else {

                // create session of manager's unique id / id
                session([
                    'manager_id'                                => $manager->id,
                    'manager_uniqid'                            => $manager->unique_id,
                    'total_scholars'                            => $manager->total_scholars,
                    'currency_code'                             => $manager->currency_code,
                    'currency_symbol'                           => $manager->currency_symbol,
                    'selected_currency_display'                 => sprintf('%s %s', $manager->currency_symbol, strtoupper($manager->currency_code)),
                    'timezone_id'                               => $manager->timezone_id,
                    'selected_timezone_id'                      => $manager->timezone_id,
                    'sess_slp_custom_price'                     => (($manager->custom_slp_plus_market !== null || $manager->custom_slp_minus_market !== null) ? floatval($manager->custom_slp_plus_market) - floatval($manager->custom_slp_minus_market) : (($manager->custom_slp_custom !== null) ? floatval($manager->custom_slp_custom) : null)),
                ]);   

            }

        }
        else {
            
            // manager has an existing session id opening another manager's record
            // change session related data
            if ($unique_id !== session('manager_uniqid')) {
                
                $manager_unique_id = $unique_id;

                $manager    = DB::table('managers')
                            ->where('unique_id', $manager_unique_id)
                            ->select([
                                'id',
                                'unique_id',
                                'currency_code',
                                'currency_symbol',
                                'timezone_id',
                                'total_scholars',
                                'custom_slp_plus_market',
                                'custom_slp_minus_market',
                                'custom_slp_custom',
                                'visited'
                            ])
                            ->first();
 
                if ( null == $manager ) {
                    abort(404);
                }
                else {

                    // create session of manager's unique id / id
                    session([
                        'manager_id'                                => $manager->id,
                        'manager_uniqid'                            => $manager->unique_id,
                        'total_scholars'                            => $manager->total_scholars,
                        'currency_code'                             => $manager->currency_code,
                        'currency_symbol'                           => $manager->currency_symbol,
                        'selected_currency_display'                 => sprintf('%s %s', $manager->currency_symbol, strtoupper($manager->currency_code)),
                        'timezone_id'                               => $manager->timezone_id,
                        'selected_timezone_id'                      => $manager->timezone_id,
                        'sess_slp_custom_price'                     => (($manager->custom_slp_plus_market !== null || $manager->custom_slp_minus_market !== null) ? floatval($manager->custom_slp_plus_market) - floatval($manager->custom_slp_minus_market) : (($manager->custom_slp_custom !== null) ? floatval($manager->custom_slp_custom) : null)),
                    ]);   

                }

            }

        }


        // update manager log
        DB::table('managers')
            ->where('id', session('manager_id'))
            ->update([
                'last_visit_at' => Carbon::now()->tz('Asia/Singapore'), /* <- we are using this timezone to match our DB timezone */
                'visited'       => DB::raw('visited + 1'),
            ]);

        // 
        $data    = [
                    'page_title'                => '📜 Scholar Tracker — Axie Infinity',
                    'active_page'               => 'index',
                    'canonical'                 => route('index'),
                    'description'               => 'Axie Infinity best tool for Managers to track their Scholars daily SLP farmed. Track how many Smooth Love Potion (SLP) your scholar obtained on a daily, weekly or monthly basis.',
                    'uniq_link'                 => session('manager_uniqid'),
                    'total_scholars'            => session('total_scholars'),
                    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
                    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
                ];

        return view('pages.index', $data);

    }



    // fetch single scholar
    public function fetch_scholar_single($manager_unique_id, $scho_id)
    {


        $set_currency_code      = 'usd'; /* <-- default currency if none is set */
        $set_currency_symbol    = '$';

        // if currency is already set for the visitor
        if ( null !== session('currency_code') ) {
            $set_currency_code      = session('currency_code');
            $set_currency_symbol    = session('currency_symbol');
        }

        // check for existing manager's id
        // we should expect this for manager who already previously added an scholar
        if ( null !== session('manager_id') ) {

            $manager_id = session('manager_id');

        }
        else {

            // fresh visitor and without record yet
            if ( !isset($manager_unique_id) ) { return $data[] = ['failed' => true]; die(); }

            $manager    = DB::table('managers')
                        ->where('unique_id', $manager_unique_id)
                        ->select([
                            'id',
                            'unique_id',
                            'currency_code',
                            'currency_symbol',
                            'timezone_id'
                        ])
                        ->first();

            // create session of manager's unique id / id
            session([
                'manager_id'                => $manager->id,
                'manager_uniqid'            => $manager->unique_id,
                'currency_code'             => $manager->currency_code,
                'currency_symbol'           => $manager->currency_symbol,
                'timezone_id'               => $manager->timezone_id,
                'selected_timezone_id'      => $manager->timezone_id,
            ]);

        }

        // get all manager's scholars id
        $manager_scholar_id     = DB::table('managers_scholar')
                                ->where([
                                        ['manager_id', session('manager_id')],
                                        ['scholar_id', $scho_id]
                                    ])
                                ->select([
                                    'scholar_id'
                                ])
                                ->first();
                                
                                // select scholars of
        $scholar               = DB::table('scholars_fcvkss')
                                ->select([
                                    'scholars_fcvkss.id',
                                    'scholars_fcvkss.ronin_address',
                                    'scholars_fcvkss.mmr',
                                    'scholars_fcvkss.rank',

                                    'scholars_fcvkss.in_game_slp',
                                    'scholars_fcvkss.ronin_slp',
                                    'scholars_fcvkss.total_slp',
                                    'scholars_fcvkss.last_slp_claimed',
                                    'scholars_fcvkss.last_claimed_item_at',
                                    'scholars_fcvkss.slp_updated_on',
                                    'scholars_fcvkss.quota_hit_rate',
                                    'scholars_fcvkss.updated_at', /* shows last updated of this ronin address */

                                    'managers_scholar.scholar_name',
                                    'managers_scholar.scholar_share',
                                    'managers_scholar.investor_share',
                                    'managers_scholar.image_id',
                                    'managers_scholar.note',
                                    'managers_scholar.set_slp_quota',
                                    'managers_scholar.set_quota_frequency',
                                    'managers_scholar.created_at',
                                ])
                                ->leftJoin('managers_scholar', 'managers_scholar.scholar_id', '=', 'scholars_fcvkss.id')
                                ->where([
                                    ['scholars_fcvkss.id', $manager_scholar_id->scholar_id]
                                ])
                                ->first();


  


                                



        $scholar_creation_date  = Carbon::parse($scholar->created_at)->tz('UTC')->isoFormat('YYYY-MM-DD');
        
        $today                  = Carbon::today()->isoFormat('YYYY-MM-DD');
        $base_date              = Carbon::now()->subDays(50)->isoFormat('YYYY-MM-DD'); /* < -- 30 days from today */

        $scholar_slps       = DB::table('scholars_daily_slp')
                            ->whereDate('date', '>=', $base_date)
                            ->whereDate('date', '<=', $today)
                            ->where([
                                ['ronin_address', $scholar->ronin_address]
                            ])
                            ->select([
                                'in_game_slp',
                                'total_slp',
                                'last_claimed_slp',
                                'last_claimed_date',
                                'date'
                            ])
                            ->orderBy('date', 'DESC')
                            ->get()->toArray();

        // coin prices from coingecko
        $coin_prices = $this->coin_price();

        // slp daily array
        $slp_arr = [];

        // count total results 
        $res_count = count($scholar_slps);

        // loop daily slp of this scholar
        foreach($scholar_slps as $k => $val) {

            $pre_slp = 0;
            $prev_slp = 0;

            if ($k+1 < $res_count) {

                $pre_slp    = $val->total_slp;
                $prev_slp   = $scholar_slps[$k+1]->total_slp;
            
            }
            else {

                $pre_slp    = $val->total_slp;
                $prev_slp   = 0;

            }

            $curr_slp = $pre_slp - $prev_slp;

            // check if 
            // 1. present in_game_slp minus previous in_game_slp is negative 
            // 2. look for last_claimed_slp and last_claimed_date must be equal to date
            // = present (in_game_slp + last_claimed_slp) - previous in_game_slp

            // negative do a magic computation in the future
            if ( $curr_slp < 0 && (strftime('%Y-%m-%d', strtotime($val->last_claimed_date)) == strftime('%Y-%m-%d', strtotime($val->date))) ) {

                $curr_slp = $curr_slp + $val->last_claimed_slp;
                
            }
            else if ( $curr_slp < 0 ) {

                $curr_slp = 0; /* for now return zero */

            }

            // echo sprintf('present %s & previous %s = %s <br>', $pre_slp, $prev_slp, $curr_slp);

            // computation of QHR 
            $qhr = 0;

            if ( $scholar->set_slp_quota > 0 ) {
                $qhr = ceil(($curr_slp/$scholar->set_slp_quota) * 100);
            } 

            $slp_arr[] = [
                'slp_earnings'              => number_format($curr_slp, 0),
                'scholar_slp_share_curr'    => '≈'. $set_currency_symbol . number_format( ($coin_prices['slp'] * $curr_slp) * ($scholar->scholar_share/100), 2),
                'manager_slp_share_curr'    => '≈'. $set_currency_symbol . number_format( ($coin_prices['slp'] * $curr_slp) * ((100-$scholar->scholar_share)/100), 2),
                'scholar_slp_share'         => number_format( ($scholar->scholar_share/100) * $curr_slp , 0),
                'manager_slp_share'         => number_format( ((100-$scholar->scholar_share)/100) * $curr_slp , 0),
                'slp_last_claim'            => $val->last_claimed_slp,
                'last_claim_date'           => $val->last_claimed_date,
                'rank'                      => '-',
                'qhr'                       => $qhr,
                'date'                      => strftime('%Y-%m-%d', strtotime($val->date)),
                'created_at'                => $scholar_creation_date
            ];

        }

        // dd($slp_arr);

        // change ronin address dislay output
        $scholar->ronin_address_formatted  = substr_replace($scholar->ronin_address, '...', 14, 24);
        // 
        $data    = [
                    'page_title'                => $scholar->scholar_name . ' — Axie Infinity',
                    'active_page'               => 'scholar_single',
                    'canonical'                 => route('index'),
                    'description'               => 'Axie Infinity Managing Single Sholar, Check SLP daily and history earnings.',
                    'uniq_link'                 => session('manager_uniqid'),
                    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
                    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
                    'scholar'                   => $scholar,
                    'slp_arr'                   => $slp_arr,
                ];

        return view('pages.single_scholars', $data);

    }


    public function fetch_scholar_single_test($ronin_addr)
    {
        
        $ronin_addr_short = substr_replace($ronin_addr, '...', 23, 23);

        // 
        $data    = [
            'page_title'                => 'xx — Axie Infinity',
            'active_page'               => 'scholar_single',
            'canonical'                 => route('index'),
            'description'               => 'Axie Infinity Managing Single Sholar, Check SLP daily and history earnings.',
            'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
            'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
            'ronin_addr_short'          => $ronin_addr_short,
        ];

        return view('pages.single_scholars_test', $data);

    }




    // refresh scholar data (single)
    public function refresh_scholar_data(Request $request)
    {
        
        $data = [];
        session(['manager_id' => 48]);

        //
        if ( null !== session('manager_id'))
        {

            // create var of manager id from the session
            $manager_id = session('manager_id');
            
            // select all scholars `id` of this manager
            $scholar_ids    = DB::table('managers_scholar')
                            ->join('scholars_fcvkss', 'scholars_fcvkss.id', '=', 'managers_scholar.scholar_id')
                            ->select(
                                'scholars_fcvkss.id',
                                'scholars_fcvkss.ronin_address',
                                'scholars_fcvkss.updated_at'
                            )
                            ->where([
                                ['managers_scholar.manager_id', $manager_id],
                            ])
                            ->groupBy('scholars_fcvkss.id')
                            ->get()
                            ->toArray();
            
            if ( count($scholar_ids) > 0 ) {

                // array of curl handles
                $_multiCurl         = [];

                // fetched raw data from sky mavis
                $_results         = [];

                // multi handle
                $_mh = curl_multi_init();

                foreach ($scholar_ids as $i => $scho) {

                    // URL from which data will be fetched
                    $fetchURL         = sprintf("https://game-api.axie.technology/api/v2/%s", str_replace('ronin:', '0x', $scho->ronin_address));

                    $_multiCurl[$i]     = curl_init();

                    $headers = array(
                        "Accept: application/json",
                        "Cache-Control: no-cache"
                    );

                    curl_setopt($_multiCurl[$i], CURLOPT_URL, $fetchURL);
                    curl_setopt($_multiCurl[$i], CURLOPT_HEADER, 0);
                    // curl_setopt($_multiCurl[$i], CURLOPT_DNS_CACHE_TIMEOUT,0);
                    // curl_setopt($_multiCurl[$i], CURLOPT_FRESH_CONNECT, TRUE);
                    curl_setopt($_multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($_multiCurl[$i], CURLOPT_HTTPHEADER, $headers);
                    //for debug only!
                    curl_setopt($_multiCurl[$i], CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($_multiCurl[$i], CURLOPT_SSL_VERIFYPEER, false);

                    curl_multi_add_handle($_mh, $_multiCurl[$i]);

                }

                $_index = null;

                do {

                    // execute
                    curl_multi_exec($_mh, $_index);

                } while ($_index > 0);

                // get content and remove handles
                foreach ($_multiCurl as $k => $ch) {

                    $_results[$k] = curl_multi_getcontent($ch);

                    curl_multi_remove_handle($_mh, $ch);
                }

                // close
                curl_multi_close($_mh);

                // 
                // test dump
                dd($_results);
                // 

                $_fetched_data = [];

                foreach ($_results as $key => $resp) {

                    // code each json response
                    $response_arr                   = json_decode($resp);
                    if (empty($response_arr->success)) {

                        // skip if no ronin fetched

                    } else {
                        // construct ronin addrress format from 0xxxxxxxx to ronin:xxxxxxx
                        $ronin_address = $scholar_ids[$key]->ronin_address;

                        // will used the previously constructed ronin address at the key
                        $_fetched_data[$ronin_address]         = [
                            'mmr'                       => $response_arr->mmr,
                            'rank'                      => $response_arr->rank,
                            'total_slp'                 => $response_arr->total_slp,
                            'claimable_total'           => $response_arr->ronin_slp,
                            'last_claimed_slp'          => $response_arr->ronin_slp,
                            'last_claimed_item_at'      => $response_arr->last_claim,

                        ];
                    }
                }



                // 
                // test dump
                // var_dump($_fetched_data);die();
                // 

                $per_store_value = [];

                foreach ($_fetched_data as $ronin_addr => $property) {

                    $per_store_value[] = [
                            'ronin_address'             => $ronin_addr, 
                            'mmr'                       => $property['mmr'],
                            'rank'                      => $property['rank'],
                            'raw_total_slp'             => $property['total_slp'],
                            'raw_claimable_total'       => $property['claimable_total'],
                            'raw_last_claimed_slp'      => $property['last_claimed_slp'],
                            'raw_last_claimed_item_at'  => $property['last_claimed_item_at'],
                    ];
                
                }

                // dd($per_store_value);

                // insert raw data into logs to be process by update scholar cron
                DB::table('scholar_raw_logs')->insert($per_store_value);



                
                
                $latest_raw = DB::table('scholar_raw_logs')
                    ->select('ronin_address', DB::raw('MAX(id) as last_fetched_id'))
                    ->whereIn('ronin_address', array_column($scholar_ids, 'ronin_address'))
                    ->groupBy('ronin_address');

                $scholars = DB::table('scholar_raw_logs')
                ->select([
                    'scholar_raw_logs.ronin_address',
                    'scholar_raw_logs.mmr',
                    'scholar_raw_logs.rank',
                    'scholar_raw_logs.raw_total_slp', /* <- Total SLP Ronin/Axie Market Place + In-Game SLP */
                    'scholar_raw_logs.raw_claimable_total', /* <- SLP in Ronin/Axie Market Place */ /* to Get In-Game SLP deduct this to total_slp */
                    'scholar_raw_logs.raw_last_claimed_slp',
                    'scholar_raw_logs.raw_last_claimed_item_at',

                    'latest_posts.last_fetched_id'
                ])
                ->joinSub($latest_raw, 'latest_posts', function ($join) {
                    $join->on('scholar_raw_logs.id', '=', 'latest_posts.last_fetched_id');
                })->get();

                $updated_scholars = [];

                foreach ($scholars as $key => $value) {

                    // this is the SLP is already in Ronin/Axie Market Place account of the holder
                    $ronin_slp      = $value->raw_claimable_total ?? 0;

                    // this it he total SLP ig-game + ronin
                    $total_slp      = $value->raw_total_slp ?? 0;

                    // this is the SLP that is not yet claim (in-game)
                    $in_game_slp    = round($total_slp - $ronin_slp);

                    $updated_scholars[] = [
                        'ronin_address'         => $value->ronin_address,

                        'mmr'                   => $value->mmr,
                        'rank'                  => $value->rank,

                        'in_game_slp'           => $in_game_slp,
                        'ronin_slp'             => $ronin_slp,
                        'total_slp'             => $total_slp,

                        'last_slp_claimed'      => $value->raw_last_claimed_slp,
                        'last_claimed_item_at'  => $value->raw_last_claimed_item_at,
                    ];
                }

                // chunk data entry/update by 1000
                foreach (array_chunk($updated_scholars, 1000) as $ca) {

                    DB::table('scholars_fcvkss')->upsert($ca, 'ronin_address');

                }

                $data = [
                    'success'   => true,
                    'c'         => count($_fetched_data)
                ];

            }
            else {

                $data = [
                    'success'   => false,
                    'msg'       => 'No scholars found',
                ];

            }

        }
        else {
            $data = [
                'success' => false,
            ];
        }

        return $data;

    }
 
    
}
