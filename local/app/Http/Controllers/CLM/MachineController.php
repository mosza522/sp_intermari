<?php
namespace App\Http\Controllers\CLM;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class MachineController extends Controller
{
	public function __construct(){

	}

    public function index()
    {
        $sRowDepartment = \App\Models\Staff\Department::where('DivisionID', '6')->get();
		return View('CLM.machine_index')->with(array('PageContainer'=> true, 'sRowDepartment'=> $sRowDepartment ) );
    }

    public function checkInspection()
    {
        $sRowDepartment = \App\Models\Staff\Department::where('DivisionID', '6')->get();
		return View('CLM.machine_checkInspection')->with(array('PageContainer'=> true, 'sRowDepartment'=> $sRowDepartment ) );
    }



    public function checkInspectionDatatable( ){
		$sTable	= \App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
					->Join('ck_Smd_Item', 'ck_Smd_Item.id', '=', 'ck_Item_Prepare_Machine.ItemID')
					->leftJoin('ck_Staff_Department', 'ck_Staff_Department.id', '=', 'ck_Master_Machine.DepartmentID')
					->select('ck_Item_Prepare_Machine.id','ck_Master_Machine.id as machine_id' ,'MachineType', 'MachineName', 'work_number', 'DepartmentName', 'InspectionCode', 'InspectionStatus', 'InspectionType', 'InspectionCheck_at', 'InspectionApprove_at', 'ck_Item_Prepare_Machine.created_at')
					->where('InspectionStatus','0')
					->where('Division','CLM')
					->get();
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('InspectionStatus',function($data){
			if( $data->InspectionStatus == 0 )	return 'รอตรวจเช็ค';
			if( $data->InspectionStatus == 1 )	return 'รออนุมัติการตรวจ';
			if( $data->InspectionStatus == 2 )	return 'ตรวจสอบเรียบร้อย';
		})
		->addColumn('InspectionType',function($data){
			if( $data->InspectionType == 'B' )	return 'ก่อนปฏิบัติงาน';
			if( $data->InspectionType == 'A' )	return 'หลังปฏิบัติงาน';
			if( $data->InspectionType == 'P' )	return 'ตรวจสอบตามรอบ';
		})
		->editColumn('InspectionCheck_at',function($data){
			return empty($data->InspectionCheck_at)?'-':date('d-m-Y H:i',strtotime($data->InspectionCheck_at));
		})
		->editColumn('InspectionApprove_at',function($data){
			return empty($data->InspectionApprove_at)?'-':date('d-m-Y H:i',strtotime($data->InspectionApprove_at));
		})
		->editColumn('created_at',function($data){
			return empty($data->created_at)?'-':date('d-m-Y H:i',strtotime($data->created_at));
		})
		->make(true);
	}


	
	
	

    public function approveInspection()
    {
        $sRowDepartment = \App\Models\Staff\Department::where('DivisionID', '6')->get();
		return View('CLM.machine_approveInspection')->with(array('PageContainer'=> true, 'sRowDepartment'=> $sRowDepartment ) );
    }



    public function approveInspectionDatatable( ){
		$sTable	= \App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
					->Join('ck_Smd_Item', 'ck_Smd_Item.id', '=', 'ck_Item_Prepare_Machine.ItemID')
					->leftJoin('ck_Staff_Department', 'ck_Staff_Department.id', '=', 'ck_Master_Machine.DepartmentID')
					->select('ck_Item_Prepare_Machine.id','ck_Master_Machine.id as machine_id' ,'MachineType', 'MachineName', 'work_number', 'DepartmentName', 'InspectionCode', 'InspectionStatus', 'InspectionType', 'InspectionCheck_at', 'InspectionApprove_at', 'ck_Item_Prepare_Machine.created_at')
					->where('InspectionStatus','>','0')
					->where('Division','CLM')
					->get();
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('InspectionStatus',function($data){
			if( $data->InspectionStatus == 0 )	return 'รอตรวจเช็ค';
			if( $data->InspectionStatus == 1 )	return 'รออนุมัติการตรวจ';
			if( $data->InspectionStatus == 2 )	return 'ตรวจสอบเรียบร้อย';
		})
		->addColumn('InspectionType',function($data){
			if( $data->InspectionType == 'B' )	return 'ก่อนปฏิบัติงาน';
			if( $data->InspectionType == 'A' )	return 'หลังปฏิบัติงาน';
			if( $data->InspectionType == 'P' )	return 'ตรวจสอบตามรอบ';
		})
		->editColumn('InspectionCheck_at',function($data){
			return empty($data->InspectionCheck_at)?'-':date('d-m-Y H:i',strtotime($data->InspectionCheck_at));
		})
		->editColumn('InspectionApprove_at',function($data){
			return empty($data->InspectionApprove_at)?'-':date('d-m-Y H:i',strtotime($data->InspectionApprove_at));
		})
		->editColumn('created_at',function($data){
			return empty($data->created_at)?'-':date('d-m-Y H:i',strtotime($data->created_at));
		})
		->make(true);
	}
}
