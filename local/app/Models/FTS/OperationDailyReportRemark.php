<?php

namespace App\Models\FTS;

use Illuminate\Database\Eloquent\Model;

class OperationDailyReportRemark extends Model
{
	public $timestamps = false;
	protected $table = 'ck_Item_Fts_Operation_Daily_Report_Remark';
    protected $fillable = ['OperationID', 'DailyReportID', 'start_at', 'finish_at', 'time_note'];
}