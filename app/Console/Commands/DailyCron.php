<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:hourlysnap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hourly Snapshot of most important table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            // managers table
            $count_managers     = DB::table('managers')->count('id');

            // manager's scholars table
            $count_scholars     = DB::table('managers_scholar')->count('id');

            // scholars daily slp table
            $count_daily_slp    = DB::table('scholars_daily_slp')->count('id');

            // scholars raw lags table
            $count_raw_logs     = DB::table('scholar_raw_logs')->count('id');

            // total scholar unique by ronin address
            $count_scholars     = DB::table('scholars_fcvkss')->count('id');
            
            $count_arr[] = [
                'managers'                  => $count_managers,
                'managers_scholar'          => $count_scholars,
                'scholars_daily_slp'        => $count_daily_slp,
                'scholar_raw_logs'          => $count_raw_logs,
                'scholars_fcvkss'           => $count_scholars,
            ];
        
            DB::table('log_rawcount_snapshot')->insert([
                'snapshot' => json_encode($count_arr)
            ]);

    }
}
