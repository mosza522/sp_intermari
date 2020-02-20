<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class lbms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fmo:lbms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
		$sDate 	= date('Y-m-d', strtotime('-1 day'));
		$fmo 	= new \App\Http\Controllers\LbmsController;
		$fmo->Generate($sDate, 'DB1-P1-S2001', true);
		$fmo->Generate($sDate, 'DB1-P2-S2001', true);
		$fmo->Generate($sDate, 'DB2-P3-S1000', true);
    }
}
