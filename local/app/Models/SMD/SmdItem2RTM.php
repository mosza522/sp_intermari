<?php

namespace App\Models\SMD;

use App\Models\InitModel;

class SmdItem2RTM extends InitModel
{
	protected $table = 'ck_Smd_Item_2_RTM';
    protected $fillable = ['SmdID', 'ItemID', 'ProductID', 'DateIssue', 'DateArrive', 'Weight', 'iCheck'];
}