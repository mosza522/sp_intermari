<?php
namespace App\Http\Controllers\SWP;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareStaffController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
			$rowWarehouse = \App\Models\SMD\SmdItem::ItemSWPWarehouse($sRow);
			return View('SWP.Prepare.Staff')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true,
						'sTitle' 		=> $sRow->work_number .' : พนักงาน'
					)
				);
		}else{
			return redirect()->action('SWP\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
    public function AjaxInsert( $ItemID ){
		$Staff 		= explode(',', request('StaffID'));
		$sRowItem 	= \App\Models\SMD\SmdItem::find($ItemID);
		if( $Staff ){
			foreach( $Staff AS $StaffID ){
				$sCount = \App\Models\SWP\PrepareStaffItem::where('Division',$sRowItem->work_mode)->where('ItemID', $ItemID)->where('StaffID', $StaffID)->count();
				if( $sCount == 0 ){
					$sData 	= new \App\Models\SWP\PrepareStaffItem;
					$sData->ItemID			= $ItemID;
					$sData->Division		= $sRowItem->work_mode;
					$sData->StaffID			= $StaffID;
					$sData->workNote		= request('workNote');
					$sData->save();
				}
			}
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxUpdate( $ItemID ){
		$sData = \App\Models\SWP\PrepareStaffItem::find(request('id'));
		if( $sData ){
			$sData->workNote	= request('workNote');
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxDelete( $ItemID ){
		$sData = \App\Models\SWP\PrepareStaffItem::find(request('id'));
		if( $sData ){
			$sData->workStatus	= 0;
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
	
	
	
    public function postDatatable( $ItemID){
		$sTable 	= \App\Models\SWP\PrepareStaffItem::leftJoin('ck_Staff','ck_Staff.id','=','ck_Item_Prepare_Staff_Item.StaffID')
						->leftJoin('ck_Staff_Division','ck_Staff_Division.id','=','ck_Staff.DivisionID')
						->leftJoin('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
						->leftJoin('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
						->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Prepare_Staff_Item.created_by')
						->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Prepare_Staff_Item.updated_by')
						->select('ck_Item_Prepare_Staff_Item.id', DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'DivisionName', 'DepartmentName', 'PositionName', 'workStatus', 'workNote', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Prepare_Staff_Item.created_at', 'ck_Item_Prepare_Staff_Item.updated_at')
						->where('workPrepare', 1)
						->where('ItemID', $ItemID)
						->get();
		
		
		
        return DataTables::of($sTable)->escapeColumns([])
		->editColumn('workStatus',function($data){
			if( $data->workStatus == 0 )	return 'ยกเลิกการใช้';
			if( $data->workStatus == 1 )	return 'ใช้ปฎิบัติงาน';
		})
		->make(true);
	}

	
	
	 
    public function postDatatableWithWeight( $ItemID )
	{
        $sData		= new Collection;
		$sTable 	= \App\Models\Staff\Staff::Join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
					->select('ck_Staff.id', DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'PositionName')
					->whereIn('DivisionID',array('4','5','6','7'))->get();
		if( $sTable ){
			foreach( $sTable AS $r ){
				$sData->push([
					'StaffID'			=> $r->id,
					'StaffName'			=> $r->StaffName,
					'PositionName'		=> $r->PositionName,
					'StaffStatus'		=> 'พร้อมทำงาน',
					'WeightMonthly'		=> '0.00',
					'WeightYearly'		=> '0.00',
					'LastWork'			=> '',
					'LastJob'			=> '',
					'QueueJob'			=> '',
					'LastEnd'			=> '',
				]);
			}
		}
        return DataTables::of($sData)->escapeColumns([])->make(true);
	}
	
	
}
