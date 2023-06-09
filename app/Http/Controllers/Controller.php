<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Hashids\Hashids;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function LastInsertedId()
    {
        return DB::getPdo()->lastInsertId();
    }





    /* Initiate the hashing */
    public function defaultHash()
    {
        return new Hashids('86PC8SUoF1rG+4MC2Z8pD1AV76N3ey8ycmQr5T5hpBg=', 10, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
    }





    /* Encrypt the id */
    public function HashID($value_id)
    {

        $hashids = $this->defaultHash();

        return $hashids->encode($value_id);

    }





    /* Decrypt the id */
    public function DecodeHashedID($value_id)
    {

        $hashids = $this->defaultHash();

        $id = $hashids->decode($value_id);

        /* date modified: 08232020 | added count() */
        return ( count($id) > 0 ) ? $id[0] : null;

    }





    public function ManagerTotalScholars($manager_id)
    {

        $count = DB::table('managers_scholar')->where('manager_id', $manager_id)->count();

        return $count;
        
    }


    


    // get updated coin price from coingecko
    public function coin_price()
    {

        $set_currency_code      = 'usd'; /* <-- default currency if none is set */
        $set_currency_symbol    = '$';
                
        // if currency is already set for the visitor
        if ( null !== session('currency_code') ) {

            $set_currency_code      = session('currency_code');
            $set_currency_symbol    = session('currency_symbol');

        }
         
        // query coin prices record in our db
        $coin_results   = DB::table('coin_price')
                        ->where([
                            ['currency_code', $set_currency_code]
                        ])
                        ->select([
                            'currency_code',
                            'eth_price',
                            'eth_24_change',
                            'slp_price',
                            'slp_24_change',
                            'axs_price',
                            'axs_24_change'
                        ])
                        ->first();
                        
        if ( $coin_results ) {
            $data = [
                    'curr_symbol'           =>  $set_currency_symbol,

                    'eth'                   => $coin_results->eth_price ,
                    'slp'                   => $coin_results->slp_price,
                    'axs'                   => $coin_results->axs_price,
                    
                    // formated for display purposes
                    'f_eth'                 => $set_currency_symbol . number_format( $coin_results->eth_price, 2 ),
                    'f_slp'                 => $set_currency_symbol . number_format( $coin_results->slp_price, 2 ),
                    'f_axs'                 => $set_currency_symbol . number_format( $coin_results->axs_price, 2 ),

                    'eth_last_24_change'    => number_format( $coin_results->eth_24_change, 2 ),
                    'slp_last_24_change'    => number_format( $coin_results->slp_24_change, 2 ),
                    'axs_last_24_change'    => number_format( $coin_results->axs_24_change, 2 ),
                ];
        }
        else {
            $data['error'] = 'D242DdwwXXe: Query Error.';
        }

        return $data;
        
    }


    // get updated site summary total manager, total ronin, site age
    public function site_stats()
    {
        
        // construct date start
        $date = Carbon::parse('2021-06-18 00:00:00');
        $now = Carbon::now();

        $diff = $date->diffInDays($now);

        // get total count of managers and scholars
        $managers = DB::table('managers')->count();
        $scholars = DB::table('scholars_fcvkss')->count();

        if ($managers && $scholars) {

            $data = [
                'tot_managers'  => number_format($managers, 0, 0, ','),
                'tot_scholars'  => number_format($scholars, 0, 0, ','),
                'days'          => $diff,
            ];

        } else {
            $data['error'] = '$46545Dss: Query Error.';
        }

        return $data;
    }





    // sort and fitler for fetched scholars
    public function sort_by($sortBy)
    {

        // sort by values
        // 0 - default (id)
        // 1 - name
        // 2 - highest slp
        // 3 - lowest slp
        // 4 - higher qhr
        // 5 - lowest qhr
        // 6 - claimable date (asc)
        // 7 - highest ⚔️ MMR
        // 8 - lower ⚔️ MMR
        // 9 - highest average slp
        // 10 - lowest average slp
        // 11 - highest today slp
        // 12 - lowest today slp
        // 13 - highest yesterday slp
        // 14 - lowest yesterday slp
        $array_sort_qhr                 = null;
        $array_sort_qhr_asc             = null;
        $array_sort_qhr_desc            = null;
        $array_sort_avg_slp             = null;
        $array_sort_avg_slp_asc         = null;
        $array_sort_avg_slp_desc        = null;
        $array_sort_today_slp           = null;
        $array_sort_today_slp_asc       = null;
        $array_sort_today_slp_desc      = null;
        $array_sort_yesterday_slp       = null;
        $array_sort_yesterday_slp_asc   = null;
        $array_sort_yesterday_slp_desc  = null;
        $order_by_value                 = null;
        $order_by_asc_desc              = null;

        if ( $sortBy == 1) {
            $order_by_value         = 'managers_scholar.scholar_name';
            $order_by_asc_desc      = 'ASC';
        }
        else if ( $sortBy == 2) {
            $order_by_value         = 'scholars_fcvkss.in_game_slp';
            $order_by_asc_desc      = 'DESC';
        } 
        else if ($sortBy == 3) {
            $order_by_value         = 'scholars_fcvkss.in_game_slp';
            $order_by_asc_desc      = 'ASC';
        } 
        else if ($sortBy == 4) {
            $array_sort_qhr         = true;
            $array_sort_qhr_desc    = true;
        } 
        else if ($sortBy == 5) {
            $array_sort_qhr         = true;
            $array_sort_qhr_asc     = true;
        } 
        else if ($sortBy == 6) {
            $order_by_value         = 'scholars_fcvkss.last_claimed_item_at';
            $order_by_asc_desc      = 'ASC';
        } 
        else if ($sortBy == 7) {
            $order_by_value         = 'scholars_fcvkss.mmr';
            $order_by_asc_desc      = 'DESC';
        } 
        else if ($sortBy == 8) {
            $order_by_value         = 'scholars_fcvkss.mmr';
            $order_by_asc_desc      = 'ASC';
        } 
        else if ($sortBy == 9) {
            $array_sort_avg_slp         = true;
            $array_sort_avg_slp_desc    = true;
        } 
        else if ($sortBy == 10) {
            $array_sort_avg_slp         = true;
            $array_sort_avg_slp_asc     = true;
        } 
        else if ($sortBy == 11) {
            $array_sort_today_slp         = true;
            $array_sort_today_slp_desc    = true;
        } 
        else if ($sortBy == 12) {
            $array_sort_today_slp         = true;
            $array_sort_today_slp_asc     = true;
        } 
        else if ($sortBy == 13) {
            $array_sort_yesterday_slp         = true;
            $array_sort_yesterday_slp_desc    = true;
        } 
        else if ($sortBy == 14) {
            $array_sort_yesterday_slp         = true;
            $array_sort_yesterday_slp_asc     = true;
        } 

        // delete sort session data
        session()->forget([
            'scholar_sort_by',
            'scholar_sort_asc_desc',
            
            'array_sort_qhr',
            'array_sort_qhr_order',

            'array_sort_avg_slp',
            'array_sort_avg_slp_order',

            'array_sort_today_slp',
            'array_sort_today_slp_order',

            'array_sort_yesterday_slp',
            'array_sort_yesterday_slp_order',
        ]);

        // create sort session data
        session([
            'scholar_sort_by'                   => $order_by_value,
            'scholar_sort_asc_desc'             => $order_by_asc_desc,

            'array_sort_qhr'                    => $array_sort_qhr,
            'array_sort_qhr_order'              => $array_sort_qhr_asc == true ?  SORT_ASC  : ($array_sort_qhr_desc == true  ?  SORT_DESC  : null),

            'array_sort_avg_slp'                => $array_sort_avg_slp,
            'array_sort_avg_slp_order'          => $array_sort_avg_slp_asc == true ?  SORT_ASC  : ($array_sort_avg_slp_desc == true  ?  SORT_DESC  : null),

            'array_sort_today_slp'              => $array_sort_today_slp,
            'array_sort_today_slp_order'        => $array_sort_today_slp_asc == true ?  SORT_ASC  : ($array_sort_today_slp_desc == true  ?  SORT_DESC  : null),

            'array_sort_yesterday_slp'          => $array_sort_yesterday_slp,
            'array_sort_yesterday_slp_order'    => $array_sort_yesterday_slp_asc == true ?  SORT_ASC  : ($array_sort_yesterday_slp_desc == true  ?  SORT_DESC  : null),
        ]);

        return $data = [
            'success' => true,
        ];

    }





    /**
     * Compute average slp from the 
     * 
     * 
    */
    public function average_slp($in_game_slp, $last_claim_utc, $visitor_tz)
    {

        if ($last_claim_utc <= 0 || $in_game_slp <= 0) 
        {
            return 0;
       }
        
        $to             = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::today()->tz($visitor_tz));
        $unix_to_carbon = Carbon::createFromTimestamp($last_claim_utc)->toDateTimeString();
        $from           = Carbon::createFromFormat('Y-m-d H:i:s', $unix_to_carbon)->tz($visitor_tz);

        // get difference in hours from the 2 provided dates
        $diff_in_days  = round( $from->diffInHours($to) / 24 );

        if ( $diff_in_days <= 0 ) 
        {
            return 0;
        }

        // return $diff_in_days;
        return round($in_game_slp / $diff_in_days);

    }

}
