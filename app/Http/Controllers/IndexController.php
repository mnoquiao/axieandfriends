<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Iluunimate\Http\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Message;
use Illuminate\Support\Collection;

class IndexController extends Controller
{


    //
    public function index(Request $request)
    {
             
        // 
        $data    = [
                    'page_title'                => '📜 Scholar Tracker — Axie Infinity',
                    'active_page'               => 'index',
                    'canonical'                 => route('index'),
                    'description'               => 'Axie Infinity best tool for Managers to track their Scholars daily SLP farmed. Track how many Smooth Love Potion (SLP) your scholar obtained on a daily, weekly or monthly basis.',
                    'uniq_link'                 => null,
                    'total_scholars'            => null,
                    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
                    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
                ];
          
                
        // visitor has no existing session of a manager
        if ( null !== session('manager_uniqid') ) {

            // return manager page
            return redirect()->route('fetch_manager', [
                'unique_id' => session('manager_uniqid') ?? null
            ]);
            
        } else {

            // return normal page
            return view('pages.index', $data);

        }

    }
    


    // create scholar or add scholar data into database
    public function add_scholar(Request $request)
    {

        // validate form input
        $validator = Validator::make($request->all(), [
            'scholarname'       => 'required|min:2|max:255',
            'roninaddr'         => 'required|regex:/^ronin:[a-fA-F0-9]{40}$/m',
            'schoshare'         => 'nullable|numeric|min:0|max:100',
            'invshare'          => 'nullable|numeric|min:0|max:100',
            'slpquota'          => 'nullable|numeric|min:0|max:9999999',
            'quotafrequency'    => 'required|between:1,4',
            'note'              => 'nullable|max:65535',
        ]);

        // $request->validate(
        //     [
        //         'scholarname'    =>  [
        //             'required',
        //             'min:2',
        //             'max:255',
        //         ],

        //         'roninaddr'         => 'required|min:46|max:46',
        //         'schoshare'         => 'required|numeric|min:0|max:100',
        //         'slpquota'          => 'numeric|min:0|max:9999999',
        //         'quotafrequency'    => 'required|between:1,4',
        //     ],
        //     [
        //         'user_group.exists'     => 'Invalid selected user group',
        //         'old_user_group.exists' => 'Invalid selected user group',

        //     ]
        // );
        
        

        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);

        }
        else {

            // if combined scholar and investor share exceeds 100%
            if ( ($request->schoshare + $request->invshare > 100) || $request->invshare > 100 ) {
                return Response::json(array(
                    'success' => false,
                    'errors' => ['Invalid Share' => 'Combined Scholar and Investor shares cannot exceed 100%.'],
                ), 200);

            }

            // handle's manager sessions and creation
            // check for manager session id
            if ( null === session('manager_uniqid') ) {

                // create a unique identifier for the first-time manager
                $uniqid = Str::random(9);
                
                // get visitor or this manager origin
                $visitor_origin             = Http::withoutVerifying()->get('https://api.ipapi.com/'.$request->ip().'?access_key=af7971baa2f5dd802d26dcb207fd2974'); 
                $visitor_currency_code      = 'usd'; //$visitor_origin['currency']['code']   ?? 'usd'; [update] 9/15/2021: always used USD ($) as default current to avoid conflict
                $visitor_currency_symbol    = '$'; //$visitor_origin['currency']['symbol'] ?? '$'; [update] 9/15/2021: always used USD ($) as default current to avoid conflict
                $visitor_currency_tz        = $visitor_origin['time_zone']['id']    ?? 'UTC';
                $visitor_country            = $visitor_origin['country_name']       ?? '';

                // select supported currency codes and symbol from our database
                $coin_prices_arr        = DB::table('coin_price')
                                        ->select([
                                            'currency_code',
                                            'currency_symbol'
                                        ])
                                        ->get()
                                        ->toArray();

                $curr_code_arr          = array_column( $coin_prices_arr, 'currency_code' );
                $curr_symbol_arr        = array_column( $coin_prices_arr, 'currency_symbol' );
                $currency_arr           = array_combine( $curr_code_arr, $curr_symbol_arr );

                // get supported currencies from gekco saved into our coin_price table
                // make usd the default currency if not supported by coingekco
                if ( !in_array( strtolower($visitor_currency_code), $curr_code_arr) )  {
                    $visitor_currency_code      = 'usd'; 
                    $visitor_currency_symbol    = '$';
                    $visitor_currency_tz        = 'UTC';
                    $visitor_country            = 'United States';
                }
                else {
                    $visitor_currency_symbol    = $currency_arr[strtolower($visitor_currency_code)];
                }

                // create for the first time manager's data
                DB::table('managers')
                ->insert([
                    'unique_id'         => $uniqid,
                    'currency_code'     => strtolower($visitor_currency_code),
                    'currency_symbol'   => $visitor_currency_symbol,
                    'country'           => $visitor_country,
                    'timezone_id'       => $visitor_currency_tz,
                ]);

                // newly created manager_id
                $manager_id = $this->LastInsertedId();

                // create session of manager's unique id / id
                session([
                    'manager_id'                    => $manager_id,
                    'manager_uniqid'                => $uniqid,
                    'currency_code'                 => strtoupper($visitor_currency_code),
                    'currency_symbol'               => $visitor_currency_symbol,
                    'selected_currency_display'     => sprintf('%s %s', $visitor_currency_symbol, $visitor_currency_code),
                    'timezone_id'                   => $visitor_currency_tz,
                ]);   

            }
            else {

                $manager_id             = session('manager_id');
                $manager_unique_id      = session('manager_uniqid');

            }

            // check if ronin already exist to apply a differenct approach
            $ronin_exist    = DB::table('scholars_fcvkss')
                            ->where([
                                ['ronin_address', $request->roninaddr]
                            ])
                            ->select([
                                'id'
                            ])
                            ->first();

            // check if ronin address is already linked to this manager
            if ( !empty($ronin_exist) && null !== session('manager_id'))  {
                
                $ronin_linked_to_manager    = DB::table('managers_scholar')
                                            ->where([
                                                ['manager_id', $manager_id],
                                                ['scholar_id', $ronin_exist->id],
                                            ])
                                            ->count();
                
                // return error | this manager has already added this ronin adddress
                if ($ronin_linked_to_manager == 1) {
                    return Response::json(array(
                        'success'   => false,
                        'errors'    => ['Ronin already added' => 'You already added this Ronin address.']
                    ), 200);

                    die();                      
                }

            }
            
            // scholar ronin is not yet in database
            if( empty($ronin_exist) ) {

                // traditional cURL solution from https://reqbin.com/req/c-vdhoummp/curl-get-json-example
                // because http client from laravel not working, look for much better solution in the future
                $url = sprintf("https://game-api.axie.technology/api/v1/%s", str_replace('ronin:', '0x', $request->roninaddr));

                $curl = curl_init($url);

                $headers = array(
                    "Accept: application/json",
                );

                curl_setopt($curl, CURLOPT_URL, $url);
                // curl_setopt($curl, CURLOPT_PROXY, 'http://zproxy.lum-superproxy.io:22225');
                // curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'lum-customer-c_aa16b372-zone-static:ydt78bchqp7k');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                
                // execute curl
                $main_resp = curl_exec($curl);

                // get http response code
                $http_lunacioarover_rescode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                // close handle
                curl_close($curl);

                // set this to false by default
                $use_backup_api = false;

                // check if no error occured
                if ($http_lunacioarover_rescode != '200') {
                    
                    // try back-up api call to skymavis.com
                    $url = sprintf("https://game-api.skymavis.com/game-api/clients/%s/items/1", str_replace('ronin:', '0x', $request->roninaddr));

                    $curl = curl_init($url);

                    $headers = array(
                        "Accept: application/json",
                    );

                    curl_setopt($curl, CURLOPT_URL, $url);
                    // curl_setopt($curl, CURLOPT_PROXY, 'http://zproxy.lum-superproxy.io:22225');
                    // curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'lum-customer-c_aa16b372-zone-static:ydt78bchqp7k');
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    // execute curl
                    $backup_resp = curl_exec($curl);

                    // get http response code
                    $http_skymavis_rescode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                    // close handle
                    curl_close($curl);

                    if ($http_skymavis_rescode != '200') {

                        return Response::json(array(
                            'success'   => false,
                            'errors'    => [
                                sprintf('%s %s', $http_skymavis_rescode, 'Server response error, a problem occured on Sky Mavis API Server please try again later.')
                            ]
                        ), 200);

                        die();

                    }

                    // when the value is true we used the back-up api
                    $use_backup_api = true;

                }

                // using response of back-up api call
                if ( $use_backup_api == true) {

                    // decode json response from cURL
                    $response_arr           = json_decode($backup_resp);
                    $blockchain_related     = $response_arr->blockchain_related ?? ['checkpoint' => 0];
                    
                    // 📦 contruct results 📦
                    $in_game_slp            = ($response_arr->total - $response_arr->claimable_total) ?? 0;
                    $ronin_slp              = $response_arr->claimable_total ?? 0;
                    $total_slp              = $response_arr->total ?? 0;
                    $rank                   = 0;
                    $mmr                    = 0;

                    $last_claimed_slp       = $blockchain_related->checkpoint;
                    $last_claimed_timestamp = $response_arr->last_claimed_item_at;
                    
                }
                else {

                    // decode json response from cURL
                    $response_arr           = json_decode($main_resp);

                    // 📦 contruct results 📦
                    $in_game_slp            = $response_arr->in_game_slp ?? 0;
                    $ronin_slp              = $response_arr->ronin_slp ?? 0;
                    $total_slp              = $response_arr->total_slp ?? 0;
                    $rank                   = $response_arr->rank ?? 0;
                    $mmr                    = $response_arr->mmr ?? 0;

                    $last_claimed_slp       = $response_arr->ronin_slp;
                    $last_claimed_timestamp = $response_arr->last_claim;
                    
                }

                // insert scholar data into database
                $insert =   DB::table('scholars_fcvkss')
                            ->insert([

                                'ronin_address'         => $request->roninaddr,
                                'rank'                  => $rank,
                                'mmr'                   => $mmr,

                                // 'scholar_name'          => $request->scholarname,
                                // 'scholar_share'         => $request->schoshare,
                                // 'investor_share'        => intval($request->invshare),
                                // 'image_id'              => rand(6, 3400000),
                                
                                'in_game_slp'           => intval($in_game_slp),
                                'ronin_slp'             => intval($ronin_slp),
                                'total_slp'             => intval($total_slp),
                                'last_slp_claimed' 	    => intval($last_claimed_slp),
                                'last_claimed_item_at'  => $last_claimed_timestamp,
                                
                                // 'set_slp_quota'         => $request->slpquota ?? 0,
                                // 'set_quota_frequency'   => $request->quotafrequency ?? 1

                            ]);

                // newly created scholar_id
                $scholar_id = $this->LastInsertedId();

            }
            // ronin_address is already exist into `scholars` table we only need these variable to be use on `managers_scholar` table
            else { 
                
                // update some scholar data
                $scholar_id = $ronin_exist->id; 
                $manager_id = session('manager_id'); 

            }

            // create scholar-manager relation record
            DB::table('managers_scholar')
            ->insert([
                'manager_id'            => $manager_id,
                'scholar_id'            => $scholar_id,
                'note'                  => $request->note,

                'scholar_name'          => $request->scholarname,
                'scholar_share'         => $request->schoshare,
                'investor_share'        => intval($request->invshare),
                'image_id'              => rand(6, 3400000),

                'set_slp_quota'         => $request->slpquota ?? 0,
                'set_quota_frequency'   => $request->quotafrequency ?? 1
            ]);

            // update manager's summary
            DB::table('managers')
                ->where('id', $manager_id)
                ->update([
                    'total_scholars' => $this->ManagerTotalScholars($manager_id),
                ]);

            //
            $data = [
                'success'   => true,
                'm_uniqid'  => session('manager_uniqid') ?? $manager_unique_id,
                'msg'       => sprintf('You are awesome! <strong>%s</strong> is already added give us some time to fetch it\'s information.', ($request->roninaddr ?? ''))
            ];

            //            
            return $data;
            
        }

    }



    // edit or update scholar information
    public function edit_scholar(Request $request)
    {
        $data = [];

        // validate form input
        $validator = Validator::make($request->all(), [
            'scholar_name'             => 'required|min:2|max:255',
            'scholar_share'            => 'nullable|numeric|min:0|max:100',
            'investor_share'           => 'nullable|numeric|min:0|max:100',
            'slp_quota'                => 'nullable|numeric|min:0|max:9999999',
            'slp_quota_frequency'      => 'required|between:1,4',
            'note'                     => 'nullable|max:65535',
        ]);

        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);

        }
        else {

            // manager's session must be present
            if ( null !== session('manager_id') ) {

                // if combined scholar and investor share exceeds 100%
                if (($request->scholar_share + $request->investor_share > 100) || $request->investor_share > 100) {
                    return Response::json(array(
                        'success' => false,
                        'errors' => ['Invalid Share' => 'Combined Scholar and Investor shares cannot exceed 100%.'],
                    ), 200);

                    die();
                }

                $manager_id = session('manager_id');

                // decode scholar's id
                $scholar_id         = $this->DecodeHashedID($request->s);

                // update scholar info and settings
                DB::table('managers_scholar')
                ->where([
                    ['manager_id', $manager_id],
                    ['scholar_id', $scholar_id],
                ])
                ->update([
                    'scholar_name'              => $request->scholar_name,
                    'scholar_share'             => $request->scholar_share,
                    'investor_share'            => $request->investor_share,
                    'note'                      => $request->note,
                    'set_slp_quota'             => $request->slp_quota,
                    'set_quota_frequency'       => $request->slp_quota_frequency,
                ]);
                    
                $data['success'] = true;

            }
            else {

                $data['success'] = false;

            }

            return $data;

        }

    }



    // delete scholar
    public function delete_scholar(Request $request)
    {

        // decode scholar's id
        $scholar_id     = $this->DecodeHashedID($request->s);

        // permanet delete scholar-manager relation
        $delete_isko    = DB::table('managers_scholar')
                        ->where([
                            ['scholar_id', $scholar_id],
                            ['manager_id', session('manager_id')]
                        ])->delete();

        // update manager's summary
        DB::table('managers')
            ->where('id', session('manager_id'))
            ->update([
                'total_scholars' => $this->ManagerTotalScholars(session('manager_id')),
            ]);

        //
        if ($delete_isko) { $data['success'] = true; } else  { $data['success'] = false; }
        
        //
        return $data;

    }



    // sort and fitler for fetched scholars
    public function sort_and_filter(Request $request)
    {

        return $this->sort_by($request->sortBy);
  
    }



    // fetch scholars from database
    public function fetch_scholars(Request $request = null)
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
            if ( !isset($request->unique_id) ) { return $data[] = ['failed' => true]; die(); }

            $manager_unique_id = $request->unique_id;

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
                        
        }




        
        
        // use to filter date based in UTC in the query below
        // $utc_date = Carbon::now()->isoFormat('YYYY-MM-DD');
                                    // select scholars of
        $orderBy    = ( null === session('scholar_sort_by') )
                        ? 'managers_scholar.created_at'
                        : session('scholar_sort_by');

        $orderByAD  = ( null === session('scholar_sort_asc_desc') )
                        ? 'asc'
                        : session('scholar_sort_asc_desc');
        
        // select all scholars of this manager
        $scholars               = DB::table('scholars_fcvkss')
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
                                    ['managers_scholar.manager_id', session('manager_id')]
                                ])
                                ->orderBy($orderBy, $orderByAD)
                                ->limit(2000)
                                ->get()->toArray();

        $today                  = Carbon::today()->isoFormat('YYYY-MM-DD'); /* < -- date today in UTC */
        $yesterday              = Carbon::now()->subDays(1)->isoFormat('YYYY-MM-DD'); /* < -- date yerterday in UTC */
        $before_yesterday       = Carbon::now()->subDays(2)->isoFormat('YYYY-MM-DD'); /* < -- date before yerterday in UTC */

        $scholar_slps_today     = DB::table('scholars_daily_slp')
                                ->whereDate('date', '>=', $yesterday)
                                ->whereDate('date', '<=', $today)
                                ->whereIn('ronin_address', array_column($scholars, 'ronin_address'))
                                ->select([
                                    'ronin_address',
                                    'in_game_slp',
                                    'ronin_slp',
                                    'total_slp',
                                    'last_claimed_slp',
                                    'last_claimed_date',
                                    'date'
                                ])
                                ->orderBy('ronin_address', 'asc')
                                ->get()->toArray();

        // slp daily array
        $slp_arr = [];
        
        // reserve to start with the latest daly slp
        $scholar_slps_today = array_reverse($scholar_slps_today);

        // ronin repeat checker in the loop below
        $ronin_address_repeat = null;

        // loop daily slp of this scholar (old today script)
        foreach ($scholar_slps_today as $k => $val) {

            // to do: add date checking for today's date vs last claimed date
            if ( $val->total_slp == 0
                && ( strftime('%Y-%m-%d', strtotime($val->last_claimed_date)) == Carbon::now()->isoFormat('YYYY-MM-DD') ) ) 
            {

                $latest_slp = $val->last_claimed_slp;

                session([
                    'sess_recently_claimed' => true
                ]);

            } else {

                $latest_slp = $val->total_slp;

                if ( $val->total_slp > 0
                     && strftime('%Y-%m-%d', strtotime($val->last_claimed_date)) == Carbon::now()->isoFormat('YYYY-MM-DD') )
                {

                    // if claimed today and has ronin balance
                    if ($val->ronin_slp > 0 ) {
                        $latest_slp = ($val->total_slp + $val->last_claimed_slp) -  $val->ronin_slp;
                    }
                    else {
                        $latest_slp = $val->total_slp + $val->last_claimed_slp;
                    }
                    
                }

            }
            

            // repeat ronin, this ronin has multiple daily records in scholars_daily_slp table 
            if ($ronin_address_repeat == $val->ronin_address) {

                if ( null !== session('sess_recently_claimed') ) {

                    $latest_slp = $slp_arr[$val->ronin_address]['today'] - ($val->total_slp + $val->last_claimed_slp);

                    // delete session key | can only use onced per ronin
                    session([
                        'sess_recently_claimed' => null
                    ]);

                }
                else {

                    if ($slp_arr[$val->ronin_address]['today'] > ($val->total_slp + $val->last_claimed_slp)) {
                        $latest_slp = $slp_arr[$val->ronin_address]['today'] - ($val->total_slp + $val->last_claimed_slp);
                    }

                    else if ( $slp_arr[$val->ronin_address]['today'] == 0 || ($slp_arr[$val->ronin_address]['today'] - $val->total_slp) <= 0 ) {
                        $latest_slp = $val->total_slp - $slp_arr[$val->ronin_address]['today'];
                    }

                    else {
                        $latest_slp = $slp_arr[$val->ronin_address]['today'] - $val->total_slp;
                    }

                }

            }

            // non repeat today SLP
            $slp_arr[$val->ronin_address] = [
                'today' => $latest_slp,
            ];

            // log ronin address to check if it will repeat or not (if repeat meaning this ronin has already multiple daily records)
            $ronin_address_repeat = $val->ronin_address;

        }







        $scholar_slps_yesterday = DB::table('scholars_daily_slp')
                                ->whereDate('date', '>=', $before_yesterday)
                                ->whereDate('date', '<=', $yesterday)
                                ->whereIn('ronin_address', array_column($scholars, 'ronin_address'))
                                ->select([
                                    'ronin_address',
                                    'in_game_slp',
                                    'total_slp',
                                    'ronin_slp',
                                    'last_claimed_slp',
                                    'last_claimed_date',
                                    'date'
                                ])
                                ->orderBy('ronin_address', 'asc')
                                ->get()->toArray();

        // slp daily array
        $slp_arr_y = [];
        
        // reserve to start with the latest daly slp
        $scholar_slps_yesterday = array_reverse($scholar_slps_yesterday);

        // ronin repeat checker in the loop below
        $ronin_address_repeat_y = null;

        // loop daily slp of this scholar (old today script)
        foreach ($scholar_slps_yesterday as $k => $val) {

            // to do: add date checking for today's date vs last claimed date
            if ( 
                $val->total_slp == 0 
                && ( strftime('%Y-%m-%d', strtotime($val->last_claimed_date)) == Carbon::yesterday()->isoFormat('YYYY-MM-DD') )
            ) {
                
                $latest_slp_y = $val->last_claimed_slp;

                session([
                    'sess_recently_claimed' => true
                ]);

            } else {

                $latest_slp_y = $val->total_slp;

                if ( $val->total_slp > 0
                     && strftime('%Y-%m-%d', strtotime($val->last_claimed_date)) == Carbon::yesterday()->isoFormat('YYYY-MM-DD') )
                {
                    
                    // if claimed today and has ronin balance
                    if ($val->ronin_slp > 0 ) {
                        $latest_slp_y = ($val->total_slp + $val->last_claimed_slp) -  $val->ronin_slp;
                    }
                    else {
                        $latest_slp_y = $val->total_slp + $val->last_claimed_slp;
                    }

                }

            }
            

            // repeat ronin, this ronin has multiple daily records in scholars_daily_slp table 
            if ($ronin_address_repeat_y == $val->ronin_address) {

                if ( null !== session('sess_recently_claimed') ) {

                    $latest_slp_y = $slp_arr_y[$val->ronin_address]['yesterday'] - ($val->total_slp + $val->last_claimed_slp);

                    // delete session key | can only use onced per ronin
                    session([
                        'sess_recently_claimed' => null
                    ]);

                }
                else {

                    if ($slp_arr_y[$val->ronin_address]['yesterday'] > ($val->total_slp + $val->last_claimed_slp)) {
                        $latest_slp_y = $slp_arr_y[$val->ronin_address]['yesterday'] - ($val->total_slp + $val->last_claimed_slp);
                    }

                    else if ( $slp_arr_y[$val->ronin_address]['yesterday'] == 0 || ($slp_arr_y[$val->ronin_address]['yesterday'] - $val->total_slp) <= 0 ) {
                        $latest_slp_y = $val->total_slp - $slp_arr_y[$val->ronin_address]['yesterday'];
                    }

                    else {
                        $latest_slp_y = $slp_arr_y[$val->ronin_address]['yesterday'] - $val->total_slp;
                    }

                }

            }

            // non repeat yesterday SLP
            $slp_arr_y[$val->ronin_address] = [
                'yesterday' => $latest_slp_y,
            ];

            // log ronin address to check if it will repeat or not (if repeat meaning this ronin has already multiple daily records)
            $ronin_address_repeat_y = $val->ronin_address;

        }
        
        // dd($slp_arr);



        // coin prices from coingecko
        $coin_prices = $this->coin_price();

        // varibles to manager dashboard
        $total_scholars         = 0;
        $total_avg_slp          = 0;
        $total_scholars_w_avg   = 0;
        $total_unclaimed_slp    = 0;
        $total_unclaimed_slp_m  = 0; 
        $total_unclaimed_slp_s  = 0; 
        
        $total_claimed_slp      = 0;
        $total_claimed_slp_m    = 0; /* manager */
        $total_claimed_slp_s    = 0; /* scholars */
        $total_unclaimed_slp_i  = 0; /* investor */
        $total_ronin_slp        = 0; /* total ronin slp */
        
        // profits summary variables
        $total_today_slp        = 0;
        $total_yesterday_slp    = 0;

        // loop fetched results of scholar data
        foreach( $scholars as $k => $v ) {
            
            $visitor_tz                                 = session('timezone_id');
            $last_claimed_item_at                       = Carbon::parse($v->last_claimed_item_at)->tz($visitor_tz)->addWeeks(2); // by default timezone used is GMT+0000 os we will set it to user's tz            
            $claimable_date                             = $v->last_claimed_item_at == 0 ? 'N/A' : $last_claimed_item_at->isoFormat('MMM-DD @ h:mm A'); // June 15th 2018, 5:34:15 pm
            $claimable_date_human                       = $v->last_claimed_item_at == 0 ? 'N/A' : $last_claimed_item_at->diffForHumans(); // Human readable days (x days from now, x week from now,)
            $claimable_date_ellapsed_sec                = $v->last_claimed_item_at == 0 ? 'N/A' : Carbon::now()->tz($visitor_tz)->diffInSeconds($last_claimed_item_at, false);      
            // add new array value claimable date                                                       $last_claimed_item_at
            $scholars[$k]->claimable_date               = $claimable_date;
            $scholars[$k]->claimable_date_human         = $claimable_date_human;
            $scholars[$k]->claimable_date_ellapsed_s    = $claimable_date_ellapsed_sec;
            
            

            /* 
            set quota frequency reference values
                1 = daily
                2 = 7 days
                3 = 14 days
                4 = 30 days 
            */
            if ( $v->set_quota_frequency == 1 ) {
                $set_daily_slp_quota = number_format( $v->set_slp_quota/1, 2);
            }
            else if ( $v->set_quota_frequency == 2 ) {
                $set_daily_slp_quota = number_format( ($v->set_slp_quota/7), 0);
            }
            else if ( $v->set_quota_frequency == 3 ) {
                $set_daily_slp_quota = number_format( ($v->set_slp_quota/14), 0);
            }
            else if ( $v->set_quota_frequency == 4 ) {
                $set_daily_slp_quota = number_format( ($v->set_slp_quota/30), 0);
            } else {
                $set_daily_slp_quota = number_format( $v->set_slp_quota/1, 2);
            }




                // compute average slp
                $avg_slp    =   $this->average_slp($v->in_game_slp, $v->last_claimed_item_at, $visitor_tz);
                                // ($v->in_game_slp != 0 && $diff_in_days > 0 && is_numeric($v->in_game_slp) && is_numeric($diff_in_days)) 
                                // ? ($v->in_game_slp / $diff_in_days) 
                                // : 0;
                                
                $qhr        =   ($set_daily_slp_quota > 0 && is_numeric($avg_slp) && is_numeric($set_daily_slp_quota)) 
                                ? ( ($avg_slp / $set_daily_slp_quota) * 100 ) 
                                : 0;

            // for troubleshooting detects non-numeric
            // if (!is_numeric($avg_slp)) { dd($avg_slp); }


            // get average SLP by number of days since created or last claimed of SLP
            $scholars[$k]->show_qhr                 = ($set_daily_slp_quota > 0) ? true : false;
            $scholars[$k]->qhr                      = round($qhr, 1);
            $scholars[$k]->qhr_info                 = sprintf('%s%% Quota Hit Ratio against %s daily target.', round($qhr, 2), $set_daily_slp_quota);
            
            $scholars[$k]->today_slp                = $slp_arr[$v->ronin_address]['today'] ?? 0;
            $scholars[$k]->today_slp_in_curr        = sprintf('≈%s %s', number_format( $coin_prices['slp'] * $scholars[$k]->today_slp, 2), strtoupper($set_currency_code));
            
            $scholars[$k]->yesterday_slp            = $slp_arr_y[$v->ronin_address]['yesterday'] ?? 0;
            $scholars[$k]->yesterday_slp_in_curr    = sprintf('≈%s %s', number_format( $coin_prices['slp'] * $scholars[$k]->yesterday_slp, 2), strtoupper($set_currency_code));
            
            $scholars[$k]->ronin_slp_in_curr        = sprintf('≈%s %s', number_format( $coin_prices['slp'] * $v->ronin_slp, 2), strtoupper($set_currency_code));
            
            // $scholars[$k]->avg_slp                  = sprintf('%s <br> %s', $diff_in_days, round($avg_slp)); // pang test
            $scholars[$k]->avg_slp                  = round($avg_slp);
            $scholars[$k]->avg_slp_in_curr          = sprintf('≈%s %s', number_format( $coin_prices['slp'] * $avg_slp, 2), strtoupper($set_currency_code));            
            
            // encrypt scholar database id
            $scholars[$k]->h_sid                    = $this->HashID($v->id);

            // put manager's unique id
            $scholars[$k]->m_uniqid                 = session('manager_uniqid');
            
            // single view page url
            $scholars[$k]->scho_url                 = route('fetch_scholar_single',[ 'unique_id' => $scholars[$k]->m_uniqid, 'scho_id' => $scholars[$k]->id ]);
            
            // change ronin address dislay output
            $scholars[$k]->ronin_address_formatted  = str_replace('ronin:', '0x', substr_replace($v->ronin_address, '...', 9, 32));
            $scholars[$k]->ronin_address_0x         = str_replace('ronin:', '0x', $v->ronin_address);
            
            $timeago_update_timestamp               = Carbon::parse($v->updated_at, $visitor_tz);
            
            // add new arroy slp updated on date
            $scholars[$k]->scho_last_change         = $timeago_update_timestamp->diffForHumans(); // Carbon::parse($v->updated_at)->tz('UTC')->diffForHumans();
            $scholars[$k]->scho_last_in_min         = $timeago_update_timestamp->diffInMinutes();
            
            // addd new array value image uri or url
            $scholars[$k]->img_uri                  = sprintf('https://storage.googleapis.com/assets.axieinfinity.com/axies/%s/axie/axie-full-transparent.png', $v->image_id);
            
            // add new array value scholar axie marketplace link
            $scholars[$k]->axie_marketplace_link    = sprintf("https://marketplace.axieinfinity.com/profile/%s/axie", str_replace('0x', 'ronin:', $v->ronin_address));
            $scholars[$k]->ronin_explorer_link      = sprintf("https://explorer.roninchain.com/address/%s", $v->ronin_address);
            
            // add new array value total slp price value in user's currency
            $scholars[$k]->in_game_slp_in_curr      = sprintf('≈%s %s', number_format($coin_prices['slp'] * $v->in_game_slp, 2), strtoupper($set_currency_code));

            $scholars[$k]->in_game_slp_scho_curr    = sprintf('≈%s %s', number_format( ($coin_prices['slp'] * $v->in_game_slp) * ($v->scholar_share/100), 2), strtoupper($set_currency_code));
            $scholars[$k]->in_game_slp_inv_curr     = sprintf('≈%s %s', number_format( ($coin_prices['slp'] * $v->in_game_slp) * ($v->investor_share/100), 2), strtoupper($set_currency_code));
            $scholars[$k]->in_game_slp_mng_curr     = sprintf('≈%s %s', number_format( ($coin_prices['slp'] * $v->in_game_slp) * ( ( 100- ($v->scholar_share+ $v->investor_share) ) / 100 ), 2), strtoupper($set_currency_code));

            // slp share (manager, scholar, investor)
            $scholars[$k]->slp_scholar_share       = ceil($v->in_game_slp * ($v->scholar_share/100));
            $scholars[$k]->slp_investor_share      = ceil($v->in_game_slp * ($v->investor_share / 100));
            $scholars[$k]->slp_manager_share       = ceil($v->in_game_slp * ((100 - ($v->scholar_share + $v->investor_share)) / 100));

            // percentage share (manager, scholar, investor)
            $scholars[$k]->perc_scholar_share       = ceil($v->scholar_share) . '%';
            $scholars[$k]->perc_investor_share      = ceil($v->investor_share) . '%';
            $scholars[$k]->perc_manager_share       = ceil( 100 - ($v->scholar_share + $v->investor_share) ) . '%';


            $inv_share = ($v->investor_share > 0) ? $v->investor_share : 0;
            // prepare manager's dashbaord data
            $total_scholars                         += 1;
            $total_scholars_w_avg                   += $avg_slp > 0 ? 1 : 0; /* count scholars with avg slp */
            $total_avg_slp                          += $avg_slp;
            $total_unclaimed_slp                    += $v->in_game_slp;
            $total_unclaimed_slp_m                  += ($v->in_game_slp) * ((100 - $v->scholar_share - $inv_share)/100);
            $total_unclaimed_slp_s                  += ($v->in_game_slp) * ($v->scholar_share/100);
            $total_unclaimed_slp_i                  += ($v->in_game_slp) * ($v->investor_share / 100);
            $total_ronin_slp                        += $v->ronin_slp;

            // profits summary
            $total_today_slp                        += $scholars[$k]->today_slp;
            $total_yesterday_slp                    += $scholars[$k]->yesterday_slp;

        }
        
        // this will sort results by QHR
        if ( null !== session('array_sort_qhr') && null !== session('array_sort_qhr_order') ) {

            // select qhr column as the base for sorting
            $key_sort = array_column($scholars, 'qhr');

            // sort array
            array_multisort($key_sort, session('array_sort_qhr_order'), SORT_NUMERIC, $scholars);

        }
        // this will sort results by QHR
        else if (null !== session('array_sort_avg_slp') && null !== session('array_sort_avg_slp_order')
        ) {

            // select qhr column as the base for sorting
            $key_sort = array_column($scholars, 'avg_slp');

            // sort array
            array_multisort($key_sort, session('array_sort_avg_slp_order'), SORT_NUMERIC, $scholars);
        }
        // this will sort results by daily slp
        else if (
            null !== session('array_sort_today_slp') && null !== session('array_sort_today_slp_order')
        ) {

            // select qhr column as the base for sorting
            $key_sort = array_column($scholars, 'today_slp');

            // sort array
            array_multisort($key_sort, session('array_sort_today_slp_order'), SORT_NUMERIC, $scholars);
        }
        // this will sort results by yesterday slp
        else if (
            null !== session('array_sort_yesterday_slp') && null !== session('array_sort_yesterday_slp_order')
        ) {

            // select qhr column as the base for sorting
            $key_sort = array_column($scholars, 'yesterday_slp');

            // sort array
            array_multisort($key_sort, session('array_sort_yesterday_slp_order'), SORT_NUMERIC, $scholars);
        }
        
        
        $manager = [
            'unique_identifier'             => session('manager_uniqid'),
            'total_scholars'                => $total_scholars, 

            'total_avg_slp'                 => ($total_scholars_w_avg > 0) ? round($total_avg_slp/$total_scholars_w_avg) : 0,
            'total_unclaimed_slp'           => round($total_unclaimed_slp),
            'total_unclaimed_slp_m'         => round($total_unclaimed_slp_m),
            'total_unclaimed_slp_s'         => round($total_unclaimed_slp_s),
            'total_unclaimed_slp_i'         => round($total_unclaimed_slp_i),
            'total_ronin_slp'               => round($total_ronin_slp),
            'total_today_slp'               => round($total_today_slp),
            'total_yesterday_slp'           => round($total_yesterday_slp),

            'total_avg_slp_curr'            => ($total_scholars > 0) ? sprintf('≈%s %s', number_format( $coin_prices['slp'] * ceil($total_avg_slp / $total_scholars), 2), strtoupper($set_currency_code)) :  0,
            'total_unclaimed_slp_curr'      => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_unclaimed_slp, 2), strtoupper($set_currency_code) ),
            'total_unclaimed_slp_m_curr'    => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_unclaimed_slp_m, 2), strtoupper($set_currency_code) ),
            'total_unclaimed_slp_s_curr'    => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_unclaimed_slp_s, 2), strtoupper($set_currency_code) ),
            'total_claimed_slp_curr'        => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_claimed_slp, 2), strtoupper($set_currency_code) ),
            'total_claimed_slp_m_curr'      => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_claimed_slp_m, 2), strtoupper($set_currency_code) ),
            'total_claimed_slp_s_curr'      => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_claimed_slp_s, 2), strtoupper($set_currency_code) ),
            'total_unclaimed_slp_i_curr'    => sprintf('≈%s %s', number_format( $coin_prices['slp'] * $total_unclaimed_slp_i, 2), strtoupper($set_currency_code) ),
            'total_ronin_slp_curr'          => sprintf('≈%s %s', number_format($coin_prices['slp'] * $total_ronin_slp, 2), strtoupper($set_currency_code) ),
            'total_today_slp_curr'          => sprintf('≈%s %s', number_format($coin_prices['slp'] * $total_today_slp, 2), strtoupper($set_currency_code) ),
            'total_yesterday_slp_curr'      => sprintf('≈%s %s', number_format($coin_prices['slp'] * $total_yesterday_slp, 2), strtoupper($set_currency_code) ),

            'customed_slp_price'            => (null !== session('sess_slp_custom_price')) ? number_format( session('sess_slp_custom_price'), 2) : null,
            'customed_slp_price_curr'       => (null !== session('sess_slp_custom_price')) ? sprintf('%s%s', $set_currency_symbol, number_format( session('sess_slp_custom_price'), 2)) : null,
            

        ];

        $data = [
            'mng_d'     => $manager,
            'sch_d'     => $scholars,
        ];

        // return data
        return $data;
            
    }



    public function fetch_currencies(Request $request)
    {

        $coin_results   = DB::table('coin_price')
        ->select([
                'id',
                'currency_code',
                'currency_symbol',
                'currency_description',
        ])->get()->toArray();

        return $coin_results;

    }



    // set custom SLP price
    public function set_custom_slp_price(Request $request)
    {
    
        // validate form input
        $validator = Validator::make($request->all(), [
            'slp_market_price_plus'     => 'nullable|numeric|min:0|max:1000000000',
            'slp_market_price_minus'    => 'nullable|numeric|min:0|max:1000000000',
            'slp_custom_price'          => 'nullable|numeric|min:0|max:1000000000',
        ]);


        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);

        }
        else {
            
            if ( null !== session('manager_uniqid') ) {

                // user wants to set a custom SLP price
                if ( null !== ($request->slp_custom_price) && is_numeric($request->slp_custom_price) === true ) {

                    DB::table('managers')
                    ->where([
                        ['unique_id', session('manager_uniqid')]
                    ])
                    ->update([
                        'custom_slp_plus_market'        => null,
                        'custom_slp_minus_market'       => null,
                        'custom_slp_custom'             => $request->slp_custom_price,
                    ]);

                    // update custom slp session
                    session([
                        'sess_slp_custom_price'         => (($request->slp_market_price_plus !== null || $request->slp_market_price_minus !== null) ? floatval($request->slp_market_price_plus) - floatval($request->slp_market_price_minus) : (($request->custom_slp_custom !== null) ? floatval($request->custom_slp_custom) : null)),
                    ]);

                    return true;

                }
                // user wants to set an additional or subtraction to the current market price of SLP
                else if (
                    ( null !== ($request->slp_market_price_plus) && is_numeric($request->slp_market_price_plus) === true ) ||
                    ( null !== ($request->slp_market_price_minus) && is_numeric($request->slp_market_price_minus) === true )
                ) {

                    DB::table('managers')
                        ->where([
                            ['unique_id', session('manager_uniqid')]
                        ])
                        ->update([
                            'custom_slp_plus_market'        => $request->slp_market_price_plus ?? null,
                            'custom_slp_minus_market'       => $request->slp_market_price_minus ?? null,
                            'custom_slp_custom'             => null,
                        ]);

                    // update custom slp session
                    session([
                        'sess_slp_custom_price'             => (($request->slp_market_price_plus !== null || $request->slp_market_price_minus !== null) ? floatval($request->slp_market_price_plus) - floatval($request->slp_market_price_minus) : (($request->custom_slp_custom !== null) ? floatval($request->custom_slp_custom) : null)),
                    ]);




                    return true;

                }

            }


        }

    }

}