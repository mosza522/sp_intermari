<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationDailyReportStop extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Daily_Report_Stop';
    protected $fillable = ['OperationID', 'DailyReportID', 'start_at', 'finish_at', 'time_use', 'time_note'];
}