<?php

namespace App\Models\SMD;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SmdItem2SWP extends Model
{
	protected $table = 'ck_Smd_Item_2_SWP';
	protected $fillable = ['SmdID', 'ItemID', 'RebateNo', 'ProductID', 'Weight', 'iCheck'];
}
