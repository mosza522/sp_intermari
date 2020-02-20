<?php

namespace App\Models\CLM;

use App\Models\InitModel;

class PrepareMachine extends InitModel
{
	protected $table 		= 'ck_Item_Clm_Prepare_Machine';
    protected $fillable 	= ['ItemID', 'BuoyID', 'MachineID', 'workNote'];
	
}
