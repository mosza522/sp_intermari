<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationElectricityController extends Controller
{
    public function index( $OperationID ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem = \App\Models\FTS\Operation::Item($sRow->SmdID);
			return View('FTS.Operation.ElectricityIndex')
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
		return $this->ElectricityForm($OperationID);
    }
	
    public function show($OperationID, $ElectricityID) 
    {
		return $this->ElectricityForm($OperationID, $ElectricityID);
    }
	

	#-------------------------------------------------------------------------------------------------------------------------------------
	# Operation Electricity
	#-------------------------------------------------------------------------------------------------------------------------------------
    public function ElectricityForm($OperationID, $ElectricityID=null ) 
    {
		$sRow = \App\Models\FTS\Operation::Join('ck_Smd_Item','ck_Smd_Item.id', 'ck_Item_Fts_Operation.ItemID')
				->Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID', 'ck_Item_Fts_Operation.DepartmentID')
				->leftJoin('ck_Item_Fts_Operation_Electricity', function($join) use($ElectricityID){
					$join->on('ck_Item_Fts_Operation_Electricity.OperationID','=','ck_Item_Fts_Operation.id')->where('ck_Item_Fts_Operation_Electricity.id',$ElectricityID);
				})
				->select(
					'ck_Item_Fts_Operation.id AS OperationID', 
					'ck_Item_Fts_Operation.DepartmentID', 
					'ck_Item_Fts_Operation.ItemID', 
					'ck_Item_Fts_Operation.workNote', 
					'ck_Item_Fts_Operation.workNumber AS Operation_workNumber',
					'ck_Smd_Item.SmdID', 
					'ck_Smd_Item.work_type', 
					'ck_Smd_Item.work_load', 
					'ck_Smd_Item.work_note', 
					'ck_Smd_Item.work_grab', 
					'ck_Smd_Item.created_at', 
					'ck_Smd_Item.work_number', 
					'ck_Smd_Item.work_sealine', 
					'ck_Smd.job_unit', 
					'ck_Smd.job_weight', 
					'ck_Smd.job_date_eta', 
					'ck_Smd.job_transport', 
					'ck_Item_Fts_Operation_Electricity.id', 
					'ck_Item_Fts_Operation_Electricity.workNumber AS Oil_workNumber', 
					'ck_Item_Fts_Operation_Electricity.workDate AS Oil_workDate', 
					'ck_Master_Fts_Buoy.BuoyName', 
					'ck_Master_Smd_Boat.BoatName'
				)->find($OperationID);
				
		if( $sRow ){
			if( isset($ElectricityID) && empty($sRow->id) ){
				return redirect()->action('FTS\OperationController@show', $OperationID)->with(['alert'=>\App\Models\Alert::Msg('danger')]);
			}
			
			$arrayUse		= array();
			$arrayRebate	= array();
			$rowItem 		= \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')->select('ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')->where('SmdID',$sRow->SmdID)->get();
			$rowMachine		= \App\Models\Master\Machine::where('MachineType', 'Gennerrator')->where('DepartmentID', $sRow->DepartmentID)->get();
			
			if( $sRow->id ){
				$rowUse 		= \App\Models\FTS\OperationElectricityUse::where('ElectricityID',$sRow->id)->get();
				$rowRebate 		= \App\Models\FTS\OperationElectricityRebate::where('ElectricityID',$sRow->id)->get();
				if( $rowUse ){
					foreach( $rowUse AS $r){
						$arrayUse[$r->MachineID]['start'] 	= substr($r->start_at,0,5);
						$arrayUse[$r->MachineID]['finish'] 	= substr($r->finish_at,0,5);
					}
				}
				if( $rowRebate ){
					foreach( $rowRebate AS $r){
						$arrayRebate[$r->MachineID][$r->RebateNo]['start'] 	= substr($r->start_at,0,5);
						$arrayRebate[$r->MachineID][$r->RebateNo]['finish']	= substr($r->finish_at,0,5);
						$arrayRebate[$r->MachineID][$r->RebateNo]['Note'] 	= $r->Note;
					}
				}
			}
			
			return View('FTS.Operation.ElectricityForm')
					->with(array(
						'sRow' 				=> $sRow,
						'rowItem'			=> $rowItem,
						'rowMachine'		=> $rowMachine,
						'arrayUse'			=> empty($arrayUse)?null:$arrayUse,
						'arrayRebate'		=> empty($arrayRebate)?null:$arrayRebate,
						'PageContainer'		=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
    public function store($OperationID) 
    {
		$sData = \App\Models\FTS\OperationElectricity::where('id','!=',request('ElectricityID'))->where('OperationID',$OperationID)->where('workDate',date('Y-m-d',strtotime(request('workDate'))))->count();
		if( empty($sData) && !empty(request('workDate'))  ){
			if( request('ElectricityID') ){
				$sData = \App\Models\FTS\OperationElectricity::find(request('ElectricityID'));
			}
			if( empty($sData) ){
				$sData	= new \App\Models\FTS\OperationElectricity;
				$qCount = (\App\Models\FTS\OperationElectricity::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationElectricity::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationElectricity::where('OperationID',$OperationID)->count()+1;
				
				$rsOperation 		= \App\Models\FTS\Operation::find($OperationID);
				$sData->workNumber	= $rsOperation->workNumber.'-E'.sprintf('%02d',$qCount);
				$sData->OperationID	= $OperationID;
			}
			$sData->workDate = date('Y-m-d',strtotime(request('workDate')));
			$sData->save();
			$ElectricityID = $sData->id;
			
			
			\App\Models\FTS\OperationElectricityUse::where('ElectricityID',request('ElectricityID'))->delete();
			\App\Models\FTS\OperationElectricityRebate::where('ElectricityID',request('ElectricityID'))->delete();
			if( request('MachineID') ){
				foreach( request('MachineID') AS $MachineID => $row ){
					#-------------------------------------------------
					if( !empty(request('start_at')[$MachineID]) && !empty(request('finish_at')[$MachineID]) ){
						$time_rebate = 0;
						if( !empty(request('Note')[$MachineID]) ){
							foreach( request('Note')[$MachineID] AS $RebateNo => $row ){
								if( !empty(request('Note')[$MachineID][$RebateNo]) ){
									$time_use = $this->Time_Diff_Minutes( request('restart_at')[$MachineID][$RebateNo], request('refinish_at')[$MachineID][$RebateNo] );
									\App\Models\FTS\OperationElectricityRebate::firstOrCreate([
										'ElectricityID'	=> $ElectricityID,
										'MachineID' 	=> $MachineID,
										'RebateNo' 		=> $RebateNo,
										'Note' 			=> request('Note')[$MachineID][$RebateNo],
										'start_at' 		=> request('restart_at')[$MachineID][$RebateNo],
										'finish_at' 	=> request('refinish_at')[$MachineID][$RebateNo],
										'time_use' 		=> $time_use
									]);
									$time_rebate = empty($time_use)?$time_rebate:($time_rebate+$time_use);
								}
							}
						}
						
						#-------------------------------------------------
						$time_use = $this->Time_Diff_Minutes( request('start_at')[$MachineID], request('finish_at')[$MachineID] );
						\App\Models\FTS\OperationElectricityUse::firstOrCreate([
							'ElectricityID'	=> $ElectricityID,
							'MachineID' 	=> $MachineID,
							'start_at' 		=> request('start_at')[$MachineID],
							'finish_at' 	=> request('finish_at')[$MachineID],
							'time_use' 		=> $time_use,
							'time_rebate' 	=> $time_rebate,
							'time_remain' 	=> $time_use-$time_rebate
						]);
					}
					#-------------------------------------------------
				}
			}
			return redirect()->action('FTS\OperationElectricityController@show', array($OperationID,$ElectricityID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('FTS\OperationElectricityController@create', $OperationID)->with(['alert'=>\App\Models\Alert::Msg('warning','Duplicate')]);
		}
    }
	

	public function postDatatable($OperationID){
		$sTable	= \App\Models\FTS\OperationElectricity::leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Electricity.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Electricity.updated_by')
					->select('ck_Item_Fts_Operation_Electricity.id', 'workNumber', 'workDate', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Fts_Operation_Electricity.created_at', 'ck_Item_Fts_Operation_Electricity.updated_at')
					->where('OperationID',$OperationID);
					
		$sQuery	= DataTables::of($sTable);
		return $sQuery->make(true);
	}
	
	
	

	
	
	
	
	
}
