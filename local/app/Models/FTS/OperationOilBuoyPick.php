<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationOilBuoyPick extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Oil_Buoy_Pick';
    protected $fillable = ['OilBuoyID', 'time_at', 'dispenser', 'amount'];
}