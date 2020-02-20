<?php
namespace App\Http\Controllers\SWP\Operation;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PlanController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow 			= \App\Models\SMD\SmdItem::Smd($ItemID);
		$sRowMachine	= \App\Models\Master\Machine::where('DivisionID', '5')->get();
			
		if( $sRow ){
			$rowItem 	= \App\Models\SMD\SmdItem::Item($sRow);
			$sPlan 		= \App\Models\SWP\Operation\Plan::find($ItemID);
			return View('SWP.Operation.Plan')
					->with(array(
						'sRow' 			=> $sRow,
						'sPlan' 		=> $sPlan,
						'rowItem' 		=> $rowItem,
						'sRowMachine' 	=> $sRowMachine,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action($sRow->work_mode.'\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
    public function store( $ItemID ) 
    {
			$sData = \App\Models\SWP\Operation\Plan::find($ItemID);
			if( empty($sData) ) $sData = new \App\Models\SWP\Operation\Plan;
			$sData->ItemID		= $ItemID;
			$sData->workVolume	= str_replace(',','',request('workVolume'));
			$sData->workMachines= str_replace(',','',request('workMachines'));
			$sData->workGoal	= str_replace(',','',request('workGoal'));
			$sData->workDay		= str_replace(',','',request('workDay'));
			$sData->workStart	= date('Y-m-d',strtotime(request('workStart')));
			$sData->workEnd		= date('Y-m-d',strtotime(request('workEnd')));
			$sData->save();
			
			$sItem = \App\Models\SMD\SmdItem::find($ItemID);
			$sItem->work_status_swp = request('work_status_swp');
			$sItem->save();
		
			return redirect()->action('SWP\Operation\PlanController@index',$ItemID)->with(['alert'=>\App\Models\Alert::Msg('success')]);
		
	}
	
	
}
