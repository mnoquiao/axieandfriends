<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CronDelRawLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:delrawlogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete raw logs that is 2 days and old';

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

        // on success clear also `scholar_raw_logs` table
        $total_deleted = DB::table('scholar_raw_logs')
        ->whereRaw("`created_at` <= DATE_SUB(curdate(), INTERVAL 2 DAY)")
        ->delete();

        DB::table('log_deleted_counts')
        ->insert([
            'table' => 'scholar_raw_logs',
            'count' => $total_deleted,
        ]);
        
    }
}
