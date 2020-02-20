<?php


namespace App\Models\SMD;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SmdItem2SWPWarehouse extends Model
{
	protected $table = 'ck_Smd_Item_2_SWP_Warehouse';
	protected $fillable = ['SmdID', 'ItemID', 'WarehouseID', 'ProductID', 'Weight', 'Sweep', 'iCheck'];
}
