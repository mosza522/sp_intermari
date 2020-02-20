<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareController extends Controller
{
	
    public function index()
    {
		return View('FTS.Prepare.Index')->with(array('PageContainer'=> true) );
    }
	
    public function show( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
					
			if( $sRow->work_type == 'StevieDore' ){
				$qRow = \App\Models\FTS\Operation::where('ItemID',$sRow->id);
				if( empty($qRow->count()) ){
					$qCount = \App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count() == 0 || empty(\App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count()) ? 1 : \App\Models\FTS\Operation::withTrashed()->where('created_at','<=',date('Y-m').'-31 23:59:59')->count()+1;
					$sData 					= new \App\Models\FTS\Operation;
					$sData->ItemID			= $sRow->id;
					$sData->DepartmentID	= NULL;
					$sData->work_type		= 'StevieDore';
					$sData->workStart		= $sRow->job_date_eta;
					$sData->workForecast	= date('Y-m-d H:i:s', strtotime('+3 days', strtotime($sRow->job_date_eta)));
					$sData->workNumber		= 'FT1'.date('ym').sprintf('%03d',$qCount);
					$sData->workStatus		= 1;
					$sData->save();
					$sRow->OperationID = $sData->id;
				}else{
					$sRow->OperationID = $qRow->first()->id;
				}
			}else{
				$sRow->OperationID = 0;
			}
			return View('FTS.Prepare.Show')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> empty($rowItem)?NULL:$rowItem,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
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
					->where('work_mode','FTS')
					->select('ck_Smd_Item.id', 'SmdID', 'work_type', 'job_number', 'work_number', 'job_date_eta', 'job_weight', 'ck_Smd_Item.created_at', 'job_transport', 'BoatName', 'ck_Smd.deleted_at AS deleted_at1', 'ck_Smd_Item.deleted_at as deleted_at2');
			
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
		});
		return $sQuery->make(true);
	}
}
