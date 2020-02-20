<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationOilBuoyController extends Controller
{
    public function index( $OperationID ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem = \App\Models\FTS\Operation::Item($sRow->SmdID);
			return View('FTS.Operation.OilBuoyIndex')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
	

	
    public function create($OperationID) 
    {
		return $this->OilBuoyForm($OperationID);
    }
	
    public function show($OperationID, $OilDepartmentID) 
    {
		return $this->OilBuoyForm($OperationID, $OilDepartmentID);
    }
	

	
    public function store($OperationID) 
    {
		$sData = \App\Models\FTS\OperationOilBuoy::where('id','!=',request('OilBuoyID'))->where('OperationID',$OperationID)->where('workDate',date('Y-m-d',strtotime(request('workDate'))))->count();
		if( empty($sData) && !empty(request('workDate'))  ){
			if( request('OilBuoyID') ){
				$sData = \App\Models\FTS\OperationOilBuoy::find(request('OilBuoyID'));
			}
			if( empty($sData) ){
				$sData	= new \App\Models\FTS\OperationOilBuoy;
				$qCount = (\App\Models\FTS\OperationOilBuoy::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationOilBuoy::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationOilBuoy::where('OperationID',$OperationID)->count()+1;
				
				$rsOperation 		= \App\Models\FTS\Operation::find($OperationID);
				$sData->workNumber	= $rsOperation->workNumber.'-B'.sprintf('%02d',$qCount);
				$sData->OperationID	= $OperationID;
			}
			$sData->workDate = date('Y-m-d',strtotime(request('workDate')));
			$sData->save();
			$OilBuoyID = $sData->id;
			
			
			\App\Models\FTS\OperationOilBuoyPick::where('OilBuoyID',request('OilBuoyID'))->delete();
			\App\Models\FTS\OperationOilBuoyFuel::where('OilBuoyID',request('OilBuoyID'))->delete();
			#--------------------------------------------------------------------------------------------------
			if( request('timePick') ){
				foreach( request('timePick') AS $Index => $row ){
					if( !empty(request('timePick')[$Index]) && !empty(request('amount')[$Index]) ){
						\App\Models\FTS\OperationOilBuoyPick::firstOrCreate([
							'OilBuoyID'		=> $OilBuoyID,
							'time_at' 		=> request('timePick')[$Index],
							'dispenser' 	=> request('dispenser')[$Index],
							'amount' 		=> request('amount')[$Index],
						]);
					}
				}
			}
			#--------------------------------------------------------------------------------------------------
			if( request('time_at') ){
				foreach( request('time_at') AS $Index => $row ){
					if( !empty(request('time_at')[$Index]) && !empty(request('amount')[$Index]) ){
						\App\Models\FTS\OperationOilBuoyFuel::firstOrCreate([
							'OilBuoyID'		=> $OilBuoyID,
							'time_at' 		=> request('time_at')[$Index],
							'bearer' 		=> request('bearer')[$Index],
							'meter_before' 	=> request('meter_before')[$Index],
							'meter_after' 	=> request('meter_after')[$Index],
							'meter_amount' 	=> request('meter_amount')[$Index],
							'jobtype' 		=> request('jobtype')[$Index],
							'jobdetail' 	=> request('jobdetail')[$Index],
						]);
					}
				}
			}
			#--------------------------------------------------------------------------------------------------
			return redirect()->action('FTS\OperationOilBuoyController@show', array($OperationID,$OilBuoyID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('FTS\OperationOilBuoyController@create', $OperationID)->with(['alert'=>\App\Models\Alert::Msg('warning','Duplicate')]);
		}
    }
	
    public function update($OperationID, $id) 
    {
		
	}
	
    public function OilBuoyForm($OperationID, $OilBuoyID=null ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem 	= \App\Models\FTS\Operation::Item($sRow->SmdID);
			$rowOilBuoy = \App\Models\FTS\OperationOilBuoy::find($OilBuoyID);
			
			if( $rowOilBuoy && $rowOilBuoy->id ){
				$rowPick 	= \App\Models\FTS\OperationOilBuoyPick::where('OilBuoyID',$rowOilBuoy->id)->get();
				$rowFuel 	= \App\Models\FTS\OperationOilBuoyFuel::where('OilBuoyID',$rowOilBuoy->id)->get();
			}
			return View('FTS.Operation.OilBuoyForm')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'rowOilBuoy'	=> $rowOilBuoy,
						'rowPick'		=> empty($rowPick)?NULL:$rowPick,
						'rowFuel'		=> empty($rowFuel)?NULL:$rowFuel,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
	
	public function postDatatable($OperationID){
		$sTable	= \App\Models\FTS\OperationOilBuoy::leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Oil_Buoy.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Oil_Buoy.updated_by')
					->select('ck_Item_Fts_Operation_Oil_Buoy.id', 'workNumber', 'workDate', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Fts_Operation_Oil_Buoy.created_at', 'ck_Item_Fts_Operation_Oil_Buoy.updated_at')
					->where('OperationID',$OperationID);
					
		$sQuery	= DataTables::of($sTable);
		return $sQuery->make(true);
	}
}
