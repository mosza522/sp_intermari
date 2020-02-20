<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareBuoyController extends Controller
{
	
    public function index( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Smd_Owner','ck_Master_Smd_Owner.id', 'ck_Smd.OwnerID')
				->select(
					'ck_Smd_Item.id', 
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
					'ck_Master_Smd_Boat.BoatName', 
					'ck_Master_Smd_Owner.OwnerName'
				)->find($ItemID);
		
		if( $sRow ){
			$rowItem = \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
					->select('ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')
					->where('SmdID',$sRow->SmdID)
					->get();
					
			return View('FTS.Prepare.Buoy')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true,
						'sTitle' 		=> $sRow->work_number .' : ใบเตรียมความพร้อมโฟร์แมน'
					)
				);
		}else{
			return redirect()->action('FTS\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }

	
    public function AjaxInsert( $ItemID ){
		$sRowItem = \App\Models\SMD\SmdItem::find($ItemID);
		if( request('DepartmentID') && $sRowItem->count() ){
			$sRowJob	= \App\Models\SMD\Smd::find($sRowItem->SmdID);
			$qCount		= \App\Models\FTS\Operation::where('workStart',$sRowJob->job_date_eta)
					->whereIn('workStatus', [1,2])
					->where('DepartmentID',request('DepartmentID'))
					->count();
			if( $qCount == 0 ){
				$qCount = \App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count() == 0 || empty(\App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count()) ? 1 : \App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count()+1;
				$sData 				= new \App\Models\FTS\Operation;
				$sData->ItemID		= $ItemID;
				$sData->DepartmentID= request('DepartmentID');
				$sData->workStart	= $sRowJob->job_date_eta;
				$sData->workForecast= date('Y-m-d H:i:s', strtotime('+3 days', strtotime($sRowJob->job_date_eta)));
				$sData->workNumber	= 'FT1'.date('ym').sprintf('%03d',$qCount);
				$sData->workStatus	= 1;
				$sData->save();
				
				$sRowItem->work_buoy 		= \App\Models\FTS\Operation::whereIn('workStatus', [1,2,3])->where('ItemID',$ItemID)->count();
				$sRowItem->work_prepare_fts 	= 'Y';
				$sRowItem->save();
				return response()->json(\App\Models\Alert::Msg('success'));
			}else{
				return response()->json(\App\Models\Alert::Msg('warning'));
			}
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxUpdate( $ItemID ){
		$sData = \App\Models\FTS\Operation::find(request('id'));
		if( $sData ){
			$qCount = \App\Models\FTS\Operation::where('workStart', date('Y-m-d H:i:s',strtotime(request('workStart'))) )
					->whereIn('workStatus', [1,2])
					->where('DepartmentID',$sData->DepartmentID)
					->where('id','!=',$sData->id)
					->count();
					
			if( $qCount == 0 ){
				
				if( request('workFinish') ){
					$sData->workFinish	= date('Y-m-d H:i:s',strtotime(request('workFinish')));
					$sData->workStatus	= request('workStatus');
					
					
					$sCount = \App\Models\SWP\PrepareMachine::where('ItemID',$ItemID)->where('InspectionType','A')->count();
					
					if( $sCount == 0 ){
						$sRow 	= \App\Models\SWP\PrepareMachine::where('ItemID',$ItemID)->where('InspectionType','B')->get();
						if( $sRow->count() > 0 ){
							foreach( $sRow AS $r ){
								\App\Models\SWP\PrepareMachine::firstOrCreate([
									'Division'		=> $r->Division,
									'ItemID'		=> $ItemID,
									'MachineID' 	=> $r->MachineID,
									'InspectionType' => 'A'
								]);
							}
						}
					}
				}else{
					if( request('workStatus') ) $sData->workStatus	= request('workStatus');
					$sData->workStart	= date('Y-m-d H:i:s',strtotime(request('workStart')));
				}
				
				$sData->workNote	= request('workNote');
				$sData->save();
				return response()->json(\App\Models\Alert::Msg('success'));
			}else{
				return response()->json(\App\Models\Alert::Msg('warning'));
			}
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxDelete( $ItemID ){
		$sData = \App\Models\FTS\Operation::find(request('id'));
		if( $sData ){
			$sData->workStatus	= 0;
			$sData->save();
			\App\Models\FTS\Staff::where('OperationID', $sData->id)->update(['workStatus' => '0']);
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
	
	
	
    public function postDatatable( $ItemID ){
		$sTable	= \App\Models\FTS\Operation::join('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID','=','ck_Item_Fts_Operation.DepartmentID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation.updated_by')
					->select('ck_Item_Fts_Operation.id', 'workNumber', 'BuoyName', 'workStart', 'workFinish', 'workStatus', 'workNote', 'workStaff', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Fts_Operation.created_at', 'ck_Item_Fts_Operation.updated_at')
					->where('ItemID',$ItemID);
					
					
		if( request('workStatus') ){
			$sTable->where('workStatus', '!=', '0');
		}
		
        return DataTables::of($sTable->get())->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus == 0 )	return 'ยกเลิกการใช้ทุ่น';
			if( $data->workStatus == 1 )	return 'รอดำเนินการ';
			if( $data->workStatus == 2 )	return 'กำลังดำเนินการ';
			if( $data->workStatus == 3 )	return 'ดำเนินการเสร็จ';
		})
		->editColumn('workStart',function($data){
			return date('d-m-Y H:i', strtotime($data->workStart));
		})
		->editColumn('workFinish',function($data){
			if( $data->workFinish ) return date('d-m-Y H:i', strtotime($data->workFinish));
		})
		->make(true);
	}

	
	
	 
    public function postDatatableWithWeight( $SmdID )
	{
        $sData			= new Collection;
		$arrProduct		= array();
		$sRowProduct 	= \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
						->leftJoin('ck_Item_Fts_Buoy_Product','ck_Item_Fts_Buoy_Product.ProductID','=','ck_Smd_2_Item.ProductID')
						->select('ck_Smd_2_Item.ProductID', 'ProductName', 'WeightMonthly', 'WeightYearly', 'DepartmentID')->where('SmdID',$SmdID)->get();
		if( $sRowProduct ){
			foreach( $sRowProduct AS $r ){
				$arrProduct[$r->ProductID]['Name'] 					= $r->ProductName;
				$arrProduct[$r->ProductID]['WMonthly'][$r->DepartmentID] 	= $r->WeightMonthly;
				$arrProduct[$r->ProductID]['WYearly'][$r->DepartmentID] 	= $r->WeightYearly;
			}
		}
		
		$sTable = \App\Models\Master\FTS\Buoy::all();
		$sBuoy	= 0;
		if( $sTable ){
			foreach( $sTable AS $r ){
				foreach($arrProduct AS $p ){
					$sData->push([
						'DepartmentID'		=> ( $sBuoy == $r->DepartmentID ) ?'':$r->DepartmentID,
						'BuoyName'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->BuoyName,
						'BuoyStatus'		=> ( $sBuoy == $r->DepartmentID ) ?'':($r->BuoyStatus==1?'ใช้งานได้ปกติ':'ไม่สามารถใช้งานได้'),
						'BuoyNote'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->BuoyNote,
						'WeightMonthly'		=> ( $sBuoy == $r->DepartmentID ) ?'':(empty($r->WeightMonthly)?'0.00':number_format($r->WeightMonthly,2)),
						'WeightYearly'		=> ( $sBuoy == $r->DepartmentID ) ?'':(empty($r->WeightYearly)?'0.00':number_format($r->WeightYearly,2)),
						'LastWork'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->LastWork,
						'LastJob'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->LastJob,
						'QueueJob'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->QueueJob,
						'LastEnd'			=> ( $sBuoy == $r->DepartmentID ) ?'':$r->LastEnd,
						'ProductName'		=> $p['Name'],
						'WMonthly'			=> empty($p['WMonthly'][$r->DepartmentID])?'0.00':number_format($p['WMonthly'][$r->DepartmentID],2),
						'WYearly'			=> empty($p['WYearly'][$r->DepartmentID])?'0.00':number_format($p['WYearly'][$r->DepartmentID],2),
					]);
					if( $sBuoy != $r->DepartmentID ) $sBuoy = $r->DepartmentID;
				}
			}
		}
        return DataTables::of($sData)->escapeColumns([])->make(true);
	}
	
	
	
	
	
	
}
