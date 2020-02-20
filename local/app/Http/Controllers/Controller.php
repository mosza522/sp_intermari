<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
    public function Time_Diff_Minutes($DateTime1, $DateTime2) 
	{
		if( $DateTime1 > '23:59' || $DateTime2 > '23:59' ){
			return NULL;
		}
		
		if( !empty($DateTime1) && !empty($DateTime2) ){
			if( $DateTime1 > $DateTime2 ){
				$DateTime1	= date('2020-01-01').$DateTime1.':00';
				$DateTime2	= date('2020-01-02').$DateTime2.':00';
			}
			return (strtotime($DateTime2) - strtotime($DateTime1))/60;
		}
		return NULL;
	}
	
	
	
	
    public function runNumberCode( $Prefix,  $Models, $Where=false , $number = 'work_number', $dateAt=false ){
		if(  $dateAt ){
			$sTable = $Models::withTrashed()->where($dateAt,'>',date('Y-m').'-01 00:00:01')->selectRaw('RIGHT( '.$number.', 3 ) AS count');
		}else{
			$sTable = $Models::withTrashed()->where('created_at','>',date('Y-m').'-01 00:00:01')->selectRaw('RIGHT( '.$number.', 3 ) AS count');
		}
		
		if( $Where ){
			foreach( $Where AS $key => $val ){
				$sTable->where($key, $val);
			}
		}
		
		if( $sRow = $sTable->orderBy('id', 'desc')->first() ){
			$qCount = $sRow->count+1;
		}else{
			$qCount = 1;
		}
		return $Prefix.date('ym').sprintf('%03d',$qCount);
	}
	
	function convertToHoursMins($time) {
		$hours = floor($time / 60);
		$minutes = ($time % 60);
		return sprintf('%02d:%02d', $hours, $minutes);
	}
}
