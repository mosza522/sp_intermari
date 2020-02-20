<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationStaffController extends Controller
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
			return View('FTS.Operation.StaffIndex')
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
		return $this->index($OperationID, 'create');
    }
	
    /**
     * Store a newly created resource in storage.
     */
    public function store($OperationID)
    {
		$qCount 		= (\App\Models\FTS\OperationStaff::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationStaff::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationStaff::where('OperationID',$OperationID)->count()+1;
		$rsOperation	 = \App\Models\FTS\Operation::find($OperationID);
		
        $sData = new \App\Models\FTS\OperationStaff;
        $sData->OperationID		= $OperationID;
		$sData->workNumber		= $rsOperation->workNumber.'-S'.sprintf('%02d',$qCount);
        $sData->StaffID			= request('StaffID');
        $sData->workDate		= date('Y-m-d H:i:s',strtotime(request('workDate')));
        $sData->workStatus		= request('workStatus');
        $sData->workNote		= request('workNote');
        $sData->save();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
	public function postDatatable($OperationID){
		$sTable	= \App\Models\FTS\OperationStaff::Join('ck_Staff', 'ck_Staff.id', '=', 'ck_Item_Fts_Operation_Staff.StaffID')
					->join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
					->join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Staff.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Staff.updated_by')
					->select(
						'ck_Item_Fts_Operation_Staff.id', 
						'ck_Item_Fts_Operation_Staff.workNumber', 
						'ck_Item_Fts_Operation_Staff.workDate', 
						'ck_Item_Fts_Operation_Staff.workStatus', 
						'ck_Item_Fts_Operation_Staff.workNote',
						'ck_Staff_Department.DepartmentName', 
						'ck_Staff_Position.PositionName',
						DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'),
						'created.StaffCode AS created', 
						'updated.StaffCode AS updated', 
						'ck_Item_Fts_Operation_Staff.created_at', 
						'ck_Item_Fts_Operation_Staff.updated_at'
						)
					->where('OperationID', $OperationID);
					
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus== 0 )	return 'ออกงาน';
			if( $data->workStatus== 1 )	return 'เข้างาน';
		})
		->make(true);
	}
	
	
	

	
	
	public function jsonStaff( $OperationID )
    {
		$Staff 	= array();
		if( request('workStatus') == '0' ){
			$sRow  = \App\Models\FTS\Staff::join('ck_Staff','ck_Staff.id','=','ck_Item_Fts_Prepare_Staff.StaffID')
				->join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
				->join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
				->whereNull('workFinish_at')
				->where('OperationID', $OperationID)
				->select('ck_Staff.id', DB::raw('CONCAT(DepartmentName,\' => \',ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'PositionName')
				->orderBy('PositionName','asc')->orderBy('StaffName','asc')->get();
		}else{
			
			$sRow  = \App\Models\Staff\Staff::join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
				->join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
				->whereIn('ck_Staff.DivisionID',array('4','5','6','7'))
				->select('ck_Staff.id', DB::raw('CONCAT(DepartmentName,\' => \',ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'PositionName')
				->orderBy('PositionName','asc')->orderBy('StaffName','asc')->take(100)->get();
			
		}
		
		if( $sRow ){
			foreach( $sRow AS $r ){
				$Staff[$r->PositionName][$r->id] = $r->StaffName;
			}
			return json_encode($Staff, true);
		}
	}
	
	
	
	
	
}
