<?php

namespace App\Models\SWP;

use App\Models\InitModel;

class PrepareMachine extends InitModel
{
	protected $table 		= 'ck_Item_Prepare_Machine';
    protected $fillable 	= ['Division', 'ItemID', 'MachineID', 'workNote', 'InspectionType'];
	
}
