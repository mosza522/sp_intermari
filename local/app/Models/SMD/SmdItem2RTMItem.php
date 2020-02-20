<?php

namespace App\Models\SMD;

use App\Models\InitModel;

class SmdItem2RTMItem extends InitModel
{
	protected $table = 'ck_Smd_Item_2_RTM_Item';
    protected $fillable = ['SmdID', 'ItemID', 'ProductID', 'CustomerID', 'Weight', 'iCheck'];
}
