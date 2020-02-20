<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationOilBackhoeUse extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Oil_Backhoe_Item';
    protected $fillable = ['OilBackhoeID', 'MachineID', 'level_start', 'volume_start', 'meter_start', 'oil_fill', 'level_end', 'volume_end', 'meter_end', 'oil_use', 'hour_use', 'average_use'];
}