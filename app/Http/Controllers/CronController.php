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

class CronController extends Controller
{

    public function test()
    {

        // $date = Carbon::parse('2021-07-28 23:58:27')->tz('Asia/Manila')->isoFormat('MMM-DD @ h:mma');

        dd('end of the road');

        $coin_prices_arr        = DB::table('coin_price')
                                ->select([
                                    'currency_code',
                                    'currency_symbol'
                                ])
                                ->get()
                                ->toArray();

        $curr_code_arr          = array_column($coin_prices_arr, 'currency_code');
        $curr_symbol_code       = array_column($coin_prices_arr, 'currency_symbol');

                        dd( array_combine( $curr_code_arr, $curr_symbol_code ) );
                        
                        
    }





    // this will handle minute request from our server to coingecko api
    // and then update our local database for minute update price
    public function cron_coin_price()
    {

        // get current supported currency of coingecko
        $coingecko_supported_currencies = Http::withoutVerifying()->get('https://api.coingecko.com/api/v3/simple/supported_vs_currencies'); 

        if ( is_array( json_decode($coingecko_supported_currencies) ) ) {
                
            $responses = Http::pool(fn (Pool $pool) => [
                /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=' . implode(",", json_decode($coingecko_supported_currencies)) . '&include_24hr_change=true'),
                /* slp */    $pool->acceptJson()->withoutVerifying()->get('https://api.coingecko.com/api/v3/simple/token_price/ethereum?contract_addresses=0xcc8fa225d80b9c7d42f96e9570156c65d6caaa25&vs_currencies=' . implode(",", json_decode($coingecko_supported_currencies)) . '&include_24hr_change=true'),
                /* axs */    $pool->acceptJson()->withoutVerifying()->get('https://api.coingecko.com/api/v3/simple/token_price/ethereum?contract_addresses=0xbb0e17ef65f82ab018d8edd776e8dd940327b28b&vs_currencies=' . implode(",", json_decode($coingecko_supported_currencies)) . '&include_24hr_change=true'),
            ]);

            // responses are all good!
            if ( $responses[0]->ok() && $responses[1]->ok() && $responses[2]->ok() ) {
                
                // array that will hold coin prices and last 24 hour changes before storing/updating into coin_price table
                $all_coins_prices = [];

                $eth_price_responses = $responses[0]->json();
                $slp_price_responses = $responses[1]->json();
                $axs_price_responses = $responses[2]->json();
                
                // dumb key
                $d_key = 0;
                
                // test raw data
                // dd($eth_price_responses['ethereum']);
                // dd($slp_price_responses['0xcc8fa225d80b9c7d42f96e9570156c65d6caaa25']);
                // dd($axs_price_responses['0xbb0e17ef65f82ab018d8edd776e8dd940327b28b']);

                // predefined currency symbols add more in the future
                $currency_symbols = [
                    "btc"   =>  "₿",
                    "eth"   =>  "Ξ",
                    "ltc"   =>  "Ł",
                    "bch"   =>  "BCH",
                    "bnb"   =>  "BNB",
                    "eos"   =>  "EOS",
                    "xrp"   =>  "XRP",
                    "xlm"   =>  "XLM",
                    "link"  =>  "LINK",
                    "dot"   =>  "DOT",
                    "yfi"   =>  "YFI",
                    "usd"   =>  "$",
                    "aed"   =>  "د.إ",
                    "ars"   =>  "$",
                    "aud"   =>  "A$",
                    "bdt"   =>  "৳",
                    "bhd"   =>  "BD",
                    "bmd"   =>  "$",
                    "brl"   =>  "R$",
                    "cad"   =>  "$",
                    "chf"   =>  "CHF",
                    "clp"   =>  "$",
                    "cny"   =>  "¥",
                    "czk"   =>  "Kč",
                    "dkk"   =>  "kr",
                    "eur"   =>  "€",
                    "gbp"   =>  "£",
                    "hkd"   =>  "$",
                    "huf"   =>  "Ft",
                    "idr"   =>  "Rp",
                    "ils"   =>  "₪",
                    "inr"   =>  "₹",
                    "jpy"   =>  "¥",
                    "krw"   =>  "¥",
                    "kwd"   =>  "د.ك",
                    "lkr"   =>  "රු",
                    "mmk"   =>  "K",
                    "mxn"   =>  "Mex$",
                    "myr"   =>  "RM",
                    "ngn"   =>  "₦",
                    "nok"   =>  "kr",
                    "nzd"   =>  "$",
                    "php"   =>  "₱",
                    "pkr"   =>  "₨",
                    "pln"   =>  "zł",
                    "rub"   =>  "₽",
                    "sar"   =>  "SR",
                    "sek"   =>  "kr",
                    "sgd"   =>  "S$",
                    "thb"   =>  "฿",
                    "try"   =>  "₺",
                    "twd"   =>  "NT$",
                    "uah"   =>  "₴",
                    "vef"   =>  "Bs.S",
                    "vnd"   =>  "₫",
                    "zar"   =>  "R",
                    "xdr"   =>  "XDR",
                    "xag"   =>  "XAG",
                    "xau"   =>  "XAU",
                    "bits"  =>  "$",
                    "sats"  =>  "₿",
                    ];

                // predefined currency description add more in the future
                $currency_description = [
                    "btc"   =>  "Bitcoin",
                    "eth"   =>  "Ethereum",
                    "ltc"   =>  "Litcoin",
                    "bch"   =>  "Bitcoin Cash",
                    "bnb"   =>  "Binance Coin",
                    "eos"   =>  "EOS",
                    "xrp"   =>  "XRP",
                    "xlm"   =>  "Stellar",
                    "link"  =>  "Chainlink",
                    "dot"   =>  "Polkadot",
                    "yfi"   =>  "yearn.finance",
                    "usd"   =>  "United States Dollar",
                    "aed"   =>  "United Arab Emirates Dirham",
                    "ars"   =>  "Argentine Peso",
                    "aud"   =>  "Australian Dollar",
                    "bdt"   =>  "Bangladeshi Taka",
                    "bhd"   =>  "Bahraini Dinar",
                    "bmd"   =>  "Bermuda Dollar",
                    "brl"   =>  "Brazilian Real",
                    "cad"   =>  "Canadian Dollar",
                    "chf"   =>  "Swiss Franc",
                    "clp"   =>  "Chilean Peso",
                    "cny"   =>  "Chinese Yuan",
                    "czk"   =>  "Czech Koruna",
                    "dkk"   =>  "Danish Krone",
                    "eur"   =>  "Euro",
                    "gbp"   =>  "Pound Sterling",
                    "hkd"   =>  "Hong Kong Dollar",
                    "huf"   =>  "Hungarian Forint",
                    "idr"   =>  "Indonesian Rupiah",
                    "ils"   =>  "ISraeli New Shekel",
                    "inr"   =>  "Indian Rupee",
                    "jpy"   =>  "Japanese Yen",
                    "krw"   =>  "South Korean Won",
                    "kwd"   =>  "Kuwaitei Dinar",
                    "lkr"   =>  "Sri Lankan Rupee",
                    "mmk"   =>  "Myanmar Kyat",
                    "mxn"   =>  "Mexican Dollar",
                    "myr"   =>  "Malaysian Ringgit",
                    "ngn"   =>  "Nigerian Naira",
                    "nok"   =>  "Norwegian Krone",
                    "nzd"   =>  "New Zealand Dollar",
                    "php"   =>  "Philippine Peso",
                    "pkr"   =>  "Pakistani Rupee",
                    "pln"   =>  "Polish złoty",
                    "rub"   =>  "Rissian Ruble",
                    "sar"   =>  "Saudi Riyal",
                    "sek"   =>  "Swedish Krona",
                    "sgd"   =>  "Singaporean Dollar",
                    "thb"   =>  "Thai Baht",
                    "try"   =>  "Turkish lira",
                    "twd"   =>  "New Taiwan Dollar",
                    "uah"   =>  "Ukrainian hryvnia",
                    "vef"   =>  "Venezualan bolívar",
                    "vnd"   =>  "Vietnamese dong",
                    "zar"   =>  "South African Rand",
                    "xdr"   =>  "Special Drawing Rights",
                    "xag"   =>  "XAG",
                    "xau"   =>  "XAU",
                    "bits"  =>  "Bit",
                    "sats"  =>  "SAT ",
                    ];

                foreach ($eth_price_responses['ethereum'] as $ck => $ethv) {

                    if ( !str_contains($ck, '24h_change') ) { 

                        $all_coins_prices[$d_key] = [
                            'currency_code'             => $ck,
                            'currency_symbol'           => array_key_exists($ck, $currency_symbols) ? $currency_symbols[$ck] : '',
                            'currency_description'      => array_key_exists($ck, $currency_description) ? $currency_description[$ck] : '',
                            'eth_price'                 => $eth_price_responses['ethereum'][$ck],
                            'eth_24_change'             => $eth_price_responses['ethereum'][$ck.'_24h_change'],
                            'slp_price'                 => $slp_price_responses['0xcc8fa225d80b9c7d42f96e9570156c65d6caaa25'][$ck],
                            'slp_24_change'             => $slp_price_responses['0xcc8fa225d80b9c7d42f96e9570156c65d6caaa25'][$ck.'_24h_change'],
                            'axs_price'                 => $axs_price_responses['0xbb0e17ef65f82ab018d8edd776e8dd940327b28b'][$ck],
                            'axs_24_change'             => $axs_price_responses['0xbb0e17ef65f82ab018d8edd776e8dd940327b28b'][$ck.'_24h_change'],
                        ];

                    }

                    // increment dumb key
                    $d_key++;

                }
        
                // insert or update coin prices
                DB::table('coin_price')->upsert($all_coins_prices, 'currency_code');

                return 'OK';
            }

        }

    }





    // update scholars from the latest raw data of `scholar_raw_logs`
    public function cron_update_scholars()
    {

        // we need to check utc current time to get how many minutes before it change the day
        // we will use that difference in minutes to determine wether we run this cron script or not
        // this will avoid conflicting of date of scholar's DAILY SLP
        $date_now       = Carbon::now();
        $date_tomorrow  = Carbon::tomorrow();
        $minutes_b4_tom = $date_now->diffInMinutes($date_tomorrow);

        // if less than 5 minutes before tomorrow do not allow to run this cron
        if ( $minutes_b4_tom < 5 ) { die(); }

        $latest_raw = DB::table('scholar_raw_logs')
                        ->select('ronin_address', DB::raw('MAX(id) as last_fetched_id') )
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

       return 'OK';

    }




    
    // create a 'daily' slp logs for each scholars
    // /daily_slp
    public function cron_sholars_daily_slp_logs() 
    {

        // Starting clock time in seconds
        $start_time = microtime(true);

        // !!please note Carbon::today() return UTC timestamp
        $latest_raw = DB::table('scholar_raw_logs')
                        ->select('ronin_address', DB::raw('MAX(id) as last_fetched_id') )
                        ->groupBy('ronin_address');
        
        

        $scholars = DB::table('scholar_raw_logs')
                ->select([
                    'scholar_raw_logs.ronin_address',
                    'scholar_raw_logs.raw_total_slp', /* <- Total SLP Ronin/Axie Market Place + In-Game SLP */
                    'scholar_raw_logs.raw_claimable_total', /* <- SLP in Ronin/Axie Market Place */ /* to Get In-Game SLP deduct this to total_slp */
                    'scholar_raw_logs.raw_last_claimed_slp',
                    'scholar_raw_logs.raw_last_claimed_item_at',
                    'scholar_raw_logs.created_at',
                ])
                ->joinSub($latest_raw, 'latest_posts', function ($join) {
                    $join->on('scholar_raw_logs.id', '=', 'latest_posts.last_fetched_id');
                })->limit(10)->get()->toArray();

        dd($scholars);

        $daily_logs = [];

        $ronin_checker_arr = [];
        $date_checker_arr = '';
        $checker_limits = 0;
        $utc_yymmdd = Carbon::now()->isoFormat('YYYY-MM-DD'); // UTC year-month-day
        
        

        foreach($scholars as $k => $val) {

            $timestamp  = $val->created_at; /* our database timezone */
            $date       = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Asia/Manila'); /* this is our MySQL server timezone so we need to specify it */

            // $date->setTimezone('UTC'); 

            // this is the SLP is already in Ronin/Axie Market Place account of the holder
            $ronin_slp      = $val->raw_claimable_total ?? 0;

            // this it he total SLP ig-game + ronin
            $total_slp      = $val->raw_total_slp ?? 0;

            // this is the SLP that is not yet claim (in-game)
            $in_game_slp    = round($total_slp - $ronin_slp);


            
                $daily_logs[] = [
                    // 'unique_ronin_and_date' => $val->ronin_address . '.' . $utc_yymmdd,
                    'unique_ronin_and_date' =>  substr_replace('$val->ronin_address', '...', 12, 28) . '|' . $utc_yymmdd,
                    'ronin_address'         => $val->ronin_address,
                    'slp'                   => $val->raw_total_slp,
                    'in_game_slp'           => $in_game_slp,
                    'ronin_slp'             => $ronin_slp,
                    'total_slp'             => $total_slp,
                    'last_claimed_slp'      => $val->raw_last_claimed_slp,
                    'last_claimed_date'     => strftime('%Y-%m-%d %H:%M:%S', $val->raw_last_claimed_item_at),
                    'db_date'               => $timestamp, /* <- we log this to compare the date below if it's truely converted into UTC  */
                    'date'                  => $date->setTimezone('UTC')->isoFormat('YYYY-MM-DD HH:mm:ss'), /* <-- convert the date timestamp to UTC to match server's default timezone */
                                                                                                            /* <- when checking on mysql take note that this is on UTC */
                ];

            // put 300 ronin address to check if they already exist
            // monitor this if we need to increase it
            if ( $checker_limits < 300 ) {
                $ronin_checker_arr[] = $val->ronin_address;

                $date_checker_arr = strftime('%Y-%m-%d', strtotime($val->created_at));

            }

            $checker_limits++;

        }

        // dd($daily_logs);

        // chunk data entry/update by 500
        foreach (array_chunk($daily_logs, 500) as $ca) {

            DB::table('scholars_daily_slp')->upsert($ca, 'unique_ronin_and_date');

        }

		// End clock time in seconds
		$end_time = microtime(true);
		
		// Calculate script execution time
		$execution_time = ($end_time - $start_time);

        return 'OK ' . $execution_time;

    }





    // this function will fetch recent leaderboard data
    // and store the fetched data into our 'battle_leaderboard' table
    public function get_leaderboard()
    {


        $responses = Http::pool(fn (Pool $pool) => [
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=0'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=100'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=200'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=300'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=400'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=500'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=600'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=700'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=800'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=900'),
            /* eth */    $pool->acceptJson()->withoutVerifying()->get('https://game-api.skymavis.com/game-api/leaderboard?limit=100&offset=1000'),
        ]);

        // responses are all good!
        if ( $responses[0]->ok() && $responses[1]->ok() && $responses[2]->ok() ) {
            
            // array that will hold coin prices and last 24 hour changes before storing/updating into coin_price table
            $all_coins_prices = [];

            $resp_offset_0 = $responses[0]->json();
            $resp_offset_1 = $responses[1]->json();
            $resp_offset_2 = $responses[2]->json();
            $resp_offset_3 = $responses[3]->json();
            $resp_offset_4 = $responses[4]->json();
            $resp_offset_5 = $responses[5]->json();
            $resp_offset_6 = $responses[6]->json();
            $resp_offset_7 = $responses[7]->json();
            $resp_offset_8 = $responses[8]->json();
            $resp_offset_9 = $responses[9]->json();
            $resp_offset_10 = $responses[10]->json();

            $all_responses = array_merge(
                                $resp_offset_0['items'],
                                $resp_offset_1['items'],
                                $resp_offset_2['items'],
                                $resp_offset_3['items'],
                                $resp_offset_4['items'],
                                $resp_offset_5['items'],
                                $resp_offset_6['items'],
                                $resp_offset_7['items'],
                                $resp_offset_8['items'],
                                $resp_offset_9['items'],
                                $resp_offset_10['items'],
                            );
            // dd(count($all_responses));
            // test raw data
            $battle_leaderboard = [];
            $get_unique = [];

            foreach ($all_responses as $i => $leaderboard) {

                if ( !in_array($leaderboard['client_id'], $get_unique) ) {
                    $battle_leaderboard[] = [
                        'ronin_id'          => $leaderboard['client_id'],
                        'ign'               => $leaderboard['name'],
                        'mmr'               => $leaderboard['elo'],
                        'win_total'         => $leaderboard['win_total'],
                        'draw_total'        => $leaderboard['draw_total'],
                        'lose_total'        => $leaderboard['lose_total'],
                    ];

                    $get_unique[] = $leaderboard['client_id'];
                }

            }       
            
            // dd($battle_leaderboard);

            // insert or update coin prices
            DB::table('battle_leaderboard')->upsert($battle_leaderboard, 'ronin_id');

            return 'OK';

        }

    }
  




    // this cron will fix scholars that cannot be updated
    // cron_is_being_process = 1 | because the main cron job left it unfinish
    public function fix_scholars_that_cannot_be_updated()
    {
        // raw quest
        // -- UPDATE axiemanagercom.scholars_fcvkss
        // -- SET cron_is_being_processed = null
        // -- WHERE 
        // -- cron_is_being_processed = 1
        // -- AND 
        // -- 
        // -- ORDER BY cron_last_updated ASC LIMIT 5000;

        $timenow_less_30 = Carbon::createFromFormat('Y-m-d H:i:s', now()->subMinutes(30))->tz('Asia/Manila')->toDateTimeString();

        DB::table('scholars_fcvkss')
            ->where([
                ['cron_is_being_processed', 1],
                ['updated_at', '<', $timenow_less_30]
            ])
            ->update([
                'cron_is_being_processed' => null
            ]);

        return 'OK';

    }




    // this is the core function on getting the latest and updated data of SLP and related data
    // 
    public function slp_api_v1(Request $request)
    {
        
        set_time_limit(0);

        // Starting clock time in seconds
        $start_time = microtime(true);


        
        $ronin_addresses    =   DB::table('axiemanagercom.scholars_fcvkss')
                                ->select('ronin_address')
                                ->where('ronin_address', '!=', 'ronin:0000000000000000000000000000000000000000')
                                ->limit(200)->get()->toArray();

        // limit each to 200 calls
        foreach (array_chunk($ronin_addresses, 200) as $chunked_ronins) {
            
            // array of curl handles
            $_multiCurl    = [];

            // fetched raw data from sky mavis
            $_results      = [];
            
            // multi handle
            $_mh           = curl_multi_init();
            
            foreach(array_column($chunked_ronins, 'ronin_address') as $i => $ronin) {
            
                // URL from which data will be fetched
                $fetchURL         = sprintf("https://game-api.axie.technology/api/v2/%s", str_replace('ronin:', '0x', $ronin));

                $_multiCurl[$i]     = curl_init();

                $headers = array(
                    "Accept: application/json",
                    "Cache-Control: no-cache"
                );

                curl_setopt($_multiCurl[$i], CURLOPT_URL, $fetchURL);
                curl_setopt($_multiCurl[$i], CURLOPT_HEADER, 0);
                curl_setopt($_multiCurl[$i], CURLOPT_DNS_CACHE_TIMEOUT,0);
                curl_setopt($_multiCurl[$i], CURLOPT_FRESH_CONNECT, TRUE);
                curl_setopt($_multiCurl[$i], CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($_multiCurl[$i], CURLOPT_HTTPHEADER, $headers);
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
        
        }

        // DB::table('scholars_daily_slp')->upsert($ca, 'unique_ronin_and_date');



		// End clock time in seconds
		$end_time = microtime(true);
		
		// Calculate script execution time
		$execution_time = ($end_time - $start_time);

        dd("end of the line " . round($execution_time,2) . " seconds", $_results);
        






















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
