<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationOilBuoyFuel extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Oil_Buoy_Fuel';
    protected $fillable = ['OilBuoyID', 'time_at', 'bearer', 'meter_before', 'meter_after', 'meter_amount', 'jobtype', 'jobdetail'];
}