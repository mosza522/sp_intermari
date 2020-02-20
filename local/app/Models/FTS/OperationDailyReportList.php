<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationDailyReportList extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Daily_Report_List';
    protected $fillable = ['ItemID', 'DailyReportID', 'Mode', 'Hatch1', 'Hatch2', 'Hatch3', 'Hatch4', 'Hatch5', 'Hatch6', 'Hatch7', 'Total'];
}