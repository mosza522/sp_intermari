<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationElectricityRebate extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Electricity_Rebate';
    protected $fillable = ['ElectricityID', 'MachineID', 'RebateNo', 'start_at', 'finish_at', 'time_use', 'Note'];
}