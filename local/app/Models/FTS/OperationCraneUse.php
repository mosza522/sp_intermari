<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationCraneUse extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Crane_Use';
    protected $fillable = ['CraneID', 'MachineID', 'start_at', 'finish_at', 'time_use', 'time_rebate', 'time_remain'];
}