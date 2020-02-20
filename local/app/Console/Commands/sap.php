<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class sap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fmo:sap';

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
		$fmo 	= new \App\Http\Controllers\SapController;
		$fmo->Import();
		echo 'SAP Import Success!!';
    }
}
