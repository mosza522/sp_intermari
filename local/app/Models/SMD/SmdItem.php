<?php

namespace App\Models\SMD;

use App\Models\InitModel;

class SmdItem extends InitModel
{
	protected $table = 'ck_Smd_Item';

	public static function Smd( $ItemID ){
		$sRow = \App\Models\SMD\SmdItem::Join('ck_Smd','ck_Smd.id', 'ck_Smd_Item.SmdID')
				->leftJoin('ck_Master_Smd_Boat','ck_Master_Smd_Boat.id', 'ck_Smd.BoatID')
				->leftJoin('ck_Master_Smd_Owner','ck_Master_Smd_Owner.id', 'ck_Smd.OwnerID')
				->select(
					'ck_Smd_Item.id', 
					'ck_Smd_Item.SmdID', 
					'ck_Smd_Item.HarborID', 
					'ck_Smd_Item.work_source', 
					'ck_Smd_Item.work_destination', 
					'ck_Smd_Item.work_mode', 
					'ck_Smd_Item.work_type', 
					'ck_Smd_Item.work_number', 
					'ck_Smd_Item.work_scales', 
					'ck_Smd_Item.work_leach', 
					'ck_Smd_Item.work_leach_sweep', 
					'ck_Smd_Item.work_warehouse', 
					'ck_Smd_Item.work_pass', 
					'ck_Smd_Item.work_pass_weight', 
					'ck_Smd_Item.work_baekho_warehouse', 
					'ck_Smd_Item.work_date_issue', 
					'ck_Smd_Item.work_note', 
					'ck_Smd_Item.work_ref', 
					'ck_Smd_Item.work_contractor', 
					'ck_Smd_Item.created_at', 
					'ck_Smd_Item.work_status_swp', 
					'ck_Smd.job_unit', 
					'ck_Smd.job_weight', 
					'ck_Smd.job_date_eta', 
					'ck_Smd.job_transport', 
					'ck_Master_Smd_Boat.BoatName', 
					'ck_Master_Smd_Owner.OwnerName'
				)->find($ItemID);

		if( $sRow ){
			if( $sRow->work_mode == 'SWP' ){
				$sRow->pageHeader = 'ท่าเรือสินวัฒนา';
			}
			if( $sRow->work_mode == 'CLM' ){
				$sRow->pageHeader = 'แบคโฮ';
				$sRow->HarborName = @\App\Models\Master\SMD\Harbor::find($sRow->HarborID)->HarborName;
			}
				
			if( $sRow->work_mode == 'TRU' ){
				$sRow->pageHeader = 'รถบรรทุก';
				$sRow->SourceRouteName 		= @\App\Models\Master\SMD\Harbor::find($sRow->work_source)->HarborName;
				$sRow->DestinationRouteName = @\App\Models\Master\SMD\Harbor::find($sRow->work_destination)->HarborName;
			}
			$sRow->sPath 		= strtoupper(\Request::segment(1));
			$sRow->sDivision 	= ($sRow->sPath=='SWP')?'ท่าเรือสินวัฒนา':'ขนถ่ายสินค้าท่าเรือ';
		}
		return $sRow;
	}


	public static function Item( $sRow ){
		if( $sRow->work_mode == 'FTS' ){
			return \App\Models\SMD\Smd2Item::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
				->select('ck_Smd_2_Item.Weight', 'ck_Master_Smd_Product.ProductName')
				->where('SmdID',$sRow->SmdID)
				->get();
		}
		if( $sRow->work_mode == 'CLM' ){
			return \App\Models\SMD\SmdItem2CLM::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_Item_2_CLM.ProductID')
				->select('ck_Smd_Item_2_CLM.ProductID', 'ck_Smd_Item_2_CLM.Weight', 'ck_Master_Smd_Product.ProductName')
				->where('SmdID',$sRow->SmdID)->where('ItemID',$sRow->id)
				->get();
		}

		if( $sRow->work_mode == 'SWP' ){
			return \App\Models\SMD\SmdItem2SWP::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_Item_2_SWP.ProductID')
				->select('ck_Smd_Item_2_SWP.ProductID', 'ck_Smd_Item_2_SWP.Weight', 'ck_Master_Smd_Product.ProductName')
				->where('SmdID',$sRow->SmdID)->where('ItemID',$sRow->id)
				->get();
		}

		if( $sRow->work_mode == 'TRU' ){
			return \App\Models\SMD\SmdItem2TRU::leftJoin('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_Item_2_TRU.ProductID')
				->select('ck_Smd_Item_2_TRU.ProductID', 'ck_Smd_Item_2_TRU.Weight', 'ck_Master_Smd_Product.ProductName')
				->where('SmdID',$sRow->SmdID)->where('ItemID',$sRow->id)
				->get();
		}
		return false;
	}

	public static function ItemSWPWarehouse( $sRow ){
		if( $sRow->work_mode == 'SWP' ){
			return \App\Models\SMD\SmdItem2SWPWarehouse::leftJoin('ck_Master_Smd_Warehouse','ck_Master_Smd_Warehouse.id','=','ck_Smd_Item_2_SWP_Warehouse.WarehouseID')
				->select('ck_Smd_Item_2_SWP_Warehouse.Weight', 'ck_Smd_Item_2_SWP_Warehouse.Sweep', 'ck_Master_Smd_Warehouse.WarehouseName')
				->where('SmdID',$sRow->SmdID)->where('ItemID',$sRow->id)
				->get();
		}
		return false;
	}


}
