<?php
namespace App\Http\Controllers\CLM;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareForemanController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
			$rowWarehouse = \App\Models\SMD\SmdItem::ItemSWPWarehouse($sRow);
			return View('SWP.Prepare.Foreman')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true,
						'sTitle' 		=> $sRow->work_number .' : ใบเตรียมความพร้อมโฟร์แมน'
					)
				);
		}else{
			return redirect()->action($sRow->work_mode.'\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
}
