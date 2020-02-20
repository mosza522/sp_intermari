<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationMachineController extends Controller
{
    public function index( $OperationID ) 
    {
		$sRow = \App\Models\FTS\Operation::Join('ck_Smd_Item','ck_Smd_Item.id', 'ck_Item_Fts_Operation.ItemID')
				->Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID', 'ck_Item_Fts_Operation.DepartmentID')
				->select(
					'ck_Item_Fts_Operation.id', 
					'ck_Item_Fts_Operation.DepartmentID', 
					'ck_Item_Fts_Operation.ItemID', 
					'ck_Item_Fts_Operation.workNote', 
					'ck_Item_Fts_Operation.workNumber', 
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
					'ck_Master_Fts_Buoy.BuoyName', 
					'ck_Master_Smd_Boat.BoatName'
				)->find($OperationID);
		
		if( $sRow ){
			$rowItem = \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
						->select('ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')
						->where('SmdID',$sRow->SmdID)
						->get();
						

			if( $sRow->DepartmentID ){
				$rowMachines	= \App\Models\Master\Machine::where('DepartmentID', $sRow->DepartmentID)->select('id', 'MachineType', 'MachineName')->orderBy('MachineType','asc')->orderBy('MachineName','asc')->get();
			}else{
				$rowMachines	= \App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
									->where('ItemID', $sRow->ItemID)->select('ck_Master_Machine.id', 'MachineType', 'MachineName')->orderBy('MachineType','asc')->orderBy('MachineName','asc')->get();
			}
			$rowMachine 	= array();
			if( $rowMachines ){
				foreach( $rowMachines AS $r ){
					$rowMachine[$r->MachineType][$r->id] = $r->MachineName;
				}
			}
		
		
			return View('FTS.Operation.MachineIndex')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'rowMachine'	=> $rowMachine,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
    public function create($OperationID) 
    {
		return $this->index($OperationID, 'create');
    }
	
    /**
     * Store a newly created resource in storage.
     */
    public function store($OperationID)
    {
		$qCount 		= (\App\Models\FTS\OperationMachine::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationMachine::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationMachine::where('OperationID',$OperationID)->count()+1;
		$rsOperation	 = \App\Models\FTS\Operation::find($OperationID);
		
        $sData = new \App\Models\FTS\OperationMachine;
        $sData->OperationID		= $OperationID;
		$sData->workNumber		= $rsOperation->workNumber.'-M'.sprintf('%02d',$qCount);
        $sData->MachineID		= request('MachineID');
        $sData->workDate		= date('Y-m-d',strtotime(request('workDate')));
        $sData->workSymptom		= request('workSymptom');
        $sData->workDetails		= request('workDetails');
        $sData->workEdit		= request('workEdit');
        $sData->workStatus		= request('workStatus');
        $sData->save();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
	
	public function postDatatable($OperationID){
		$sTable	= \App\Models\FTS\OperationMachine::Join('ck_Master_Machine', 'ck_Master_Machine.id', '=', 'ck_Item_Fts_Operation_Machine.MachineID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Machine.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Machine.updated_by')
					->select(
						'ck_Item_Fts_Operation_Machine.id', 
						'ck_Item_Fts_Operation_Machine.workNumber', 
						'ck_Item_Fts_Operation_Machine.workDate', 
						'ck_Item_Fts_Operation_Machine.workSymptom', 
						'ck_Item_Fts_Operation_Machine.workDetails', 
						'ck_Item_Fts_Operation_Machine.workEdit', 
						'ck_Item_Fts_Operation_Machine.workStatus', 
						'ck_Item_Fts_Operation_Machine.MachineID', 
						'ck_Master_Machine.MachineName', 
						'created.StaffCode AS created', 
						'updated.StaffCode AS updated', 
						'ck_Item_Fts_Operation_Machine.created_at', 
						'ck_Item_Fts_Operation_Machine.updated_at'
						)
					->where('OperationID',$OperationID);
					
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus == 0 )	return 'ใช้งานไมได้ส่งซ่อม';
			if( $data->workStatus == 1 )	return 'ใช้งานได้';
		})
		->addColumn('workEdit2',function($data){
			if( $data->workEdit == 0 )	return 'แก้ไขไม่ได้';
			if( $data->workEdit == 1 )	return 'แก้ไขได้';
		})
		->make(true);
	}
	
	
	

	
	
	
	
	
}
