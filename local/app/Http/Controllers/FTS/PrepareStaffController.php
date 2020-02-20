<?php
namespace App\Http\Controllers\FTS;

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
		$rsOperation = \App\Models\FTS\Operation::where('ItemID',$ItemID)->where('workStatus','1')->orderBy('id', 'desc')->first();
		if( $rsOperation ){
			if( $rsOperation->work_type == 'Buoy' ){
				return redirect()->action('FTS\PrepareBuoyController@index', $ItemID)->with(['alert'=>\App\Models\Alert::Msg('warning')]);
			}else{
				return redirect()->action('FTS\PrepareStaffController@show', array($ItemID, $rsOperation->id));
			}
		}else{
			return redirect()->action('FTS\PrepareController@show', $ItemID)->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
	}
	
    public function show( $ItemID, $OperationID ) 
    {
		$rowItem = \App\Models\SMD\SmdItem::find($ItemID);
		if( $rowItem ){
			$sData			= null;
			$rowFTSBuoy		= null;
			if( $rowItem->work_type == 'Buoy' ){
				$rsOperation = \App\Models\FTS\Operation::Join('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID','=','ck_Item_Fts_Operation.DepartmentID')
									->select(
										'ck_Item_Fts_Operation.id',
										'ck_Item_Fts_Operation.ItemID',
										'ck_Item_Fts_Operation.Staff_01',
										'ck_Item_Fts_Operation.Staff_02',
										'ck_Item_Fts_Operation.Staff_03',
										'ck_Item_Fts_Operation.Staff_04',
										'ck_Item_Fts_Operation.Staff_05',
										'ck_Item_Fts_Operation.Staff_06',
										'ck_Item_Fts_Operation.Staff_07',
										'ck_Item_Fts_Operation.Staff_08',
										'ck_Item_Fts_Operation.Staff_09',
										'ck_Item_Fts_Operation.workNumber',
										'ck_Master_Fts_Buoy.Staff_1',
										'ck_Master_Fts_Buoy.Staff_2',
										'ck_Master_Fts_Buoy.Staff_3',
										'ck_Master_Fts_Buoy.Staff_4',
										'ck_Master_Fts_Buoy.Staff_5',
										'ck_Master_Fts_Buoy.Staff_6',
										'ck_Master_Fts_Buoy.Staff_7',
										'ck_Master_Fts_Buoy.Staff_8',
										'ck_Master_Fts_Buoy.Staff_9',
										'ck_Master_Fts_Buoy.BuoyName',
										'ck_Master_Fts_Buoy.DepartmentID'
									)
									->where('workStatus','1')
									->where('ck_Item_Fts_Operation.id',$OperationID)
									->first();
			}else{
				$rsOperation = \App\Models\FTS\Operation::where('ItemID',$rowItem->id)->where('workStatus','1')->orderBy('id', 'desc')->first();
			}
			if( empty($rsOperation) ){
				return redirect()->action('FTS\PrepareController@show', $ItemID)->with(['alert'=>\App\Models\Alert::Msg('danger')]);
			}
			
			
			$rowBuoy 		= \App\Models\Master\FTS\Buoy::all();
			$rowDivision	= \App\Models\Staff\Department::whereIn('DivisionID',array('4','5','6','7'))->get();
		
			return View('FTS.Prepare.Staff')->with(array(
				'PageContainer'	=> true, 
				'rowBuoy'		=> $rowBuoy, 
				'rowItem'		=> $rowItem, 
				'rowFTSBuoy'	=> $rowFTSBuoy, 
				'rowDivision'	=> $rowDivision, 
				'rsOperation'	=> $rsOperation, 
				'sTitle' 		=> $rowItem->work_number .' : รายชื่อพนักงานปฏิบัติงานเรือใหญ่'
			));
		}
    }

    public function update( $ItemID, $OperationID ) 
    {
		$sData = \App\Models\FTS\Operation::find($OperationID);
		if( $sData ){
			if( $sData->work_type == 'Buoy' ){
				if( !isset($sData->Staff_01) ){
					$this->PrepareOperation($ItemID, $OperationID, $sData->DepartmentID);
				}
			}

			$sData->Staff_01	= request('Staff_01');
			$sData->Staff_02	= request('Staff_02');
			$sData->Staff_03	= request('Staff_03');
			$sData->Staff_04	= request('Staff_04');
			$sData->Staff_05	= request('Staff_05');
			$sData->Staff_06	= request('Staff_06');
			$sData->Staff_07	= request('Staff_07');
			$sData->Staff_08	= request('Staff_08');
			$sData->Staff_09	= request('Staff_09');
			$sData->save();
		
			return redirect()->action('FTS\PrepareStaffController@show', array($ItemID, $OperationID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('FTS\PrepareStaffController@show', array($ItemID, $OperationID))->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
    }
	
    public function AjaxInsert( $ItemID ){
		$Staff = explode(',', request('StaffID'));
		if( $Staff ){
			foreach( $Staff AS $StaffID ){
				$sCount = \App\Models\FTS\Staff::where('ItemID', $ItemID)->where('OperationID', request('OperationID'))->where('StaffID', $StaffID)->count();
				if( $sCount == 0 ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= request('OperationID');
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
		$sData = \App\Models\FTS\Staff::find(request('id'));
		if( $sData ){
			$sData->workNote	= request('workNote');
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxDelete( $ItemID ){
		$sData = \App\Models\FTS\Staff::find(request('id'));
		if( $sData ){
			$sData->workStatus	= 0;
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
	
	
	
    public function postDatatable( $ItemID, $OperationID ){
		\App\Models\FTS\Operation::PrepareStaffCount($OperationID);
		$sTable 	= \App\Models\FTS\Staff::leftJoin('ck_Staff','ck_Staff.id','=','ck_Item_Fts_Prepare_Staff.StaffID')
						->leftJoin('ck_Staff_Division','ck_Staff_Division.id','=','ck_Staff.DivisionID')
						->leftJoin('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
						->leftJoin('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
						->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Prepare_Staff.created_by')
						->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Prepare_Staff.updated_by')
						->select('ck_Item_Fts_Prepare_Staff.id', DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'DivisionName', 'DepartmentName', 'PositionName', 'workStatus', 'workNote', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Fts_Prepare_Staff.created_at', 'ck_Item_Fts_Prepare_Staff.updated_at')
						->where('workPrepare', 1)
						->where('ItemID', $ItemID)
						->where('OperationID', $OperationID)
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
					->whereIn('DivisionID',array('4','5','6','7'))->where('DepartmentID',request('DepartmentID'))->get();
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
	
	
	
	
	
	
	

    public function PrepareOperation($ItemID, $OperationID, $DepartmentID){
		if( request('Staff_01') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',68)->limit(request('Staff_01'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		
		if( request('Staff_02') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',65)->limit(request('Staff_02'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		
		if( request('Staff_03') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',66)->limit(request('Staff_03'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		
		if( request('Staff_04') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',37)->limit(request('Staff_04'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		
		if( request('Staff_05') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',67)->limit(request('Staff_05'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		
		if( request('Staff_06') ){
			$sRow = \App\Models\Staff\Staff::where('DepartmentID',$DepartmentID)->where('PositionID',69)->limit(request('Staff_06'))->get();
			if( $sRow ){
				foreach( $sRow as $row ){
					$sData 	= new \App\Models\FTS\Staff;
					$sData->ItemID			= $ItemID;
					$sData->OperationID		= $OperationID;
					$sData->StaffID			= $row->id;
					$sData->save();
				}
			}
		}
		$rowItem = \App\Models\SMD\SmdItem::find($ItemID);
		$rowItem->work_prepare_fts 	= 'Y';
		$rowItem->save();
	}
	
}
