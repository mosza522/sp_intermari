<?php
namespace App\Http\Controllers\SWP;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareForemanController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
			$rowWarehouse = \App\Models\SMD\SmdItem::ItemSWPWarehouse($sRow);
			return View('SWP.Prepare.Foreman')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true,
						'sTitle' 		=> $sRow->work_number .' : ใบเตรียมความพร้อมโฟร์แมน'
					)
				);
		}else{
			return redirect()->action($sRow->work_mode.'\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
	
	
    public function AjaxInsert( $ItemID ){
		$sRowItem = \App\Models\SMD\SmdItem::find($ItemID);
		if( request('ForemanID') && $sRowItem->count() ){
			$sRowJob	= \App\Models\SMD\Smd::find($sRowItem->SmdID);
			$qCount		= \App\Models\SWP\PrepareForeman::where('workStart',$sRowJob->job_date_eta)
					->where('Division',$sRowItem->work_mode)
					->where('ForemanID',request('ForemanID'))
					->whereIn('workStatus', [1,2])
					->where('ItemID',$ItemID)
					->count();
			if( $qCount == 0 ){
				$sData 				= new \App\Models\SWP\PrepareForeman;
				$sData->ItemID		= $ItemID;
				$sData->Division	= $sRowItem->work_mode;
				$sData->ForemanID	= request('ForemanID');
				$sData->workStart	= $sRowJob->job_date_eta;
				$sData->workForecast= date('Y-m-d H:i:s', strtotime('+3 days', strtotime($sRowJob->job_date_eta)));
				$sData->workStatus	= 1;
				$sData->save();
				
				if( $sRowItem->work_contractor == 'SWP' )	$sRowItem->work_prepare_swp 	= 'Y';
				if( $sRowItem->work_contractor == 'CLM' )	$sRowItem->work_prepare_clm 	= 'Y';
			
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
		$sData = \App\Models\SWP\PrepareForeman::find(request('id'));
		if( $sData ){
			$sData->workNote	= request('workNote');
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxDelete( $ItemID ){
		$sData = \App\Models\SWP\PrepareForeman::find(request('id'));
		if( $sData ){
			$sData->workStatus	= 0;
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
	
    public function postDatatable( $ItemID ){
		$sTable	= \App\Models\SWP\PrepareForeman::join('ck_Master_Foreman','ck_Master_Foreman.id','=','ck_Item_Prepare_Foreman.ForemanID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Prepare_Foreman.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Prepare_Foreman.updated_by')
					->select('ck_Item_Prepare_Foreman.id', 'ForemanType', 'ForemanName', 'WeightMonthly', 'WeightYearly', 'workStatus', 'workStart', 'workFinish', 'workNote', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Prepare_Foreman.created_at', 'ck_Item_Prepare_Foreman.updated_at')
					->where('ItemID',$ItemID);
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus == 0 )	return 'ยกเลิกการปฎิบัติงาน';
			if( $data->workStatus == 1 )	return 'รอดำเนินการ';
			if( $data->workStatus == 2 )	return 'กำลังดำเนินการ';
			if( $data->workStatus == 3 )	return 'ดำเนินการเสร็จ';
		})
		->make(true);
	}
	
    public function postDatatableWithWeight( $ItemID ){
		$Division 	= \App\Models\SMD\SmdItem::find( $ItemID )->work_mode;
		$sTable		= \App\Models\Master\SWP\Foreman::where('Division',$Division);
		if( request('Where') ){
			foreach(request('Where') AS $key => $val){
				if( $key == 'Condition' ){
					
				}else{
					if( $val ){
						$sTable->where($key, $val);
					}
				}
			}
		}
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('ForemanStatus',function($data){
			if( $data->ForemanStatus == 0 )	return 'ไม่พร้อมปฎิบัติงาน';
			if( $data->ForemanStatus == 1 )	return 'พร้อมปฎิบัติงาน';
		})->make(true);
	}
}
