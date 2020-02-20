<?php

namespace App\Models\SMD;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SmdItem2CLM extends Model
{
	protected $table = 'ck_Smd_Item_2_CLM';
	protected $fillable = ['SmdID', 'ItemID', 'ProductID', 'Weight', 'iCheck'];
}
