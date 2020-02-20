<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Redirect;
use Session;
use PHPExcel;
use PHPExcel_IOFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


function dayDate($date){
	
	$array = explode("-",$date);
	
	
	$day = $array[2].'-'.$array[1].'-'.$array[0];
	
	return $day;
	
}


class ImportController extends Controller
{
    public function __construct(){
		set_time_limit(1500);
		ini_set('memory_limit', '4000M');
		ini_set('max_execution_time', 1500);
    }
	
	
    public function getStaff(Request $request)
    {
		$objReader			= PHPExcel_IOFactory::createReader('Excel2007');
		$objPHPExcel		= $objReader->load( 'WorkDetail' . DIRECTORY_SEPARATOR . 'Excel' . DIRECTORY_SEPARATOR . 'Staff.xlsx' );
		$objWorksheet 		= $objPHPExcel->setActiveSheetIndex(0);
		$highestRow         = $objWorksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $objWorksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);

		for ($row = 1; $row <= $highestRow; ++ $row) {
			$StaffCode			= trim($objWorksheet->getCell('A'.$row)->getValue());
			$StaffPrefix		= trim($objWorksheet->getCell('B'.$row)->getValue());
			$StaffFirstName		= trim($objWorksheet->getCell('C'.$row)->getValue());
			$StaffLastName		= trim($objWorksheet->getCell('D'.$row)->getValue());
			$DivisionName		= trim($objWorksheet->getCell('H'.$row)->getValue());
			$DepartmentName		= trim($objWorksheet->getCell('G'.$row)->getValue());
			$PositionName		= trim($objWorksheet->getCell('E'.$row)->getValue());
			$StartingDate		= trim($objWorksheet->getCell('F'.$row)->getValue());
			
			$sRow				= \App\Models\Staff\Staff::where('StaffCode', $StaffCode)->first();
			$sDivision			= \App\Models\Staff\Division::where('DivisionName', $DivisionName)->first();
			$sDepartment		= \App\Models\Staff\Department::where('DepartmentName', $DepartmentName)->first();
			$sPosition			= \App\Models\Staff\Position::where('PositionName', $PositionName)->count();
			if( $sDivision ) 	$DivisionID		= $sDivision->id; else $DivisionID = null;
			if( $sDepartment ) 	$DepartmentID 	= $sDepartment->id; else $DepartmentID = null;
			if( !empty($sPosition) ){
				$sPosition		= \App\Models\Staff\Position::where('PositionName', $PositionName)->first();
				$PositionID		= $sPosition->id;
			}else{
				$sPos = new \App\Models\Staff\Position;
				$sPos->PositionName	= $PositionName;
				$sPos->save();
				$PositionID		= $sPos->id;
			}
			
			$sDepartment->DivisionID = $DivisionID;
			$sDepartment->save();
			
			if( !$sRow ) $sRow	= new \App\Models\Staff\Staff;
				
			$sRow->StaffCode		= $StaffCode;
			$sRow->StaffPrefix		= $StaffPrefix;
			$sRow->StaffFirstName	= $StaffFirstName;
			$sRow->StaffLastName	= $StaffLastName;
			$sRow->DivisionID		= $DivisionID;
			$sRow->DepartmentID		= $DepartmentID;
			$sRow->PositionID		= $PositionID;
			$sRow->StartingDate		= dayDate($StartingDate);
			$sRow->password			= \Hash::make('123456');
			$sRow->save();

			\App\Models\Staff\Department2Position::firstOrCreate(['DepartmentID' => $DepartmentID, 'PositionID' => $PositionID]);
			echo $StaffCode;
			echo '<br/>';
		}
	}
	
	
	
}
