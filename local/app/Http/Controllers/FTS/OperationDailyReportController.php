<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationDailyReportController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\FTS\Operation::Item($sRow->SmdID);
			return View('FTS.Operation.DailyReporIndex')
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
	
    public function create($ItemID) 
    {
		return $this->Form($ItemID);
    }
	
    public function show($ItemID, $DailyReportID) 
    {
		return $this->Form($ItemID, $DailyReportID);
    }
	
    public function Form($ItemID, $DailyReportID=null) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem 		= \App\Models\FTS\Operation::Item($sRow->SmdID);
			$rowDailyReport = \App\Models\FTS\OperationDailyReport::find($DailyReportID);
			
			if( $rowDailyReport && $rowDailyReport->id ){
				$rowRemark 	= \App\Models\FTS\OperationDailyReportRemark::where('DailyReportID',$rowDailyReport->id)->get();
				$rowStop 	= \App\Models\FTS\OperationDailyReportStop::where('DailyReportID',$rowDailyReport->id)->get();
				$rowList	= \App\Models\FTS\OperationDailyReportList::where('DailyReportID',$rowDailyReport->id);
				$rowList	= \App\Models\FTS\OperationDailyReportList::where('ItemID',$ItemID)->where('Mode','Cargo')->union($rowList)->get();
				
				$rowDailyReport->minuteWork2 = $this->convertToHoursMins($rowDailyReport->minuteWork);
				$rowDailyReport->minuteStop2 = $this->convertToHoursMins($rowDailyReport->minuteStop);
			}else{
				$row		= \App\Models\FTS\OperationDailyReport::where('ItemID',$ItemID)->orderBy('workNo','desc')->first();
				$rowList	= \App\Models\FTS\OperationDailyReportList::where('ItemID',$ItemID)->where('Mode','Cargo');
				if( $rowList->count() ){
					$rowList= \App\Models\FTS\OperationDailyReportList::where('ItemID',$ItemID)->where('Mode','Total')->where('DailyReportID',$row->id)->union($rowList)->get();
				}
			}
			
			if( $rowList ){
				foreach( $rowList AS $r ){
					if(isset($row) && $r->Mode == 'Total') $r->Mode = 'Previous';
					$Hatch[$r->Mode]['Hatch1'] 	= $r->Hatch1;
					$Hatch[$r->Mode]['Hatch2'] 	= $r->Hatch2;
					$Hatch[$r->Mode]['Hatch3'] 	= $r->Hatch3;
					$Hatch[$r->Mode]['Hatch4'] 	= $r->Hatch4;
					$Hatch[$r->Mode]['Hatch5'] 	= $r->Hatch5;
					$Hatch[$r->Mode]['Hatch6']	= $r->Hatch6;
					$Hatch[$r->Mode]['Hatch7'] 	= $r->Hatch7;
					$Hatch[$r->Mode]['Total'] 	= $r->Total;
				}
			}
				
				
			return View('FTS.Operation.DailyReportForm')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'rowDailyReport'=> empty($rowDailyReport)?NULL:$rowDailyReport,
						'rowStop'		=> empty($rowStop)?NULL:$rowStop,
						'rowRemark'		=> empty($rowRemark)?NULL:$rowRemark,
						'Hatch'			=> empty($Hatch)?NULL:$Hatch,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }

    public function store($ItemID) 
    {
		DB::beginTransaction();
		try {
			$sData = \App\Models\FTS\OperationDailyReport::where('id','!=',request('DailyReportID'))->where('ItemID',$ItemID)->where('workDate',date('Y-m-d',strtotime(request('workDate'))))->count();
			if( empty($sData) && !empty(request('workDate'))  ){
				if( request('DailyReportID') ){
					$sData = \App\Models\FTS\OperationDailyReport::find(request('DailyReportID'));
				}
				if( empty($sData) ){
					$sData	= new \App\Models\FTS\OperationDailyReport;
					$qCount = (\App\Models\FTS\OperationDailyReport::where('ItemID',$ItemID)->count() == 0 || empty(\App\Models\FTS\OperationDailyReport::where('ItemID',$ItemID)->count())) ? 1 : \App\Models\FTS\OperationDailyReport::where('ItemID',$ItemID)->count()+1;
					
					$rsSmd 				= \App\Models\SMD\SmdItem::find($ItemID);
					$sData->workNumber	= $rsSmd->work_number.'-D'.sprintf('%02d',$qCount);
					$sData->workNo		= $qCount;
					$sData->ItemID		= $ItemID;
				}
				$sData->workDate 		= date('Y-m-d',strtotime(request('workDate')));
				$sData->workDateETC 	= date('Y-m-d',strtotime(request('workDateETC1'))).' '.request('workDateETC2');
				$sData->save();
				$DailyReportID = $sData->id;
				
				
		
				\App\Models\FTS\OperationDailyReportRemark::where('DailyReportID',request('DailyReportID'))->delete();
				\App\Models\FTS\OperationDailyReportStop::where('DailyReportID',request('DailyReportID'))->delete();
				if( request('start_at') ){
					foreach( request('start_at') AS $index => $row ){
						if( !empty(request('start_at')[$index]) && !empty(request('finish_at')[$index]) ){
							\App\Models\FTS\OperationDailyReportRemark::firstOrCreate([
								'DailyReportID'		=> $DailyReportID,
								'ItemID' 			=> $ItemID,
								'start_at' 			=> request('start_at')[$index],
								'finish_at' 		=> request('finish_at')[$index],
								'time_note' 		=> request('time_note')[$index]
							]);
						}
					}
				}
				$timeStop = 0;
				if( request('start_at1') ){
					foreach( request('start_at1') AS $index => $row ){
						if( !empty(request('start_at1')[$index]) && !empty(request('finish_at1')[$index]) ){
							$time_use = $this->Time_Diff_Minutes( request('start_at1')[$index], request('finish_at1')[$index] );
							\App\Models\FTS\OperationDailyReportStop::firstOrCreate([
								'DailyReportID'		=> $DailyReportID,
								'ItemID' 			=> $ItemID,
								'start_at' 			=> request('start_at1')[$index],
								'finish_at' 		=> request('finish_at1')[$index],
								'time_use' 			=> $time_use,
								'time_note' 		=> request('time_note1')[$index]
							]);
							$timeStop = $timeStop+$time_use;
						}
					}
				}
			
				if( request('Hatch') ){
					foreach( request('Hatch') AS $sMode => $row ){
						if( $sData->workNo != 1 && $sMode == 'Cargo' )	continue;
							\App\Models\FTS\OperationDailyReportList::updateOrCreate(
							['ItemID' => $ItemID, 'DailyReportID' => $DailyReportID, 'Mode' => $sMode],
							[
								'Hatch1' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch1']),
								'Hatch2' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch2']),
								'Hatch3' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch3']),
								'Hatch4' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch4']),
								'Hatch5' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch5']),
								'Hatch6' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch6']),
								'Hatch7' 	=> str_replace(',','',request('Hatch')[$sMode]['Hatch7']),
								'Total' 	=> str_replace(',','',request('Hatch')[$sMode]['Total'])
							]
						);
					}
				}
				
				$sData->totalTon 		= request('totalTon');
				$sData->minuteWork 		= request('minuteWork');
				$sData->minuteStop 		= $timeStop;
				$sData->save();
				DB::commit();
				return redirect()->action('FTS\OperationDailyReportController@show', array($ItemID,$DailyReportID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
			}else{
				return redirect()->action('FTS\OperationDailyReportController@index', $ItemID)->with(['alert'=>\App\Models\Alert::Msg('warning','Duplicate')]);
			}
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->action('FTS\OperationDailyReportController@index', $ItemID)->with(['alert'=>\App\Models\Alert::Msg('warning','Transaction')]);
		}

	
		
    }
	
	
	
	
	
	public function postDatatable($ItemID){
		$sTable	= \App\Models\FTS\OperationDailyReport::leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Daily_Report.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Daily_Report.updated_by')
					->select('ck_Item_Fts_Operation_Daily_Report.id', 'workNumber', 'workDate', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Fts_Operation_Daily_Report.created_at', 'ck_Item_Fts_Operation_Daily_Report.updated_at')
					->where('ItemID',$ItemID);
					
		$sQuery	= DataTables::of($sTable);
		return $sQuery->make(true);
	}
	
	
	
    public function Alongside( $ItemID ){
		$sDate	= date('Y-m-d', strtotime(request('workDate')));
		$sDate1 = $sDate.' 00:00:00';
		$sDate2 = $sDate.' 23:59:59';
		
		$sHatch	= array(); //เก็บค่าที่ได้จากการคำนวนด้วย array 2 มิติ  [Time][Hatch]
		$sMinutes; //เก็บส่วนต่างเวลาเป็นนาที  Completed - Commenced
		$sHatch1; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 1
		$sHatch2; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 2
		$sHatch3; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 3
		$sHatch4; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 4
		$sHatch5; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 5
		$sHatch6; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 6
		$sHatch7; //เก็บค่ากำลังการขนถ่ายต่อ 10 นาที ของ Hatch 7
		$sMinute1; //เก็บค่าเวลาของการขนถ่ายของช่วงเวลา 00:00 06:00
		$sMinute2; //เก็บค่าเวลาของการขนถ่ายของช่วงเวลา 06:00 12:00
		$sMinute3; //เก็บค่าเวลาของการขนถ่ายของช่วงเวลา 12:00 18:00
		$sMinute4; //เก็บค่าเวลาของการขนถ่ายของช่วงเวลา 18:00 00:00
		$sMinuteTotal=0; 

		$sRow 	= \App\Models\FTS\OperationAlongsideLighter::where('ItemID',$ItemID)
					->whereDate('Commenced', '<=', $sDate)
					->whereDate('Completed', '>=', $sDate)
					->get();
		if( $sRow ){
			foreach($sRow AS $r){
				$sCommenced = new \DateTime($r->Commenced);
				$sCompleted	= new \DateTime($r->Completed);
	
				if( $sCommenced < $sCompleted ){ //เวลาเริ่มงานต้องน้อยกว่าวันเสร็จงาน
					$sMinute1 = $sMinute2 = $sMinute3 = $sMinute4 = NULL;
					
					if( $sCommenced < new \DateTime($sDate.' 06:00:00') AND $sCompleted >= new \DateTime($sDate.' 00:00:00') ){
						if( $sCommenced < new \DateTime($sDate.' 00:00:00') )	$vCommenced = $sDate.' 00:00:00'; else $vCommenced = $r->Commenced;
						if( $sCompleted > new \DateTime($sDate.' 06:00:00') )	$vCompleted = $sDate.' 06:00:00'; else $vCompleted = $r->Completed;
						$vCommenced = new \Carbon\Carbon($vCommenced);
						$sMinute1	= $vCommenced->diffInMinutes(new \Carbon\Carbon($vCompleted));
					}
					
					if( $sCommenced < new \DateTime($sDate.' 12:00:00') AND $sCompleted >= new \DateTime($sDate.' 06:00:00') ){
						if( $sCommenced < new \DateTime($sDate.' 06:00:00') )	$vCommenced = $sDate.' 06:00:00'; else $vCommenced = $r->Commenced;
						if( $sCompleted > new \DateTime($sDate.' 12:00:00') )	$vCompleted = $sDate.' 12:00:00'; else $vCompleted = $r->Completed;
						$vCommenced = new \Carbon\Carbon($vCommenced);
						$sMinute2	= $vCommenced->diffInMinutes(new \Carbon\Carbon($vCompleted));
					}
					
					if( $sCommenced < new \DateTime($sDate.' 18:00:00') AND $sCompleted >= new \DateTime($sDate.' 12:00:00') ){
						if( $sCommenced < new \DateTime($sDate.' 12:00:00') )	$vCommenced = $sDate.' 12:00:00'; else $vCommenced = $r->Commenced;
						if( $sCompleted > new \DateTime($sDate.' 18:00:00') )	$vCompleted = $sDate.' 18:00:00'; else $vCompleted = $r->Completed;
						$vCommenced = new \Carbon\Carbon($vCommenced);
						$sMinute3	= $vCommenced->diffInMinutes(new \Carbon\Carbon($vCompleted));
					}
					
					if( $sCommenced <= new \DateTime($sDate.' 24:00:00') AND $sCompleted >= new \DateTime($sDate.' 18:00:00') ){
						if( $sCommenced < new \DateTime($sDate.' 18:00:00') )	$vCommenced = $sDate.' 18:00:00'; else $vCommenced = $r->Commenced;
						if( $sCompleted >= new \DateTime($sDate.' 24:00:00') )	$vCompleted = $sDate.' 24:00:00'; else $vCompleted = $r->Completed;
						$vCommenced = new \Carbon\Carbon($vCommenced);
						$sMinute4	= $vCommenced->diffInMinutes(new \Carbon\Carbon($vCompleted));
						
					}
		
					$vCommenced 	= new \Carbon\Carbon($r->Commenced);
					$sMinutes 		= $vCommenced->diffInMinutes(new \Carbon\Carbon($r->Completed));
					
					$sHatch1		= empty($r->Hatch1)?0:($r->Hatch1/$sMinutes);
					$sHatch2		= empty($r->Hatch2)?0:($r->Hatch2/$sMinutes);
					$sHatch3		= empty($r->Hatch3)?0:($r->Hatch3/$sMinutes);
					$sHatch4		= empty($r->Hatch4)?0:($r->Hatch4/$sMinutes);
					$sHatch5		= empty($r->Hatch5)?0:($r->Hatch5/$sMinutes);
					$sHatch6		= empty($r->Hatch6)?0:($r->Hatch6/$sMinutes);
					$sHatch7		= empty($r->Hatch7)?0:($r->Hatch7/$sMinutes);
					
					if( !empty($sMinute1) ){
						//echo '<br>';
						//echo 'sMinute1 : '.$sMinute1;
						if( $sHatch1 )	$sHatch['Time1'][1] = round(isset($sHatch['Time1'][1])?$sHatch['Time1'][1]+($sHatch1*$sMinute1):$sHatch1*$sMinute1,1);
						if( $sHatch2 )	$sHatch['Time1'][2] = round(isset($sHatch['Time1'][2])?$sHatch['Time1'][2]+($sHatch1*$sMinute1):$sHatch2*$sMinute1,1);
						if( $sHatch3 )	$sHatch['Time1'][3] = round(isset($sHatch['Time1'][3])?$sHatch['Time1'][3]+($sHatch1*$sMinute1):$sHatch3*$sMinute1,1);
						if( $sHatch4 )	$sHatch['Time1'][4] = round(isset($sHatch['Time1'][4])?$sHatch['Time1'][4]+($sHatch1*$sMinute1):$sHatch4*$sMinute1,1);
						if( $sHatch5 )	$sHatch['Time1'][5] = round(isset($sHatch['Time1'][5])?$sHatch['Time1'][5]+($sHatch1*$sMinute1):$sHatch5*$sMinute1,1);
						if( $sHatch6 )	$sHatch['Time1'][6] = round(isset($sHatch['Time1'][6])?$sHatch['Time1'][6]+($sHatch1*$sMinute1):$sHatch6*$sMinute1,1);
						if( $sHatch7 )	$sHatch['Time1'][7] = round(isset($sHatch['Time1'][7])?$sHatch['Time1'][7]+($sHatch1*$sMinute1):$sHatch7*$sMinute1,1);
					}
					if( !empty($sMinute2) ){
						//echo '<br>';
						//echo 'sMinute2 : '.$sMinute2;
						if( $sHatch1 )	$sHatch['Time2'][1] = round(isset($sHatch['Time2'][1])?$sHatch['Time2'][1]+($sHatch1*$sMinute2):$sHatch1*$sMinute2,1);
						if( $sHatch2 )	$sHatch['Time2'][2] = round(isset($sHatch['Time2'][2])?$sHatch['Time2'][2]+($sHatch1*$sMinute2):$sHatch2*$sMinute2,1);
						if( $sHatch3 )	$sHatch['Time2'][3] = round(isset($sHatch['Time2'][3])?$sHatch['Time2'][3]+($sHatch1*$sMinute2):$sHatch3*$sMinute2,1);
						if( $sHatch4 )	$sHatch['Time2'][4] = round(isset($sHatch['Time2'][4])?$sHatch['Time2'][4]+($sHatch1*$sMinute2):$sHatch4*$sMinute2,1);
						if( $sHatch5 )	$sHatch['Time2'][5] = round(isset($sHatch['Time2'][5])?$sHatch['Time2'][5]+($sHatch1*$sMinute2):$sHatch5*$sMinute2,1);
						if( $sHatch6 )	$sHatch['Time2'][6] = round(isset($sHatch['Time2'][6])?$sHatch['Time2'][6]+($sHatch1*$sMinute2):$sHatch6*$sMinute2,1);
						if( $sHatch7 )	$sHatch['Time2'][7] = round(isset($sHatch['Time2'][7])?$sHatch['Time2'][7]+($sHatch1*$sMinute2):$sHatch7*$sMinute2,1);
					}
					if( !empty($sMinute3) ){
						//echo '<br>';
						//echo 'sMinute3 : '.$sMinute3;
						if( $sHatch1 )	$sHatch['Time3'][1] = round(isset($sHatch['Time3'][1])?$sHatch['Time3'][1]+($sHatch1*$sMinute3):$sHatch1*$sMinute3,1);
						if( $sHatch2 )	$sHatch['Time3'][2] = round(isset($sHatch['Time3'][2])?$sHatch['Time3'][2]+($sHatch1*$sMinute3):$sHatch2*$sMinute3,1);
						if( $sHatch3 )	$sHatch['Time3'][3] = round(isset($sHatch['Time3'][3])?$sHatch['Time3'][3]+($sHatch1*$sMinute3):$sHatch3*$sMinute3,1);
						if( $sHatch4 )	$sHatch['Time3'][4] = round(isset($sHatch['Time3'][4])?$sHatch['Time3'][4]+($sHatch1*$sMinute3):$sHatch4*$sMinute3,1);
						if( $sHatch5 )	$sHatch['Time3'][5] = round(isset($sHatch['Time3'][5])?$sHatch['Time3'][5]+($sHatch1*$sMinute3):$sHatch5*$sMinute3,1);
						if( $sHatch6 )	$sHatch['Time3'][6] = round(isset($sHatch['Time3'][6])?$sHatch['Time3'][6]+($sHatch1*$sMinute3):$sHatch6*$sMinute3,1);
						if( $sHatch7 )	$sHatch['Time3'][7] = round(isset($sHatch['Time3'][7])?$sHatch['Time3'][7]+($sHatch1*$sMinute3):$sHatch7*$sMinute3,1);
					}
					if( !empty($sMinute4) ){
						//echo '<br>';
						//echo 'sMinute4 : '.$sMinute4;
						if( $sHatch1 )	$sHatch['Time4'][1] = round(isset($sHatch['Time4'][1])?$sHatch['Time4'][1]+($sHatch1*$sMinute4):$sHatch1*$sMinute4,1);
						if( $sHatch2 )	$sHatch['Time4'][2] = round(isset($sHatch['Time4'][2])?$sHatch['Time4'][2]+($sHatch1*$sMinute4):$sHatch2*$sMinute4,1);
						if( $sHatch3 )	$sHatch['Time4'][3] = round(isset($sHatch['Time4'][3])?$sHatch['Time4'][3]+($sHatch1*$sMinute4):$sHatch3*$sMinute4,1);
						if( $sHatch4 )	$sHatch['Time4'][4] = round(isset($sHatch['Time4'][4])?$sHatch['Time4'][4]+($sHatch1*$sMinute4):$sHatch4*$sMinute4,1);
						if( $sHatch5 )	$sHatch['Time4'][5] = round(isset($sHatch['Time4'][5])?$sHatch['Time4'][5]+($sHatch1*$sMinute4):$sHatch5*$sMinute4,1);
						if( $sHatch6 )	$sHatch['Time4'][6] = round(isset($sHatch['Time4'][6])?$sHatch['Time4'][6]+($sHatch1*$sMinute4):$sHatch6*$sMinute4,1);
						if( $sHatch7 )	$sHatch['Time4'][7] = round(isset($sHatch['Time4'][7])?$sHatch['Time4'][7]+($sHatch1*$sMinute4):$sHatch7*$sMinute4,1);
					}
					//echo '<hr>';
				}//จบ-วลาเริ่มงานต้องน้อยกว่าวันเสร็จงาน
				
				$r->Minute = $sMinutes;
				$r->save();
				$sMinuteTotal = $sMinuteTotal+$sMinutes;
			}
			return response()->json(array('status'=>'success','sHatch'=>$sHatch,'sMinute'=>$sMinuteTotal,'msg' =>'<b>พบข้อมูลใน Alongside</b><br>ระบบดึงข้อมูลเรียบร้อย'));
		}else{
			return response()->json(array('status'=>'danger','sHatch'=>$sHatch,'msg' =>'<b>ไม่พบข้อมูลใน Alongside ตามวันที่กำหนด</b><br>กรุณาทำรายการในหน้า  LIST OF LIGHTER ALONGSIDE ก่อน'));
		}
		
    }
}
