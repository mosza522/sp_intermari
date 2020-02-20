<?php
namespace App\Http\Controllers\SMD;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SMDController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$rowJobMode			= \App\Models\SMD\JobMode::All();
		$rowJobStatus		= \App\Models\SMD\JobStatus::All();
		return View('SMD.index')->with(array('PageContainer'=> true, 'rowJobMode'=> $rowJobMode, 'rowJobStatus'=> $rowJobStatus) );
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
		DB::beginTransaction();
		try {
			$sData 	= new \App\Models\SMD\Smd;
			$sData->job_number			= $this->runNumberCode('SMD', '\App\Models\SMD\Smd', null, 'job_number');
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
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
		}

		return redirect()->action('SMD\SMDController@edit', $sData->id)->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($SmdID, $sMode=false)
    {
		
		$sRow = \App\Models\SMD\Smd::find($SmdID);
		if( $sRow ){
			$rowItem =array();
			$sRow->BoatName			= empty($sRow->BoatID)?'':\App\Models\Master\SMD\Boat::find($sRow->BoatID)->BoatName;
			$sRow->OwnerName		= empty($sRow->OwnerID)?'':\App\Models\Master\SMD\Owner::find($sRow->OwnerID)->OwnerName;
			$sRow->ProductID		= json_decode($sRow->ProductID);
			$rowSmdItem				= \App\Models\SMD\SmdItem::where('SmdID',$SmdID)->get();
			$rowSmd2Item 			= \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')->where('SmdID',$SmdID)->get();

			if( $rowSmdItem ){
				foreach( $rowSmdItem AS $row){
					if( $row->work_mode == 'FTS' ){
						$rowItem[$row->work_mode][$row->work_type][] = $row;
					}else{
						$rowItem[$row->work_mode][] = $row;
					}
				}
			}
			return view('SMD.form')->with(
				array(
						'PageContainer'			=> true, 
						'sRow'					=> $sRow, 
						'rowItem'				=> $rowItem, 
						'rowSmd2Item'			=> $rowSmd2Item,
						'sMode'					=> $sMode, 
						'sTitle'				=> 'ใบสั่งขาย '.$sRow->job_number
					)
			);
		}else{
			return redirect()->action('SMD\SMDController@index');
		}
    }
	
	
		
	public function PageView($OrderID, $ItemID, $sPage=false, $sPageName=false)
    {
		$sRow = \App\Models\SMD\Smd::find($OrderID);
		if( $sRow ){
			$sRow->BoatName				= empty($sRow->BoatID)?'':\App\Models\Master\SMD\Boat::find($sRow->BoatID)->BoatName;
			$sRow->OwnerName			= empty($sRow->OwnerID)?'':\App\Models\Master\SMD\Owner::find($sRow->OwnerID)->OwnerName;
			$rowItem 					= \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')->where('SmdID', $OrderID)->get();
		
			if( $sPage == 'buoy' || $sPage == 'steviedore'  ){
				if( $ItemID ){
					$sRowItem				= \App\Models\SMD\SmdItem::find($ItemID);
				}
			}
			
			if( $sPage == 'ship'  ){
				if( $ItemID ){
					$sRowItem 				= \App\Models\SMD\SmdItem::leftJoin('ck_Master_Smd_Harbor','ck_Master_Smd_Harbor.id','=','ck_Smd_Item.HarborID')->where('SmdID', $OrderID)->select(DB::raw('ck_Smd_Item.*'), DB::raw('ck_Master_Smd_Harbor.*'),'ck_Smd_Item.id AS id','ck_Smd_Item.created_at AS created_at','ck_Smd_Item.deleted_at AS deleted_at')->where('ck_Smd_Item.id',$ItemID)->first();
					$sRowShipProductMain	= \App\Models\SMD\SmdItem2RTM::join('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_Item_2_RTM.ProductID')->select('ProductID', 'DateIssue', 'DateArrive', 'Weight', 'ProductName')->where('SmdID', $OrderID)->where('ItemID',$ItemID)->get();
					$sRowShipProductItem	= \App\Models\SMD\SmdItem2RTMItem::join('ck_Master_Smd_Owner','ck_Master_Smd_Owner.id','=','ck_Smd_Item_2_RTM_Item.CustomerID')->select('ProductID', 'CustomerID', 'Weight', 'OwnerName')->where('SmdID', $OrderID)->where('ItemID',$ItemID)->get();
					
					$sRowShipItem = array();
					if( $sRowShipProductMain ){
						foreach( $sRowShipProductMain AS $r ){
							$sRowShipItem[$r->ProductID][0] = array(
								'Weight' 		=> $r->Weight,
								'DateArrive' 	=> $r->DateArrive,
								'DateIssue' 	=> $r->DateIssue,
								'ProductName' 	=> $r->ProductName
							);
						}
						foreach( $sRowShipProductItem AS $r ){
							$sRowShipItem[$r->ProductID][$r->CustomerID] = array(
								'Weight' 		=> $r->Weight,
								'OwnerName' 	=> $r->OwnerName
							);
						}
					}
				}
				$sRowShipWeight	= \App\Models\SMD\SmdItem::Join('ck_Smd_Item_2_RTM_Item', function ($join) {$join->on('ck_Smd_Item_2_RTM_Item.SmdID', '=', 'ck_Smd_Item.SmdID')->on('ck_Smd_Item_2_RTM_Item.ItemID', '=', 'ck_Smd_Item.id');})->where('ck_Smd_Item.SmdID', $OrderID)->where('ItemID', '!=', $ItemID)->select('ProductID', DB::raw('sum(Weight) as Weight'))->groupBy('ProductID')->get();
				$sRowWeight 	= array();
				if( $sRowShipWeight ){
					foreach( $sRowShipWeight AS $r ){
						$sRowWeight[$r->ProductID] = $r->Weight;
					}
				}
			}
			
			if( $sPage == 'blackhole'  ){
				if( $ItemID ){
					$sRowItem 			= \App\Models\SMD\SmdItem::Smd($ItemID);
					$sRowBlackholeItem 	= \App\Models\SMD\SmdItem::Item($sRowItem);
				
				}
				$sRowBlackholeWeight	= \App\Models\SMD\SmdItem::Join('ck_Smd_Item_2_CLM', function ($join) {$join->on('ck_Smd_Item_2_CLM.SmdID', '=', 'ck_Smd_Item.SmdID')->on('ck_Smd_Item_2_CLM.ItemID', '=', 'ck_Smd_Item.id');})->where('ck_Smd_Item.SmdID', $OrderID)->where('ItemID', '!=', $ItemID)->select('ProductID', DB::raw('sum(Weight) as Weight'))->groupBy('ProductID')->get();
				$sRowWeight = array();
				if( $sRowBlackholeWeight ){
					foreach( $sRowBlackholeWeight AS $r ){
						$sRowWeight[$r->ProductID] = $r->Weight;
					}
				}
			}
			
			if( $sPage == 'truck' ){
				if( $ItemID ){
					$sRowItem 			= \App\Models\SMD\SmdItem::Smd($ItemID);
					$sRowTruckItem 		= \App\Models\SMD\SmdItem::Item($sRowItem);
				}
				$sRowTruckWeight		= \App\Models\SMD\SmdItem::Join('ck_Smd_Item_2_TRU', function ($join) {$join->on('ck_Smd_Item_2_TRU.SmdID', '=', 'ck_Smd_Item.SmdID')->on('ck_Smd_Item_2_TRU.ItemID', '=', 'ck_Smd_Item.id');})->where('ck_Smd_Item.SmdID', $OrderID)->where('ItemID', '!=', $ItemID)->select('ProductID', DB::raw('sum(Weight) as Weight'))->groupBy('ProductID')->get();
				$sRowWeight = array();
				if( $sRowTruckWeight ){
					foreach( $sRowTruckWeight AS $r ){
						$sRowWeight[$r->ProductID] = $r->Weight;
					}
				}
			}
			
			if( $sPage == 'thasin' ){
				if( $ItemID ){
					$sRowItem 			= \App\Models\SMD\SmdItem::Smd($ItemID);
					$sRowThasinItem 	= \App\Models\SMD\SmdItem::Item($sRowItem);
					$sRowThasinWarehouse= \App\Models\SMD\SmdItem2SWPWarehouse::where('SmdID', $OrderID)->where('ItemID', $ItemID)->get();
					
					
					$sSWPCLM			= \App\Models\SMD\SmdItem::where('work_mode', 'CLM')->where('work_ref', $sRowItem->work_number)->first();
					$sSWPTRU			= \App\Models\SMD\SmdItem::where('work_mode', 'TRU')->where('work_ref', $sRowItem->work_number)->first();
				}
				$sRowWarehouse			= \App\Models\Master\SMD\Warehouse::All();
			}
			
			if( $sPage == 'other' ){
				if( $ItemID ){
					$sRowItem			= \App\Models\SMD\SmdItem::where('SmdID', $OrderID)->where('ck_Smd_Item.id', $ItemID)->first();
				}
			}
			
			if( !empty($ItemID) && empty($sRowItem) ){
				return redirect()->action('SMD\SMDController@edit', $OrderID)->with(['alert'=>\App\Models\Alert::Msg('danger')]);
			}
			
			return view('SMD.form-'.$sPage)->with(
				array(
						'PageContainer'			=> true, 
						'sRow'					=> $sRow, 
						'rowItem'				=> $rowItem,  
						
						'sRowItem'				=> empty($sRowItem)?null:$sRowItem, 
						'sRowWeight'			=> empty($sRowWeight)?null:$sRowWeight, 
						
						'sRowShipItem'			=> empty($sRowShipItem)?null:$sRowShipItem, 
						
						'sRowBlackholeItem'		=> empty($sRowBlackholeItem)?null:$sRowBlackholeItem,
						
						'sRowTruckItem'			=> empty($sRowTruckItem)?null:$sRowTruckItem,
						
						'sSWPCLM'				=> empty($sSWPCLM)?null:$sSWPCLM,
						'sSWPTRU'				=> empty($sSWPTRU)?null:$sSWPTRU,
						'sRowWarehouse'			=> empty($sRowWarehouse)?null:$sRowWarehouse,
						'sRowThasinItem'		=> empty($sRowThasinItem)?null:$sRowThasinItem,
						'sRowThasinWarehouse'	=> empty($sRowThasinWarehouse)?null:$sRowThasinWarehouse,
						
						'sPage'					=> $sPage,
						'sTitle'				=> 'ใบแจ้งงาน'.$sPageName.' '.(empty($sRowItem)?'':$sRowItem->work_number)
					)
			);
		}else{
			return redirect()->action('SMD\SMDController@index');
		}
    }
	
	
    public function Buoy($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'buoy', 'ทุ่น');
	}
	
    public function StevieDore($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'steviedore', 'สตีวีโดร์');
	}
	
    public function Ship($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'ship', 'เรือ');
	}
	
    public function BlackHole($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'blackhole', 'แบคโฮ');
	}
	
    public function Truck($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'truck', 'รถบรรทุก');
	}
	
    public function ThaSin($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'thasin', 'ท่าสิน');
	}
	
    public function Other($OrderID, $ItemID=NULL){
		return $this->PageView($OrderID, $ItemID, 'other', 'อื่น ๆ');
	}
		
    public function saveBuoy($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemFTS_ID'));
		if( !$sData ){
			$sData 				= new \App\Models\SMD\SmdItem;
			$sData->SmdID		= $SmdID;
			$sData->work_type	= 'Buoy';
			$sData->work_mode	= 'FTS';
			$sData->work_number	= $this->runNumberCode('FTS', '\App\Models\SMD\SmdItem', array('work_mode'=>'FTS'));
		}
		$sData->work_load			= str_replace(',','',request('work_load'));
		$sData->work_sealine		= request('work_sealine');
		$sData->work_note			= request('work_note');
		$sData->save();
		
		return redirect()->action('SMD\SMDController@Buoy', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    public function saveStevieDore($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemFTS_ID'));
		if( !$sData ){
			$sData 					= new \App\Models\SMD\SmdItem;
			$sData->SmdID			= $SmdID;
			$sData->work_type		= 'StevieDore';
			$sData->work_mode		= 'FTS';
			$sData->work_number		= $this->runNumberCode('FTS', '\App\Models\SMD\SmdItem', array('work_mode'=>'FTS'));
		}
		$sData->work_grab			= request('work_grab');
		$sData->work_machine		= request('work_machine');
		$sData->work_sealine		= request('work_sealine');
		$sData->work_crane_number	= request('work_crane_number');
		$sData->work_crane_weight	= request('work_crane_weight');
		$sData->work_note			= request('work_note');
		$sData->save();
		
		return redirect()->action('SMD\SMDController@StevieDore', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
    }
		
    public function saveShip($SmdID)
    {

		DB::beginTransaction();
		try {

			$sData = \App\Models\SMD\SmdItem::find(request('JobItemShipID'));
			if( !$sData ){
				$sData 	= new \App\Models\SMD\SmdItem;
				$sData->SmdID			= $SmdID;
				$sData->work_mode		= 'RTM';
				$sData->work_number		= $this->runNumberCode('RTM', '\App\Models\SMD\SmdItem', array('work_mode'=>'RTM'));
			}
			$sData->HarborID			= request('HarborID');
			$sData->work_motorboat		= request('work_motorboat');
			$sData->work_tanker			= request('work_tanker');
			$sData->work_police			= request('work_police');
			$sData->work_note			= request('work_note');
			$sData->save();
			$ItemID = $sData->id;
			
			if( request('ProductID') ){
				$ProductID = 0;
				\App\Models\SMD\SmdItem2RTM::where('ItemID', $ItemID)->update(['iCheck' => 1]);
				\App\Models\SMD\SmdItem2RTMItem::where('ItemID', $ItemID)->update(['iCheck' => 1]);
				foreach( request('ProductID') AS $iNum=>$PID ){
					$ProductID = empty($PID)?$ProductID:$PID;
					if( !empty($PID) ){
						\App\Models\SMD\SmdItem2RTM::updateOrCreate(
							['SmdID'=>$SmdID, 'ItemID' => $ItemID, 'ProductID' => $PID],
							['DateIssue' => request('DateIssue')[$iNum]?date('Y-m-d H:i:s', strtotime(request('DateIssue')[$iNum])):NULL, 'Weight' => str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>NULL]
						);
					}else{
						\App\Models\SMD\SmdItem2RTMItem::updateOrCreate(
							['SmdID'=>$SmdID, 'ItemID' => $ItemID, 'ProductID' => $ProductID, 'CustomerID' => request('CustomerID')[$iNum]],
							['Weight' => str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>NULL]
						);
					}
				}
				\App\Models\SMD\SmdItem2RTM::where('ItemID', $ItemID)->where('iCheck', 1)->delete();
				\App\Models\SMD\SmdItem2RTMItem::where('ItemID', $ItemID)->where('iCheck', 1)->delete();
			}
			
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
		}
		
		
		return redirect()->action('SMD\SMDController@Ship', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
    }
	
    public function saveBlackHole($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemCLMID'));
		if( !$sData ){
			$sData 	= new \App\Models\SMD\SmdItem;
			$sData->SmdID			= $SmdID;
			$sData->work_mode		= 'CLM';
			$sData->work_number		= $this->runNumberCode('CLM', '\App\Models\SMD\SmdItem', array('work_mode'=>'CLM'));
		}
		$sData->HarborID				= request('HarborID');
		$sData->work_date_issue			= empty(request('work_date_issue'))?NULL:date('Y-m-d H:i:s', strtotime(request('work_date_issue')));
		$sData->work_backhoe			= request('work_backhoe');
		$sData->work_sweep_line			= request('work_sweep_line');
		$sData->work_bobcat				= request('work_bobcat');
		$sData->work_baekho_warehouse	= request('work_baekho_warehouse');
		$sData->work_contractor			= request('work_contractor');
		$sData->work_note				= request('work_note');
		$sData->save();
		$ItemID = $sData->id;
		
		if( request('ProductID') ){
			\App\Models\SMD\SmdItem2CLM::where('ItemID', $ItemID)->update(['iCheck' => 1]);
			foreach( request('ProductID') AS $iNum=>$PID ){
				\App\Models\SMD\SmdItem2CLM::updateOrCreate(
					['SmdID'=>$SmdID, 'ItemID' => $ItemID, 'ProductID' => $PID],
					['Weight' => str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>NULL]
				);
			}
			\App\Models\SMD\SmdItem2CLM::where('ItemID', $ItemID)->where('iCheck', 1)->delete();
		}
		
		return redirect()->action('SMD\SMDController@BlackHole', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
   
	}
	
	
	
    public function saveTruck($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemTruckID'));
		if( !$sData ){
			$sData 	= new \App\Models\SMD\SmdItem;
			$sData->SmdID			= $SmdID;
			$sData->work_mode		= 'TRU';
			$sData->work_number		= $this->runNumberCode('TRU', '\App\Models\SMD\SmdItem', array('work_mode'=>'TRU'));
		}
		$sData->work_date_issue		= empty(request('work_date_issue'))?NULL:date('Y-m-d H:i:s', strtotime(request('work_date_issue')));
		$sData->work_source			= request('work_source');
		$sData->work_destination	= request('work_destination');
		$sData->work_contractor		= request('work_contractor');
		$sData->work_note			= request('work_note');
		$sData->save();
		$ItemID = $sData->id;
		
		if( request('ProductID') ){
			DB::table('ck_Smd_Item_2_TRU')->where('SmdID',$SmdID)->where('ItemID',$ItemID)->update( array('iCheck'=>'1') );
			$ProductID = 0;
			foreach( request('ProductID') AS $iNum=>$PID ){
				$ProductID = empty($PID)?$ProductID:$PID;
				$sRow = DB::table('ck_Smd_Item_2_TRU')->where('ItemID',$ItemID)->where('ProductID',$ProductID)->first();
				if( !$sRow ){
					DB::table('ck_Smd_Item_2_TRU')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$ProductID, 'Weight'=>str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>'0') );
				}else{
					DB::table('ck_Smd_Item_2_TRU')->where('ItemID',$ItemID)->where('ProductID',$ProductID)->update( array('iCheck'=>'0', 'Weight'=>str_replace(',','',request('Weight')[$iNum])) );
				}
			}
			DB::table('ck_Smd_Item_2_TRU')->where('ItemID',$ItemID)->where('iCheck','1')->delete();
		}
		
		return redirect()->action('SMD\SMDController@Truck', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
	}
	
    public function saveThaSin($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemSWPID'));
		if( !$sData ){
			$sData 	= new \App\Models\SMD\SmdItem;
			$sData->SmdID			= $SmdID;
			$sData->work_mode		= 'SWP';
			$sData->work_contractor	= 'SWP';
			$sData->work_number		= $this->runNumberCode('SWP', '\App\Models\SMD\SmdItem', array('work_mode'=>'SWP'));
		}
		$sData->work_date_issue			= empty(request('work_date_issue'))?NULL:date('Y-m-d H:i:s', strtotime(request('work_date_issue')));
		$sData->work_baekho_warehouse	= request('work_baekho_warehouse');
		$sData->work_scales				= request('work_scales');
		$sData->work_leach				= request('work_leach');
		$sData->work_leach_sweep		= request('work_leach_sweep');
		$sData->work_warehouse			= request('work_warehouse');
		$sData->work_pass				= request('work_pass');
		$sData->work_pass_weight		= str_replace(',','',request('work_pass_weight'));
		$sData->work_note				= request('work_note');
		$sData->save();
		$ItemID = $sData->id;

		if( request('ProductID') ){
			\App\Models\SMD\SmdItem2SWP::where('ItemID', $ItemID)->update(['iCheck' => 1]);
			foreach( request('ProductID') AS $iNum=>$PID ){
				\App\Models\SMD\SmdItem2SWP::updateOrCreate(
					['SmdID'=>$SmdID, 'ItemID' => $ItemID, 'ProductID' => $PID],
					['Weight' => str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>NULL]
				);
			}
			\App\Models\SMD\SmdItem2SWP::where('ItemID', $ItemID)->where('iCheck', 1)->delete();
		}
		
		if( request('WarehouseID') ){
			\App\Models\SMD\SmdItem2SWPWarehouse::where('ItemID', $ItemID)->update(['iCheck' => 1]);
			foreach( request('WarehouseID') AS $iNum=>$WarehouseID ){
				if( !empty($WarehouseID) ){
					\App\Models\SMD\SmdItem2SWPWarehouse::updateOrCreate(
						['SmdID'=>$SmdID, 'ItemID' => $ItemID, 'WarehouseID' => $WarehouseID],
						['Weight' => str_replace(',','',request('WarehouseWeight')[$iNum]), 'Sweep' => request('Sweep')[$iNum], 'iCheck'=>NULL]
					);
				}
			}
			\App\Models\SMD\SmdItem2SWPWarehouse::where('ItemID', $ItemID)->where('iCheck', 1)->delete();
		}
		
		return redirect()->action('SMD\SMDController@ThaSin', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
		
	}
	
    public function saveOther($SmdID)
    {
		$sData = \App\Models\SMD\SmdItem::find(request('JobItemOtherID'));
		if( !$sData ){
			$sData 	= new \App\Models\SMD\SmdItem;
			$sData->SmdID			= $SmdID;
			$sData->work_mode		= 'ETE';
			$sData->work_number		= $this->runNumberCode('ETE', '\App\Models\SMD\SmdItem', array('work_mode'=>'ETE'));
		}
		$sData->work_buoy			= request('work_buoy');
		$sData->work_ship			= request('work_ship');
		$sData->work_blackhole		= request('work_blackhole');
		$sData->work_thasin			= request('work_thasin');
		$sData->work_truck			= request('work_truck');
		$sData->work_price			= str_replace(',','',request('work_price'));
		$sData->work_note			= request('work_note');
		$sData->save();
		
		return redirect()->action('SMD\SMDController@Other', array($SmdID, $sData->id))->with(['RecordID' => $SmdID, 'alert'=>\App\Models\Alert::Msg('success')]);
	}
		
    /**
     * Update the specified resource in storage.
     */
    public function Smd2Item($SmdID){
		if( request('ProductID') ){
			DB::table('ck_Smd_2_Item')->where('SmdID',$SmdID)->update( array('iCheck'=>'1') );
			foreach( request('ProductID') AS $iNum=>$PID ){
				$sRow = DB::table('ck_Smd_2_Item')->where('SmdID',$SmdID)->where('ProductID',$PID)->first();
				if( !$sRow ){
					DB::table('ck_Smd_2_Item')->insert( array('SmdID'=>$SmdID, 'ProductID'=>$PID, 'Weight'=>str_replace(',','',request('Weight')[$iNum]), 'iCheck'=>'0') );
				}else{
					DB::table('ck_Smd_2_Item')->where('SmdID',$SmdID)->where('ProductID',$PID)->update( array('iCheck'=>'0', 'Weight'=>str_replace(',','',request('Weight')[$iNum])) );
				}
			}
			DB::table('ck_Smd_2_Item')->where('SmdID',$SmdID)->where('iCheck','1')->delete();
		}
		
	}
    public function update(Request $request, $id)
    {
		DB::beginTransaction();
		try {
			$sData = \App\Models\SMD\Smd::find($id);
			$sData->BoatID				= request('BoatID');
			$sData->OwnerID				= request('OwnerID');
			$sData->job_date_eta		= empty(request('job_date_eta'))?NULL:date('Y-m-d H:i:s', strtotime(request('job_date_eta')));
			$sData->ProductID			= empty(request('ProductID'))?$sData->ProductID:json_encode(request('ProductID'));
			$sData->job_note			= request('job_note');
			$sData->job_unit			= request('job_unit');
			$sData->job_category		= request('job_category');
			$sData->job_transport		= request('job_transport');
			$sData->job_customer_type	= request('job_customer_type');
			$sData->job_weight 			= str_replace(',','',request('job_weight'));
			$sData->updated_at			= \Carbon\Carbon::now();
			$sData->save();
			$this->Smd2Item($sData->id);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
		}
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

	public function postDatatable(Request $request){
		$sTable = \App\Models\SMD\Smd::leftJoin('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Smd.BoatID')
					->leftJoin('ck_Smd_Mode', 'ck_Smd_Mode.id', '=', 'ck_Smd.ModeID')
					->leftJoin('ck_Smd_Status', 'ck_Smd_Status.id', '=', 'ck_Smd.StatusID')
					->select('ck_Smd.id','job_number','BoatName','job_date_eta','job_transport', 'job_weight', 'Mode_Name', 'Status_Name', 'ck_Smd.deleted_at');
			
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
		->editColumn('job_price',function($data){
			return empty($data->job_price)?'-':number_format($data->job_price);
		});
		return $sQuery->make(true);
	}
	
	public function getSearchAutoComplete(Request $request)
    {
		return \App\Models\SMD\Smd::where('StaffFirstName', 'like', '%'.request('StaffCode').'%')
			->select('id', 'StaffFirstName AS StaffCode')
			->orderBy('StaffFirstName','asc')->take(20)->get();
	}
	
	
    public function ItemRemove($SmdID, $ItemID, $Mode)
    {
		$sRow = \App\Models\SMD\SmdItem::find($ItemID);
		if( $sRow && $sRow->work_prepare == 'N' ){
			\App\Models\SMD\SmdItem::where('id',$ItemID)->forceDelete();
			\App\Models\SMD\SmdItem2TRU::where('id',$ItemID)->forceDelete();
			\App\Models\SMD\SmdItem2CLM::where('id',$ItemID)->forceDelete();
			return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@edit', array($SmdID, $ItemID)).'?withTrashed=true'), \App\Models\Alert::Msg('success')));
		}else{
			return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@edit', array($SmdID, $ItemID)).'?withTrashed=true'), \App\Models\Alert::Msg('danger')));
		}
	}
	
    public function ItemCopy($SmdID, $ItemID, $ModeFrom, $ModeTo)
    {

		if( $ModeFrom == 'Ship' ){
			$rowShip = \App\Models\SMD\SmdItem::find($ItemID);
			if( $rowShip ){
				$rowProduct = \App\Models\SMD\SmdItem2RTM::where('ItemID', $ItemID)->get();
				
				if( $ModeTo == 'BlackHole' ){
					$sData 	= new \App\Models\SMD\SmdItem;
					$sData->SmdID			= $SmdID;
					$sData->work_mode		= 'CLM';
					$sData->work_number		= $this->runNumberCode('CLM', '\App\Models\SMD\SmdItem', array('work_mode'=>'CLM'));
					$sData->HarborID		= $rowShip->HarborID;
					$sData->work_ref		= $rowShip->work_number;
					$sData->work_note		= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : '.$rowShip->work_number;
					$sData->work_backhoe			= 1;
					$sData->work_sweep_line			= 1;
					$sData->work_bobcat				= 1;
					$sData->work_baekho_warehouse	= 0;
					$sData->save();
					$ItemID = $sData->id;
					if( $rowProduct ){
						foreach( $rowProduct AS $r ){
							DB::table('ck_Smd_Item_2_CLM')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
						}
					}
					return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@BlackHole', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
				}
				
				if( $ModeTo == 'Truck' ){
					$sData 	= new \App\Models\SMD\SmdItem;
					$sData->SmdID			= $SmdID;
					$sData->work_ref		= $rowShip->work_number;
					$sData->work_mode		= 'TRU';
					$sData->work_number		= $this->runNumberCode('TRU', '\App\Models\SMD\SmdItem', array('work_mode'=>'TRU'));
					$sData->work_note		= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : '.$rowShip->work_number;
					$sData->save();
					$ItemID = $sData->id;
					if( $rowProduct ){
						foreach( $rowProduct AS $r ){
							DB::table('ck_Smd_Item_2_TRU')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
						}
					}
					return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@Truck', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
				}
				
				if( $ModeTo == 'ThaSin' ){
					$sData 	= new \App\Models\SMD\SmdItem;
					$sData->SmdID			= $SmdID;
					$sData->work_ref		= $rowShip->work_number;
					$sData->work_mode		= 'SWP';
					$sData->work_number		= $this->runNumberCode('SWP', '\App\Models\SMD\SmdItem', array('work_mode'=>'SWP'));
					$sData->work_note		= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานเรือ : '.$rowShip->work_number;
					$sData->save();
					$id = $sData->id;
					$ItemID = $sData->id;
					if( $rowProduct ){
						foreach( $rowProduct AS $r ){
							DB::table('ck_Smd_Item_2_SWP')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
						}
					}
					return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@ThaSin', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
				}
			}
		}
		if( $ModeFrom == 'BlackHole' ){
			$rowBlackHole = \App\Models\SMD\SmdItem::find($ItemID);
			if( $rowBlackHole ){
				$rowProduct = \App\Models\SMD\SmdItem2CLM::where('ItemID', $ItemID)->get();
				$sData 		= new \App\Models\SMD\SmdItem;
				$sData->SmdID			= $SmdID;
				$sData->work_ref		= $rowBlackHole->work_number;
				$sData->work_mode		= 'TRU';
				$sData->work_number		= $this->runNumberCode('TRU', '\App\Models\SMD\SmdItem', array('work_mode'=>'TRU'));
				$sData->work_note		= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานแบคโฮ : '.$rowBlackHole->work_number;
				$sData->save();
				$ItemID = $sData->id;
				if( $rowProduct ){
					foreach( $rowProduct AS $r ){
						DB::table('ck_Smd_Item_2_TRU')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
					}
				}
				return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@BlackHole', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
			}
		}
		
		

		if( $ModeFrom == 'ThaSin' ){
			$sRow = \App\Models\SMD\SmdItem::find($ItemID);
			if( $sRow ){
				$rowProduct = \App\Models\SMD\SmdItem2SWP::where('ItemID', $ItemID)->get();
				
				if( $ModeTo == 'BlackHole' ){
					$sData 	= new \App\Models\SMD\SmdItem;
					$sData->SmdID					= $SmdID;
					$sData->work_mode				= 'CLM';
					$sData->work_contractor			= 'SWP';
					$sData->work_number				= $this->runNumberCode('CLM', '\App\Models\SMD\SmdItem', array('work_mode'=>'CLM'));
					$sData->HarborID				= 1;
					$sData->work_ref				= $sRow->work_number;
					$sData->work_note				= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานท่าสิน : '.$sRow->work_number;
					$sData->work_backhoe			= 1;
					$sData->work_sweep_line			= 1;
					$sData->work_bobcat				= 1;
					$sData->work_baekho_warehouse	= 0;
					$sData->save();
					$ItemID = $sData->id;
					if( $rowProduct ){
						foreach( $rowProduct AS $r ){
							DB::table('ck_Smd_Item_2_CLM')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
						}
					}
					return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@BlackHole', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
				}
				
				if( $ModeTo == 'Truck' ){
					$sData 	= new \App\Models\SMD\SmdItem;
					$sData->SmdID			= $SmdID;
					$sData->work_ref		= $sRow->work_number;
					$sData->work_mode		= 'TRU';
					$sData->work_contractor	= 'SWP';
					$sData->work_source		= '1';
					$sData->work_number		= $this->runNumberCode('TRU', '\App\Models\SMD\SmdItem', array('work_mode'=>'TRU'));
					$sData->work_note		= 'สร้างโดยการคัดลองข้อมูลมาจากใบแจ้งงานท่าสิน : '.$sRow->work_number;
					$sData->save();
					$ItemID = $sData->id;
					if( $rowProduct ){
						foreach( $rowProduct AS $r ){
							DB::table('ck_Smd_Item_2_TRU')->insert( array('SmdID'=>$SmdID, 'ItemID'=>$ItemID, 'ProductID'=>$r->ProductID, 'Weight'=>$r->Weight ));
						}
					}
					return response()->json( array_merge( array('redirect'=>action('SMD\SMDController@Truck', array($SmdID, $ItemID))), \App\Models\Alert::Msg('success')));
				}
			}
		}
		
		return response()->json(\App\Models\Alert::Msg('danger'));
	}
	
	
	
	
	
	
	
	
	
	
	
}
