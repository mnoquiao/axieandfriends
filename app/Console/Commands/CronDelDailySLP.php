<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CronDelDailySLP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:deldailyslp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete daily slp record that is 1 month older';

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

        $total_deleted = DB::table('scholars_daily_slp')
        ->whereRaw("`date` < DATE_SUB(curdate(), INTERVAL 1 MONTH)")
        ->delete();

        DB::table('log_deleted_counts')
        ->insert([
            'table' => 'scholars_daily_slp',
            'count' => $total_deleted,
        ]);
        
    }
}
