<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationAlongsideController extends Controller
{
    public function index( $OperationID ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem = \App\Models\FTS\Operation::Item($sRow->SmdID);
			return View('FTS.Operation.AlongsideIndex')
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
		$sRow = \App\Models\FTS\OperationAlongside::where('OperationID', $OperationID)->first();
		if( $sRow )
			return $this->Form($OperationID, $sRow->id);
		else
			return $this->Form($OperationID);
    }
	
    public function show($OperationID, $AlongsideID) 
    {
		return $this->Form($OperationID, $AlongsideID);
    }
	
	public function Form($OperationID, $AlongsideID=null ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem 		= \App\Models\FTS\Operation::Item($sRow->SmdID);
			$rowAlongside 	= \App\Models\FTS\OperationAlongside::find($AlongsideID);
			$rowLighter 	= \App\Models\FTS\OperationAlongsideLighter::where('AlongsideID', $AlongsideID)->orderBy('id','asc')->get();
			
		
			return View('FTS.Operation.AongsideForm')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'rowAlongside'	=> empty($rowAlongside)?null:$rowAlongside,
						'rowLighter'	=> empty($rowLighter)?null:$rowLighter,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
		
    }
	
	
    public function store($OperationID) 
    {
		$sData = \App\Models\FTS\OperationAlongside::where('id','!=',request('AlongsideID'))->where('OperationID',$OperationID)->where('workDate',date('Y-m-d',strtotime(request('workDate'))))->count();
		if( empty($sData) && !empty(request('workDate'))  ){
			if( request('AlongsideID') ){
				$sData = \App\Models\FTS\OperationAlongside::find(request('AlongsideID'));
			}
			if( empty($sData) ){
				$sData	= new \App\Models\FTS\OperationAlongside;
				$qCount = (\App\Models\FTS\OperationAlongside::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationAlongside::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationAlongside::where('OperationID',$OperationID)->count()+1;
				
				$rsOperation 		= \App\Models\FTS\Operation::find($OperationID);
				$sData->workNumber	= $rsOperation->workNumber.'-A'.sprintf('%02d',$qCount);
				$sData->OperationID	= $OperationID;
			}
			$sData->workDate 	= date('Y-m-d',strtotime(request('workDate')));
			$sData->Loading 	= str_replace(',','',request('Loading'));
			$sData->save();
			$AlongsideID = $sData->id;
			
			//dd($_POST);
			if( request('LighterID') ){
				foreach( request('LighterID') AS $index => $row ){
					if( !empty(request('LighterID')[$index]) && !empty(request('ProductID')[$index]) ){
						if( !empty(request('AlongsideLighterID')[$index]) ){
							$sLighter = \App\Models\FTS\OperationAlongsideLighter::find(request('AlongsideLighterID')[$index]);
						}
						if( empty($sLighter) || empty(request('AlongsideLighterID')[$index]) ){
							$sLighter = new \App\Models\FTS\OperationAlongsideLighter;
						}
						
						$sLighter->ItemID 			= request('ItemID');
						$sLighter->OperationID 		= $OperationID;
						$sLighter->AlongsideID 		= $AlongsideID;
						$sLighter->LighterID 		= request('LighterID')[$index];
						$sLighter->ProductID 		= request('ProductID')[$index];
						$sLighter->Consignee 		= request('Consignee')[$index];
						$sLighter->KGS 				= request('KGS')[$index];
						$sLighter->TONS 			= request('TONS')[$index];
						$sLighter->Marks 			= request('Marks')[$index];
						$sLighter->Alongside 		= date('Y-m-d H:i:s',strtotime(request('Alongside')[$index]));
						$sLighter->Commenced 		= date('Y-m-d H:i:s',strtotime(request('Commenced')[$index]));
						$sLighter->Completed 		= date('Y-m-d H:i:s',strtotime(request('Completed')[$index]));
						$sLighter->Hatch1 			= request('Hatch1')[$index];
						$sLighter->Hatch2 			= request('Hatch2')[$index];
						$sLighter->Hatch3 			= request('Hatch3')[$index];
						$sLighter->Hatch4 			= request('Hatch4')[$index];
						$sLighter->Hatch5 			= request('Hatch5')[$index];
						$sLighter->Hatch6 			= request('Hatch6')[$index];
						$sLighter->Hatch7 			= request('Hatch7')[$index];
						$sLighter->MaxLoad 			= request('MaxLoad')[$index];
						$sLighter->save();
					}
				}
				if( request('sDelete') ){
					\App\Models\FTS\OperationAlongsideLighter::whereIn('id', explode(',', request('sDelete')))->delete();
				}
			}
			
			return redirect()->action('FTS\OperationAlongsideController@show', array($OperationID,$AlongsideID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('FTS\OperationAlongsideController@create', $OperationID)->with(['alert'=>\App\Models\Alert::Msg('warning','Duplicate')]);
		}
    }
}
