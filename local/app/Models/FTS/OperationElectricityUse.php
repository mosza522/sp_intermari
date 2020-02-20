<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationElectricityUse extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Electricity_Use';
    protected $fillable = ['ElectricityID', 'MachineID', 'start_at', 'finish_at', 'time_use', 'time_rebate', 'time_remain'];
}