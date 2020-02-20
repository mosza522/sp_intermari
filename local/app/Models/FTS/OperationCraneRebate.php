<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationCraneRebate extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Crane_Rebate';
    protected $fillable = ['CraneID', 'MachineID', 'RebateNo', 'start_at', 'finish_at', 'time_use', 'Note'];
}