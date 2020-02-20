<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JsonController extends Controller
{
	public function __construct(){
		
	}
		
	
	public function CLMMachine()
    {
		$Machine 	= array();
		$sRow 		= \App\Models\Master\CLM\Machine::select('id', 'MachineType', 'MachineName')
			->orderBy('MachineType','asc')->orderBy('MachineName','asc')->take(20)->get();
		if( $sRow ){
			foreach( $sRow AS $r ){
				$Machine[$r->MachineType][$r->id] = $r->MachineName;
			}
			return json_encode($Machine, true);
		}
	}
	public function BuoyMachine()
    {
		$Machine 	= array();
		$sRow 		= \App\Models\Master\Machine::where('BuoyID', request('BuoyID'))
			->select('id', 'MachineType', 'MachineName')
			->orderBy('MachineType','asc')->orderBy('MachineName','asc')->take(20)->get();
		if( $sRow ){
			foreach( $sRow AS $r ){
				$Machine[$r->MachineType][$r->id] = $r->MachineName;
			}
			return json_encode($Machine, true);
		}
	}
	
	public function BuoyStaff()
    {
		$Staff 	= array();
		$sRow 		= \App\Models\Staff\Staff::join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')->where('DepartmentID', request('DepartmentID'))
			->select('ck_Staff.id', DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'), 'PositionName')
			->orderBy('PositionName','asc')->orderBy('StaffName','asc')->take(20)->get();
		if( $sRow ){
			foreach( $sRow AS $r ){
				$Staff[$r->PositionName][$r->id] = $r->StaffName;
			}
			return json_encode($Staff, true);
		}
	}
	
	
	
	
	
	
}
