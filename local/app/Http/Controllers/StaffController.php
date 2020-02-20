<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
	public function __construct(){
		
	}
	
    public function index()
    {
		if( \Request::is('smd/*') )	$DivisionID = 2;
		if( \Request::is('rtm/*') )	$DivisionID = 3;
		if( \Request::is('swp/*') )	$DivisionID = 5;
		if( \Request::is('fts/*') )	$DivisionID = 6;
		if( \Request::is('clm/*') )	$DivisionID = 7;
		
		$rowDivision = \App\Models\Staff\Division::find($DivisionID);
		if( $rowDivision ){
			return View('FTS.staff')->with(array('PageContainer'=> true, 'rowDivision'=> $rowDivision) );	
		}else{
			return redirect('/')->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}
    }

    public function show($SmdID, $ItemID)
    {
		$rsJob 					= \App\Models\SMD\Smd::find($SmdID);
		if( $rsJob ){
			$rsItem 			= \App\Models\SMD\SmdItem::find($ItemID);
			$rsJob->BoatName	= empty($rsJob->BoatID)?'':\App\Models\Master\SMD\Boat::find($rsJob->BoatID)->BoatName;
			$rsJob->OwnerName	= empty($rsJob->OwnerID)?'':\App\Models\Master\SMD\Owner::find($rsJob->OwnerID)->OwnerName;
			$rowItem 			= \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')->where('SmdID',$SmdID)->get();
			return View('FTS.show')->with(array('PageContainer'=> true, 'rsJob'=> $rsJob, 'rsItem'=> $rsItem, 'rowItem'=> $rowItem) );
		}
		
    }


    public function PrepareSweep($SmdID, $ItemID)
    {
		
    }
	
    public function PrepareForeman($SmdID, $ItemID)
    {
		
    }
	
    public function PrepareBuoy($SmdID, $ItemID)
    {
		
    }
	
    public function PrepareStaff($SmdID, $ItemID)
    {
		
    }
	
    public function PrepareEquipment($SmdID, $ItemID)
    {
		
    }
	
	
	
	
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		$rowHarbor 			= \App\Models\Master\SMD\Harbor::All();
		$rowWarehouse		= \App\Models\Master\SMD\Warehouse::All();
		return view('SMD.form')->with(array('PageContainer'=> true, 'rowHarbor'=>$rowHarbor, 'rowSmdWarehouse'=>$rowWarehouse) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$qCount = \App\Models\Staff\Staff::where('created_at','<=',date('Y-m').'-31 23:59:59')->max('id') == 0 || empty(\App\Models\SMD\Smd::where('created_at','<=',date('Y-m').'-31 23:59:59')->max('id')) ? 1 : \App\Models\SMD\Smd::where('created_at','<=',date('Y-m').'-31 23:59:59')->max('id')+1;
        $sData 	= new \App\Models\Staff\Staff;
        $sData->job_number			= 'SMD'.date('ym').sprintf('%03d',$qCount);
        $sData->BoatID				= request('BoatID');
        $sData->OwnerID				= request('OwnerID');
		$sData->job_date_eta		= empty(request('job_date_eta'))?NULL:date('Y-m-d H:i:s', strtotime(request('job_date_eta')));
	    $sData->ProductID			= json_encode(request('ProductID'));
	    $sData->job_note			= request('job_note');
	    $sData->job_unit			= request('job_unit');
	    $sData->job_category		= request('job_category');
	    $sData->job_transport		= request('job_transport');
	    $sData->job_customer_type	= request('job_customer_type');
		$sData->job_weight 			= str_replace(',','',request('job_weight'));
	    $sData->ModeID				= 1;
	    $sData->StatusID			= 1;
        $sData->created_at			= \Carbon\Carbon::now();
        $sData->updated_at			= \Carbon\Carbon::now();
        $sData->save();
		$this->Smd2Item($sData->id);
		return redirect()->action('SMD\SMDController@edit', $sData->id)->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }
	
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		\App\Models\SMD\Smd::where('id',$id)->delete();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */

	public function postDataTablestaff(){
		
		if( \Request::is('smd/*') )	$DivisionID = 2;
		if( \Request::is('rtm/*') )	$DivisionID = 3;
		if( \Request::is('swp/*') )	$DivisionID = 5;
		if( \Request::is('fts/*') )	$DivisionID = 6;
		if( \Request::is('clm/*') )	$DivisionID = 7;
		
		$rowDivision = \App\Models\Staff\Division::find($DivisionID);
		$sTable =  \App\Models\Staff\Staff::leftJoin('ck_Staff_Division', 'ck_Staff_Division.id', '=', 'ck_Staff.DivisionID')
					->leftJoin('ck_Staff_Department', 'ck_Staff_Department.id', '=', 'ck_Staff.DepartmentID')
					->leftJoin('ck_Staff_Position', 'ck_Staff_Position.id', '=', 'ck_Staff.PositionID')
					->select('StaffCode', DB::raw('CONCAT(StaffPrefix,StaffFirstName,\' \',StaffLastName) AS StaffName'), 'DivisionName', 'DepartmentName', 'PositionName', 'ck_Staff_Position.id AS PositionID');
			
		if( $DivisionID ){
			$sTable->where('ck_Staff.DivisionID', $DivisionID);
		}
		
		if( request('Where') ){
			foreach(request('Where') AS $key => $val){
				if( $val ){
					$sTable->where($key, $val);
				}
			}
		}
		if( request('Like') ){
			foreach(request('Like') AS $key => $val){
				if( $val ){
					$sTable->where($key, 'like', '%'.$val.'%');
				}
			}
		}
		
		$sQuery	= DataTables::of($sTable)
		->editColumn('PositionName',function($data){
			return $data->PositionName.' ('.$data->PositionID.')';;
		});
		return $sQuery->make(true);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
