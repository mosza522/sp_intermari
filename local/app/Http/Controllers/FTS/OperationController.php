<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationController extends Controller
{
    public function index()
    {
		return View('FTS.Operation.Index')->with(array('PageContainer'=> true) );
    }

    public function show($ItemID) 
    {
		$rsFTS	= \App\Models\SMD\SmdItem::find($ItemID);
		if( $rsFTS->work_type == 'StevieDore' )	return $this->OperationShowStevieDore( $rsFTS );
			
		$sRow	= \App\Models\SMD\SmdItem::Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
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
					'ck_Master_Smd_Boat.BoatName'
				)->find($ItemID);
				
		if( $sRow ){
			$rowItem = \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
						->select('ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')
						->where('SmdID',$sRow->SmdID)
						->get();
			return View('FTS.Operation.Show')->with(array('PageContainer'=> true, 'sRow'=> $sRow, 'rowItem'=> $rowItem) );
		}
		
    }
	
    public function OperationShowStevieDore( $rsFTS ) 
    {
		$rsOperation 	= \App\Models\FTS\Operation::where('ItemID',$rsFTS->id)->where('workStatus','1')->orderBy('id', 'desc')->first();
		return $this->OperationShowBuoy( $rsOperation->id );
	}
	
    public function OperationShowBuoy($OperationID) 
    {
		$sRow = \App\Models\FTS\Operation::Join('ck_Smd_Item','ck_Smd_Item.id', 'ck_Item_Fts_Operation.ItemID')
				->Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID', 'ck_Item_Fts_Operation.DepartmentID')
				->select(
					'ck_Item_Fts_Operation.id', 
					'ck_Item_Fts_Operation.ItemID', 
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
			return View('FTS.Operation.ShowBuoy')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true
					)
				);
		}
    }
	
	public function postDatatable(Request $request){
		$sTable = \App\Models\SMD\SmdItem::join('ck_Smd', function ($join) {
						$join->on('ck_Smd_Item.SmdID', '=', 'ck_Smd.id');
						if( request('withTrashed')=='false' ){
							$join->whereNull('ck_Smd.deleted_at');
						}
					})
					->leftJoin('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Smd.BoatID')
					->select('ck_Smd_Item.id', 'SmdID', 'work_type', 'job_number', 'work_number', 'job_date_eta', 'job_weight', 'work_buoy', 'ck_Smd_Item.created_at', 'job_transport', 'BoatName', 'work_status_fts', 'ck_Smd.deleted_at AS deleted_at1', 'ck_Smd_Item.deleted_at as deleted_at2')
					->where('work_mode', 'FTS')
					->where('work_prepare_fts', 'Y');
			
			
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
		
		$sQuery	= DataTables::of($sTable)
		->editColumn('job_weight',function($data){
			return empty($data->job_weight)?'-':number_format($data->job_weight);
		})
		->editColumn('job_date_eta',function($data){
			return empty($data->job_date_eta)?'-':date('d-m-Y H:i',strtotime($data->job_date_eta));
		})
		->editColumn('work_status_fts',function($data){
			if($data->work_status_fts == 0 ) return 'รอดำเนินการ';
			if($data->work_status_fts == 1) return 'กำลังดำเนินการ';
			if($data->work_status_fts == 2 ) return 'จบงาน';
		});
		return $sQuery->make(true);
	}
	
}
