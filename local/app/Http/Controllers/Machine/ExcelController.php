<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
class ExcelController extends Controller
{
    public function exportGrab($id)
    {
      $datas=\App\Models\Machine\Grab::leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Grab.boat_name','=','ck_Master_Fts_Buoy.id')
      ->leftJoin('ck_Master_Machine','ck_Master_Machine_Grab.grab_id','=','ck_Master_Machine.id')
      ->select('ck_Master_Machine_Grab.*','MachineName','BuoyName')
      ->where('ck_Master_Machine_Grab.id',$id)
      ->first();

      Excel::load('WorkDetail/SWP-ฝ่ายท่าสินวัฒนา/FTS - F0004 Rev.1 ใบรายงานการตรวจเช็คแกร๊ป.xlsx', function($reader) use($datas) {
        function DateThai($strDate)
      	{
      		$strYear = date("Y",strtotime($strDate))+543;
      		$strMonth= date("n",strtotime($strDate));
      		$strDay= date("j",strtotime($strDate));
      		$strHour= date("H",strtotime($strDate));
      		$strMinute= date("i",strtotime($strDate));
      		$strSeconds= date("s",strtotime($strDate));
      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      		$strMonthThai=$strMonthCut[$strMonth];
      		return "$strDay/$strMonthThai/$strYear";
      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";

      	}
          $sheet = $reader->getActiveSheet();
          $sheet->setCellValue('C3', $datas->BuoyName);
          $sheet->setCellValue('E3', $datas->MachineName);
        if($datas->type=='รีโมท'){
          $sheet->setCellValue('K3', '✓');
        }elseif($datas->type=='กระตุก'){
          $sheet->setCellValue('N3', '✓');
        }else{
          $sheet->setCellValue('Q3', '✓');
        }
          $sheet->setCellValue('U2', $datas->code);
          $sheet->setCellValue('C4', $datas->size);
        if(is_int(strpos($datas->check_type,'before'))){

          $sheet->setCellValue('H6', DateThai($datas->created_at));
          $str=Array('crane_hook','skirt','sling','hydrolic_shock','hydrolic_shock_mid','valve_hydraulic'
          ,'pule','reel_hook','check_connect','check_skin','close_valve','check_wire','check_boot_bullet',
          'check_nut','check_hydraulic','check_pad','check_grease');
          $i=8;
          foreach ($str as $key) {
            if($datas->$key=='N'){
              $sheet->setCellValue('F'.$i, '✓');
            }elseif($datas->$key=='AB'){
              $sheet->setCellValue('G'.$i, '✓');
            }elseif($datas->$key=='I/F'){
              $sheet->setCellValue('H'.$i, '✓');
            }elseif($datas->$key=='R'){
              $sheet->setCellValue('I'.$i, '✓');
            }elseif($datas->$key=='C/O'){
              $sheet->setCellValue('J'.$i, '✓');
            }
            $i++;
          }

        }
        if(is_int(strpos($datas->check_type,'after'))){
          $sheet->setCellValue('M6', DateThai($datas->created_at));
          $str=Array('crane_hook','skirt','sling','hydrolic_shock','hydrolic_shock_mid','valve_hydraulic'
          ,'pule','reel_hook','check_connect','check_skin','close_valve','check_wire','check_boot_bullet',
          'check_nut','check_hydraulic','check_pad','check_grease');
          $i=8;
          foreach ($str as $key) {
            if($datas->$key=='N'){
              $sheet->setCellValue('K'.$i, '✓');
            }elseif($datas->$key=='AB'){
              $sheet->setCellValue('L'.$i, '✓');
            }elseif($datas->$key=='I/F'){
              $sheet->setCellValue('M'.$i, '✓');
            }elseif($datas->$key=='R'){
              $sheet->setCellValue('N'.$i, '✓');
            }elseif($datas->$key=='C/O'){
              $sheet->setCellValue('O'.$i, '✓');
            }
            $i++;
          }
        }
        // else{
        //   $sheet->setCellValue('H6', DateThai($datas->created_at));
        //   $sheet->setCellValue('M6', DateThai($datas->created_at));
        //   $str=Array('crane_hook','skirt','sling','hydrolic_shock','hydrolic_shock_mid','valve_hydraulic'
        //   ,'pule','reel_hook','check_connect','check_skin','close_valve','check_wire','check_boot_bullet',
        //   'check_nut','check_hydraulic','check_pad','check_grease');
        //   $i=8;
        //   foreach ($str as $key) {
        //     if($datas->$key=='N'){
        //       $sheet->setCellValue('F'.$i, '✓');
        //     }elseif($datas->$key=='AB'){
        //       $sheet->setCellValue('G'.$i, '✓');
        //     }elseif($datas->$key=='I/F'){
        //       $sheet->setCellValue('H'.$i, '✓');
        //     }elseif($datas->$key=='R'){
        //       $sheet->setCellValue('I'.$i, '✓');
        //     }elseif($datas->$key=='C/O'){
        //       $sheet->setCellValue('J'.$i, '✓');
        //     }
        //     $i++;
        //   }
        //   $i=8;
        //   foreach ($str as $key) {
        //     if($datas->$key=='N'){
        //       $sheet->setCellValue('K'.$i, '✓');
        //     }elseif($datas->$key=='AB'){
        //       $sheet->setCellValue('L'.$i, '✓');
        //     }elseif($datas->$key=='I/F'){
        //       $sheet->setCellValue('M'.$i, '✓');
        //     }elseif($datas->$key=='R'){
        //       $sheet->setCellValue('N'.$i, '✓');
        //     }elseif($datas->$key=='C/O'){
        //       $sheet->setCellValue('O'.$i, '✓');
        //     }
        //     $i++;
        //   }
        // }
        $sheet->setCellValue('C4', $datas->size);
        $sheet->setCellValue('P14', $datas->note);


        $sheet->getStyle('H6:M6')->applyFromArray(
        array(
            'font' => array(
                'name' => 'AngsanaUPC',
                'size' => 10,
          ),
        )
    );
      })->setFilename('ReportGrab')
      // ->store('xls', storage_path('excel/exports'));
      ->export('xlsx');
      // return redirect()->back();
    }
    public function exportElectricity($id)
    {
      $datas=\App\Models\Machine\Electricity::leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Electricity.boat_name','=','ck_Master_Fts_Buoy.id')
      ->leftJoin('ck_Master_Machine','ck_Master_Machine_Electricity.machine_no','=','ck_Master_Machine.id')
      ->select('ck_Master_Machine_Electricity.*','MachineName','BuoyName')
      ->where('ck_Master_Machine_Electricity.id',$id)
      ->first();
      Excel::load('WorkDetail/SWP-ฝ่ายท่าสินวัฒนา/FTS - F0005 Rev.1 ใบตรวจเช็คเครื่องกำเนิดไฟฟ้า.xlsx', function($reader) use($datas) {
        function DateThai($strDate)
      	{
      		$strYear = date("Y",strtotime($strDate))+543;
      		$strMonth= date("n",strtotime($strDate));
      		$strDay= date("j",strtotime($strDate));
      		$strHour= date("H",strtotime($strDate));
      		$strMinute= date("i",strtotime($strDate));
      		$strSeconds= date("s",strtotime($strDate));
      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      		$strMonthThai=$strMonthCut[$strMonth];
      		return "$strDay/$strMonthThai/$strYear";
      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";

      	}
          $sheet = $reader->getActiveSheet();
        $sheet->setCellValue('C3', $datas->BuoyName);
        $sheet->setCellValue('C4', $datas->size);
        $sheet->setCellValue('H3', $datas->MachineName);
        $sheet->setCellValue('X1', $datas->code);
        if ($datas->type=='แสงสว่าง') {
        $sheet->setCellValue('V3', '✓');
        }else{
        $sheet->setCellValue('Y3', '✓');
        }
        if(is_int(strpos($datas->check_type,'before'))){
          $sheet->setCellValue('H6', DateThai($datas->created_at));
          $sheet->setCellValue('H7', $datas->mitor_before);
          $str=Array('boiler','engine','front_belt','pipe_rubber','terminals_distilled','check_general','wire_controller'
          ,'leakage','motor_sea','leakage_water','leakage_sola','engine_noise','breaker','voltage','frequency','heat_gauge','gauge_pressure','ammitor','hour_gauge'
          ,'round_gauge','check_inside');
          $i=10;
          foreach ($str as $key) {
            if($datas->$key=='N'){
              $sheet->setCellValue('F'.$i, '✓');
            }elseif($datas->$key=='AB'){
              $sheet->setCellValue('G'.$i, '✓');
            }elseif($datas->$key=='I/F'){
              $sheet->setCellValue('H'.$i, '✓');
            }elseif($datas->$key=='R'){
              $sheet->setCellValue('I'.$i, '✓');
            }elseif($datas->$key=='C/O'){
              $sheet->setCellValue('J'.$i, '✓');
            }
            $i++;
            if ($i==19) {
              $i++;
            }
            if ($i==23) {
              $i++;
            }
            if ($i==25) {
              $i++;
            }
          }
        }
        if(is_int(strpos($datas->check_type,'after'))){
          $sheet->setCellValue('M6', DateThai($datas->created_at));
          $sheet->setCellValue('M7', $datas->mitor_after);
          $str=Array('boiler','engine','front_belt','pipe_rubber','terminals_distilled','check_general','wire_controller'
          ,'leakage','motor_sea','leakage_water','leakage_sola','engine_noise','breaker','voltage','frequency','heat_gauge','gauge_pressure','ammitor','hour_gauge'
          ,'round_gauge','check_inside');
          $i=10;
          foreach ($str as $key) {
            if($datas->$key=='N'){
              $sheet->setCellValue('K'.$i, '✓');
            }elseif($datas->$key=='AB'){
              $sheet->setCellValue('L'.$i, '✓');
            }elseif($datas->$key=='I/F'){
              $sheet->setCellValue('M'.$i, '✓');
            }elseif($datas->$key=='R'){
              $sheet->setCellValue('N'.$i, '✓');
            }elseif($datas->$key=='C/O'){
              $sheet->setCellValue('O'.$i, '✓');
            }
            $i++;
            if ($i==19) {
              $i++;
            }
            if ($i==23) {
              $i++;
            }
            if ($i==25) {
              $i++;
            }
          }
        }
        if(is_int(strpos($datas->check_type,'period'))){
          $sheet->setCellValue('R6', DateThai($datas->created_at));
          $sheet->setCellValue('R7', $datas->mitor_round);

          $str=Array('boiler','engine','front_belt','pipe_rubber','terminals_distilled','check_general','wire_controller'
          ,'leakage','motor_sea','leakage_water','leakage_sola','engine_noise','breaker','voltage','frequency','heat_gauge','gauge_pressure','ammitor','hour_gauge'
          ,'round_gauge','check_inside');

          $i=10;
          foreach ($str as $key) {
            if($datas->$key=='N'){
              $sheet->setCellValue('O'.$i, '✓');
            }elseif($datas->$key=='AB'){
              $sheet->setCellValue('P'.$i, '✓');
            }elseif($datas->$key=='I/F'){
              $sheet->setCellValue('Q'.$i, '✓');
            }elseif($datas->$key=='R'){
              $sheet->setCellValue('R'.$i, '✓');
            }elseif($datas->$key=='C/O'){
              $sheet->setCellValue('S'.$i, '✓');
            }
            $i++;
            if ($i==19) {
              $i++;
            }
            if ($i==23) {
              $i++;
            }
            if ($i==25) {
              $i++;
            }
          }
        }
        // if($datas->check_type=='before,after,period'){
        //   $sheet->setCellValue('H6', DateThai($datas->created_at));
        //   $sheet->setCellValue('H7', $datas->mitor_before);
        //   $sheet->setCellValue('M6', DateThai($datas->created_at));
        //   $sheet->setCellValue('M7', $datas->mitor_after);
        //   $sheet->setCellValue('R6', DateThai($datas->created_at));
        //   $sheet->setCellValue('R7', $datas->mitor_round);
        //
        //   $str=Array('boiler','engine','front_belt','pipe_rubber','terminals_distilled','check_general','wire_controller'
        //   ,'leakage','motor_sea','leakage_water','leakage_sola','engine_noise','breaker','voltage','frequency','heat_gauge','gauge_pressure','ammitor','hour_gauge'
        //   ,'round_gauge','check_inside');
        //   $i=10;
        //   foreach ($str as $key) {
        //     if($datas->$key=='N'){
        //       $sheet->setCellValue('F'.$i, '✓');
        //     }elseif($datas->$key=='AB'){
        //       $sheet->setCellValue('G'.$i, '✓');
        //     }elseif($datas->$key=='I/F'){
        //       $sheet->setCellValue('H'.$i, '✓');
        //     }elseif($datas->$key=='R'){
        //       $sheet->setCellValue('I'.$i, '✓');
        //     }elseif($datas->$key=='C/O'){
        //       $sheet->setCellValue('J'.$i, '✓');
        //     }
        //     $i++;
        //     if ($i==19) {
        //       $i++;
        //     }
        //     if ($i==23) {
        //       $i++;
        //     }
        //     if ($i==25) {
        //       $i++;
        //     }
        //   }
        //   $i=10;
        //   foreach ($str as $key) {
        //     if($datas->$key=='N'){
        //       $sheet->setCellValue('K'.$i, '✓');
        //     }elseif($datas->$key=='AB'){
        //       $sheet->setCellValue('L'.$i, '✓');
        //     }elseif($datas->$key=='I/F'){
        //       $sheet->setCellValue('M'.$i, '✓');
        //     }elseif($datas->$key=='R'){
        //       $sheet->setCellValue('N'.$i, '✓');
        //     }elseif($datas->$key=='C/O'){
        //       $sheet->setCellValue('O'.$i, '✓');
        //     }
        //     $i++;
        //     if ($i==19) {
        //       $i++;
        //     }
        //     if ($i==23) {
        //       $i++;
        //     }
        //     if ($i==25) {
        //       $i++;
        //     }
        //   }
        //   $i=10;
        //   foreach ($str as $key) {
        //     if($datas->$key=='N'){
        //       $sheet->setCellValue('O'.$i, '✓');
        //     }elseif($datas->$key=='AB'){
        //       $sheet->setCellValue('P'.$i, '✓');
        //     }elseif($datas->$key=='I/F'){
        //       $sheet->setCellValue('Q'.$i, '✓');
        //     }elseif($datas->$key=='R'){
        //       $sheet->setCellValue('R'.$i, '✓');
        //     }elseif($datas->$key=='C/O'){
        //       $sheet->setCellValue('S'.$i, '✓');
        //     }
        //     $i++;
        //     if ($i==19) {
        //       $i++;
        //     }
        //     if ($i==23) {
        //       $i++;
        //     }
        //     if ($i==25) {
        //       $i++;
        //     }
        //   }
        // }
        $sheet->setCellValue('U9', $datas->note);
        $sheet->getStyle('H6:M6:R6')->applyFromArray(
        array(
            'font' => array(
                'name' => 'AngsanaUPC',
                'size' => 10,
          ),
        )
    );
    $sheet->getStyle('R6')->applyFromArray(
    array(
        'font' => array(
            'name' => 'AngsanaUPC',
            'size' => 10,
      ),
    )
);
    $sheet->getStyle('H3')->applyFromArray(
    array(
        'font' => array(
            'name' => 'AngsanaUPC',
            'size' => 10,
      ),
    )
);
      })->setFilename('ReportElectricity')
      ->export('xlsx');
    }
    public function exportCrane($id)
    {
      dd($id);
      $datas=\App\Models\Machine\Crane::leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Crane.boat_name','=','ck_Master_Fts_Buoy.id')
      ->leftJoin('ck_Master_Machine','ck_Master_Machine_Crane.crane_id','=','ck_Master_Machine.id')
      ->leftJoin('ck_Staff','ck_Master_Machine_Crane.created_by','=','ck_Staff.id')
      ->select('ck_Master_Machine_Crane.*','MachineName','BuoyName','StaffPrefix','StaffFirstName','StaffLastName')
      ->where('ck_Master_Machine_Crane.id',$id)
      ->first();
      Excel::load('WorkDetail/SWP-ฝ่ายท่าสินวัฒนา/FTS - F0006 Rev.1 ใบรายงานการตรวจเช็ค Crane.xlsx', function($reader) use($datas) {
        function DateThai($strDate)
      	{
      		$strYear = date("Y",strtotime($strDate))+543;
      		$strMonth= date("n",strtotime($strDate));
      		$strDay= date("j",strtotime($strDate));
      		$strHour= date("H",strtotime($strDate));
      		$strMinute= date("i",strtotime($strDate));
      		$strSeconds= date("s",strtotime($strDate));
      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      		$strMonthThai=$strMonthCut[$strMonth];
      		return "$strDay/$strMonthThai/$strYear";
      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }
        $sheet = $reader->getActiveSheet();
        $sheet->setCellValue('P1', $datas->code);
        $sheet->setCellValue('P2', DateThai($datas->created_at));
        $sheet->setCellValue('E3', $datas->MachineName);
        $sheet->setCellValue('C3', $datas->BuoyName);
        $sheet->setCellValue('C4', $datas->size);
        $sheet->setCellValue('B34', $datas->StaffPrefix.' '.$datas->StaffFirstName.' '.$datas->StaffLastName);
        if(is_int(strpos($datas->check_type,'before'))){
        $sheet->setCellValue('N3', '✓');
        }
        if(is_int(strpos($datas->check_type,'after'))){
        $sheet->setCellValue('N4', '✓');
        }
        if(is_int(strpos($datas->check_type,'period'))){
        $sheet->setCellValue('P4', '✓');
        }
        $sheet->setCellValue('k12', $datas->note);
        $str=Array('crane_hook','sling','sling_bass','end_corner','head_crane','cctv','cooling_panel','leak_oli_sola','leak_hydrolic'
        ,'clean_cooling','grease_wire','compress_grease','oli_hydrolic','oli_gear','oli_gear_corner','oli_gear_bass','leak_hy_pump'
        ,'winch_mount','greas_hand_crane','position_device','display_mpc','control_panel','lighting');

        $i=6;
        foreach ($str as $key) {
          if($datas->$key=='N'){
            $sheet->setCellValue('F'.$i, '✓');
          }elseif($datas->$key=='AB'){
            $sheet->setCellValue('G'.$i, '✓');
          }elseif($datas->$key=='I/F'){
            $sheet->setCellValue('H'.$i, '✓');
          }elseif($datas->$key=='R'){
            $sheet->setCellValue('I'.$i, '✓');
          }elseif($datas->$key=='C/O'){
            $sheet->setCellValue('j'.$i, '✓');
          }
          $i++;
          if($i==17){
            $i++;
          }
          if($i==25){
            $i++;
          }
          if($i==28){
            $i++;
          }
        }
        $sheet->getStyle('E3')->applyFromArray(
        array(
            'font' => array(
                'name' => 'AngsanaUPC',
                'size' => 10,
          ),
        )
    );

      })->setFilename('ReportCrane')
      ->export('xlsx');

    }
    public function exportConveyor($id)
    {
      $datas=\App\Models\Machine\Conveyor::leftJoin('ck_Master_Fts_Buoy','ck_Master_Machine_Conveyor.boat_name','=','ck_Master_Fts_Buoy.id')
      ->leftJoin('ck_Master_Smd_Boat','ck_Master_Machine_Conveyor.bigboat_name','=','ck_Master_Smd_Boat.id')
      ->leftJoin('ck_Staff','ck_Master_Machine_Conveyor.created_by','=','ck_Staff.id')
      ->select('ck_Master_Machine_Conveyor.*','BoatName','BuoyName','StaffPrefix','StaffFirstName','StaffLastName')
      ->where('ck_Master_Machine_Conveyor.id',$id)
      ->first();
      Excel::load('WorkDetail/SWP-ฝ่ายท่าสินวัฒนา/FTS - F0007 Rev.1 ใบรายงานการตรวจเช็คกว้านและระบบลำเลียง.xlsx', function($reader) use($datas) {
        function DateThai($strDate)
      	{
      		$strYear = date("Y",strtotime($strDate))+543;
      		$strMonth= date("n",strtotime($strDate));
      		$strDay= date("j",strtotime($strDate));
      		$strHour= date("H",strtotime($strDate));
      		$strMinute= date("i",strtotime($strDate));
      		$strSeconds= date("s",strtotime($strDate));
      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      		$strMonthThai=$strMonthCut[$strMonth];
      		return "$strDay/$strMonthThai/$strYear";
      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }
        $sheet = $reader->getActiveSheet();
        $sheet->setCellValue('V1', $datas->code);
        $sheet->setCellValue('C3', $datas->BoatName);
        $sheet->setCellValue('J3', $datas->BuoyName);
        $sheet->setCellValue('P13', $datas->note);

        if(is_int(strpos($datas->check_type,'before'))){
        $sheet->setCellValue('G5', DateThai($datas->created_at));
        $str=Array('winch_L','winch_C','winch_R','spring_head','spring_end','winch_end_L','winch_end_C','winch_end_R'
        ,'shockproof_around','anchor','hoist_A','hoist_B','gear_swing_LR_A','gear_pull_A','belt_BC1_A','belt_BC2_A'
        ,'roller_BC1_A','roller_BC2_A','sling_wire_A','check_sling_BC1_A','check_sling_pull_A','valve_hopper_A'
        ,'cylinder_hopper_A','grille_hopper_A','gear_swing_LR_B','gear_pull_B','belt_BC1_B','belt_BC2_B','roller_BC1_B','roller_BC2_B'
        ,'sling_wire_B','check_sling_BC1_B','check_sling_pull_B','valve_hopper_B','grille_hopper_B','bobcat','bachole'
        ,'tractor','check_saken');

        $i=8;
        foreach ($str as $key) {
          if($datas->$key=='N'){
            $sheet->setCellValue('F'.$i, '✓');
          }elseif($datas->$key=='AB'){
            $sheet->setCellValue('G'.$i, '✓');
          }elseif($datas->$key=='I/F'){
            $sheet->setCellValue('H'.$i, '✓');
          }elseif($datas->$key=='R'){
            $sheet->setCellValue('I'.$i, '✓');
          }elseif($datas->$key=='C/O'){
            $sheet->setCellValue('j'.$i, '✓');
          }
          $i++;
          if($i==20){
            $i+=2;
          }
          if($i==34){
            $i++;
          }
        }
        }
        if(is_int(strpos($datas->check_type,'after'))){
        $sheet->setCellValue('L5', DateThai($datas->created_at));
        $str=Array('winch_L','winch_C','winch_R','spring_head','spring_end','winch_end_L','winch_end_C','winch_end_R'
        ,'shockproof_around','anchor','hoist_A','hoist_B','gear_swing_LR_A','gear_pull_A','belt_BC1_A','belt_BC2_A'
        ,'roller_BC1_A','roller_BC2_A','sling_wire_A','check_sling_BC1_A','check_sling_pull_A','valve_hopper_A'
        ,'cylinder_hopper_A','grille_hopper_A','gear_swing_LR_B','gear_pull_B','belt_BC1_B','belt_BC2_B','roller_BC1_B','roller_BC2_B'
        ,'sling_wire_B','check_sling_BC1_B','check_sling_pull_B','valve_hopper_B','grille_hopper_B','bobcat','bachole'
        ,'tractor','check_saken');

        $i=8;
        foreach ($str as $key) {
          if($datas->$key=='N'){
            $sheet->setCellValue('K'.$i, '✓');
          }elseif($datas->$key=='AB'){
            $sheet->setCellValue('L'.$i, '✓');
          }elseif($datas->$key=='I/F'){
            $sheet->setCellValue('M'.$i, '✓');
          }elseif($datas->$key=='R'){
            $sheet->setCellValue('N'.$i, '✓');
          }elseif($datas->$key=='C/O'){
            $sheet->setCellValue('O'.$i, '✓');
          }
          $i++;
          if($i==20){
            $i+=2;
          }
          if($i==34){
            $i++;
          }
        }
        }
        $sheet->setCellValue('A51', $datas->StaffPrefix.' '.$datas->StaffFirstName.' '.$datas->StaffLastName);



      })->setFilename('ReportConveyor')
      ->export('xlsx');

    }
    public function exportMachineCondition($id)
    {
      $datas=\App\Models\Machine\MachineCondition::leftJoin('ck_Master_Machine','ck_Master_Machine_MachineCondition.machine_id','=','ck_Master_Machine.id')
      ->leftJoin('ck_Staff','ck_Master_Machine_MachineCondition.technician_id','=','ck_Staff.id')
      ->select('ck_Master_Machine_MachineCondition.*','MachineName','StaffPrefix','StaffFirstName','StaffLastName')
      ->where('ck_Master_Machine_MachineCondition.id',$id)
      ->first();
      $staff=\App\Models\Machine\MachineCondition::leftJoin('ck_Staff','ck_Master_Machine_MachineCondition.created_by','=','ck_Staff.id')
      ->where('ck_Master_Machine_MachineCondition.id',$id)
      ->select('StaffPrefix','StaffFirstName','StaffLastName')
      ->first();
      Excel::load('WorkDetail/SWP-ฝ่ายท่าสินวัฒนา/ใบตรวจเช็คสภาพเครื่องจักร.xlsx', function($reader) use($datas,$staff) {
        function DateThai($strDate)
      	{
      		$strYear = date("Y",strtotime($strDate))+543;
      		$strMonth= date("n",strtotime($strDate));
      		$strDay= date("j",strtotime($strDate));
      		$strHour= date("H",strtotime($strDate));
      		$strMinute= date("i",strtotime($strDate));
      		$strSeconds= date("s",strtotime($strDate));
      		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
      		$strMonthThai=$strMonthCut[$strMonth];
      		return "$strDay/$strMonthThai/$strYear";
      		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }
        $sheet = $reader->getActiveSheet();
        if(is_int(strpos($datas->check_type,'before'))){
          $sheet->setCellValue('F3', '✓');
        }
        if(is_int(strpos($datas->check_type,'after'))){
          $sheet->setCellValue('I3', '✓');
        }
        $sheet->setCellValue('N3', DateThai($datas->created_at));
        $sheet->setCellValue('T3', $datas->StaffPrefix.' '.$datas->StaffFirstName.' '.$datas->StaffLastName);
        $sheet->setCellValue('F5', $datas->MachineName);
        $sheet->setCellValue('N5', $datas->hourMeter);
        $sheet->setCellValue('T5', $staff->StaffPrefix.' '.$staff->StaffFirstName.' '.$staff->StaffLastName);
        $sheet->setCellValue('H22', $datas->smoke);
        $str=Array('oil','oil_leak','filter','pipe','start','noise','exhaust','water_level','cooling','boiler_pipe'
        ,'boiler_lid','boiler_condition','hydro_level','hydro_pipe','hydro_leak','hydro_servo','hydro_control','hydro_swingmotor'
        ,'heart_backhole','hydro_motor','hydro_hand_control','hand_control','hydro_noise','hydro_physical','hydro_boom','hydro_arm'
        ,'hydro_bung','hydro_grease','hydro_nipple','monitor','heat_gauge','sola_gauge','charge_gauge','hour_mitor'
        ,'wire','battery','distilled_water','chain','spokket','tire','hammer','key_lock','body');
        $check=Array('ขาด','ไม่มี','ไม่ดี','หนัก','ยาก','ชำรุด');
        $check2=Array('มี','ปกติ','ดี','เบา','ง่าย');
        $char=Array('G','I','Q','S','Y','AA');
        $i=10;
        $round=1;
        foreach ($str as $key) {
          foreach ($check2 as $key_check2) {
            if($datas->$key==$key_check2){
              if($round==1){
              $sheet->setCellValue('G'.$i, '✓');
              $i+=2;
            if($i==22 ){
                $i+=2;
              }
            else if($i==26 ){
              $i=30;
            }
            else if($i==40 ){
            $round++;
            $i=10;
            break;
          }
          }
          if($round==2){
            $sheet->setCellValue('Q'.$i, '✓');
            $i+=2;
            if($i==44){
              $round++;
              $i=10;
              break;
            }
          }
          if($round==3){
            $sheet->setCellValue('Y'.$i, '✓');
            $i+=2;
            if($i==26){
              $i=30;
            }
          }
              }
          }

          foreach ($check as $key_check) {

            if($datas->$key==$key_check){

              if($round==1){
                $sheet->setCellValue('I'.$i, '✓');
                $i+=2;
                if($i==22 ){
                  $i+=2;
                }
                if($i==26 ){
                $i=30;
              }
              if($i==40 ){
              $round++;
              $i=10;
              break;
            }


          }
          if($round==2){

            $sheet->setCellValue('S'.$i, '✓');
            $i+=2;
            if($i==44){
              $round++;
              $i=10;
              break;
            }

          }
          if($round==3){
            $sheet->setCellValue('AA'.$i, '✓');
            $i+=2;
            if($i==26){
              $i=30;
            }
          }
            }
          }
        }


      })->setFilename('ReportMachineCondition')
      ->export('xlsx');
    }
}
