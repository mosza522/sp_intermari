<?php

namespace App\Http\Controllers\Master\SWP;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MachineController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.SWP.machine_index')->with(array('PageContainer'=> true) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.SWP.machine_form')->with(array('PageContainer'=> true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\Machine;
        $sData->DivisionID		= 5;
        $sData->MachineNunber	= request('MachineNunber');
        $sData->MachineName		= request('MachineName');
        $sData->MachineType		= request('MachineType');
		$sData->MachineBattery	= request('MachineBattery');
        $sData->save();
		return redirect()->action('Master\SWP\MachineController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$sRow = \App\Models\Master\Machine::leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Master_Machine.created_by')
				->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Master_Machine.updated_by')
				->select(
					'ck_Master_Machine.*', 
					DB::raw('CONCAT(created.StaffPrefix,created.StaffFirstName,\' \',created.StaffLastName) AS created_by'),
					DB::raw('CONCAT(updated.StaffPrefix,updated.StaffFirstName,\' \',updated.StaffLastName) AS updated_by')
				)->find($id);
        $sRowDepartment = \App\Models\Staff\Department::where('DivisionID', '6')->get();
		return view('Master.SWP.machine_form')->with( array('PageContainer'=> true, 'sRow'=> $sRow, 'sRowDepartment'=> $sRowDepartment ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\Machine::find($id);
		if( $sData ){;
			$sData->MachineNunber	= request('MachineNunber');
			$sData->MachineName		= request('MachineName');
			$sData->MachineType		= request('MachineType');
			$sData->MachineBattery	= request('MachineBattery');
			$sData->save();
			return redirect()->action('Master\SWP\MachineController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('Master\SWP\MachineController@index')->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		if( request('withTrashed') == 'true' ){
			\App\Models\Master\Machine::find($id)->restore();
			return response()->json(\App\Models\Alert::Msg('success','restore'));
		}else{
			\App\Models\Master\Machine::find($id)->delete();
			return response()->json(\App\Models\Alert::Msg('success'));
		}
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\Machine::select('ck_Master_Machine.id', 'MachineType', 'MachineName', 'MachineNunber', 'MachineUsage', 'MachineStatus', 'ck_Master_Machine.deleted_at')
					->where('ck_Master_Machine.DivisionID', '5');
		if( $request->has('Where') ){
			foreach(request('Where') AS $key => $val){
				if( $val ){
					$sTable->where($key, $val);
				}
			}
		}
		if( $request->has('Like') ){
			foreach(request('Like') AS $key => $val){
				if( $val ){
					$sTable->where($key, 'like', '%'.$val.'%');
				}
			}
		}	
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('MachineStatus',function($data){
			if( $data->MachineStatus== 0 )	return 'เสียไม่พร้อมใช้งาน';
			if( $data->MachineStatus== 1 )	return 'ปกติพร้อมใช้งาน';
			if( $data->MachineStatus== 2 )	return 'เสีย-ส่งเครื่องซ่อม';
			if( $data->MachineStatus== 3 )	return 'แจ้งเสียรอตรวจสอบ';
		})
		->addColumn('MachineUsage',function($data){
			if( $data->MachineUsage== 0 )	return 'ไม่ได้ใช้งาน';
			if( $data->MachineUsage== 1 )	return 'กำลังใช้งาน';
			if( $data->MachineUsage== 2 )	return 'เสียไม่พร้อมใช้งาน';
		})
		->make(true);
	}
}
