<?php

namespace App\Models\FTS;

use App\Models\InitModel;

class Operation extends InitModel
{
	protected $table 		= 'ck_Item_Fts_Operation';
    protected $primaryKey 	= 'id';
	
	//จำนวนรายชื่อพนักงานปฏิบัติงานเรือใหญ่
	public static function PrepareStaffCount($OperationID){
		$count = \App\Models\FTS\Staff::where('workStatus', '!=', '0')->where('OperationID', $OperationID)->count();
		\App\Models\FTS\Operation::where('id', $OperationID)->update(['workStaff' => $count]);
	}
	

	public static function Main( $OperationID ){
		
		$sRow = \App\Models\FTS\Operation::Join('ck_Smd_Item','ck_Smd_Item.id', 'ck_Item_Fts_Operation.ItemID')
				->Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID', 'ck_Item_Fts_Operation.DepartmentID')
				->select(
					'ck_Item_Fts_Operation.id', 
					'ck_Item_Fts_Operation.id AS OperationID', 
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
		$sRow->Alongside = ($sRow->job_transport=='Discharge')?'Consignee':'Shipper';
		return $sRow;
	}


	public static function Item( $SmdID ){
		return \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
						->select('ck_Smd_2_Item.ProductID', 'ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')
						->where('SmdID',$SmdID)
						->get();
	}
	
}
