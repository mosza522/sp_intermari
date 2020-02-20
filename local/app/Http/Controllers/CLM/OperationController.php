<?php
namespace App\Http\Controllers\CLM;

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
		return View('CLM.Operation.Index')->with(array('PageContainer'=> true) );
    }

    public function show( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
			$rowWarehouse = \App\Models\SMD\SmdItem::ItemSWPWarehouse($sRow);
			return View('SWP.Operation.Show')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> empty($rowItem)?NULL:$rowItem,
						'rowWarehouse'	=> empty($rowWarehouse)?NULL:$rowWarehouse,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('CLM\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
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
					->select('ck_Smd_Item.id', 'SmdID', 'job_number', 'work_number', 'job_date_eta', 'job_weight', 'ck_Smd_Item.created_at', 'job_transport', 'BoatName', 'ck_Smd.deleted_at AS deleted_at1', 'ck_Smd_Item.deleted_at as deleted_at2')
					->where('work_prepare_clm', 'Y')
					->whereIn('work_mode', ['TRU', 'CLM'])
					->where('work_contractor', 'CLM');
					
			
			
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
