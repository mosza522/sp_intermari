<?php

namespace App\Http\Controllers\machine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function grab()
     {
      return view('machine/grab')->with(array('PageContainer'=> true) );
     }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $prepare= \App\Models\SWP\PrepareMachine::where('id',$id)->first();
      if($prepare->InspectionCode=="" AND $prepare->InspectionStatus=="0"){
        $prepare->InspectionCode=$this->runNumberCode('M','App\Models\SWP\PrepareMachine',NULL,'InspectionCode','InspectionCheck_at');
        $prepare->save();
      }
// $this->runNumberCode('M','App\Models\SWP\PrepareMachine',NULL,'InspectionCode','InspectionCheck_at');


      $machine=\App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
  					->Join('ck_Smd_Item', 'ck_Smd_Item.id', '=', 'ck_Item_Prepare_Machine.ItemID')
            ->Join('ck_Smd', 'ck_Smd.id', '=', 'ck_Smd_Item.SmdID')
            ->Join('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Smd.BoatID')
  					->select('ck_Item_Prepare_Machine.id','ck_Master_Machine.id as machine_id' ,'MachineType', 'MachineName', 'work_number', 'InspectionCode', 'InspectionStatus', 'InspectionType', 'ck_Item_Prepare_Machine.created_at','ck_Master_Smd_Boat.id as boat_id','ck_Master_Smd_Boat.BoatName as boat_name')
  					->where('ck_Item_Prepare_Machine.id',$id)
  					->first();
      // dd($machine);

      switch ($machine->MachineType) {
        case 'Grab':
          return view('Machine.grab')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
          break;
          case 'Crane':
            return view('Machine.crane')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
            break;
          case 'Gennerrator':
            return view('Machine.electricity')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
            break;
          case 'BobCat':
            return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
            break;
          case 'Tractor':
            return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
            break;
          case 'BackHoe':
            return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id));
            break;

      }
}
public function showApprove($id)
{
  $prepare= \App\Models\SWP\PrepareMachine::where('id',$id)->first();
  if($prepare->InspectionCode=="" AND $prepare->InspectionStatus=="0"){
    $prepare->InspectionCode=$this->runNumberCode('M','App\Models\SWP\PrepareMachine',NULL,'InspectionCode','InspectionCheck_at');
    $prepare->save();
  }
// $this->runNumberCode('M','App\Models\SWP\PrepareMachine',NULL,'InspectionCode','InspectionCheck_at');


  $machine=\App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
        ->Join('ck_Smd_Item', 'ck_Smd_Item.id', '=', 'ck_Item_Prepare_Machine.ItemID')
        ->Join('ck_Smd', 'ck_Smd.id', '=', 'ck_Smd_Item.SmdID')
        ->Join('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Smd.BoatID')
        ->select('ck_Item_Prepare_Machine.id','ck_Master_Machine.id as machine_id' ,'MachineType', 'MachineName', 'work_number', 'InspectionCode', 'InspectionStatus', 'InspectionType', 'ck_Item_Prepare_Machine.created_at','ck_Master_Smd_Boat.id as boat_id','ck_Master_Smd_Boat.BoatName as boat_name')
        ->where('ck_Item_Prepare_Machine.id',$id)
        ->first();
  // dd($machine);

  switch ($machine->MachineType) {
    case 'Grab':
      return view('Machine.grab')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
      break;
      case 'Crane':
        return view('Machine.crane')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
        break;
      case 'Gennerrator':
        return view('Machine.electricity')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
        break;
      case 'BobCat':
        return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
        break;
      case 'Tractor':
        return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
        break;
      case 'BackHoe':
        return view('Machine.machineCondition')->with(array('id'=>$machine->machine_id,'code_no'=>$machine->InspectionCode,'work_number'=>$machine->work_number,'InspectionType'=>$machine->InspectionType,'boat_id'=>$machine->boat_id,'boat_name'=>$machine->boat_name,'prepare_id'=>$id,'check_approve'=>'1'));
        break;

  }
}
public function approve($code,$id)
{
  $prepare= \App\Models\SWP\PrepareMachine::leftjoin('ck_Master_Machine','ck_Item_Prepare_Machine.MachineID','=','ck_Master_Machine.id')
  ->select('ck_Item_Prepare_Machine.*','MachineType')
  ->where('InspectionCode',$code)
  ->where('MachineID',$id)
  ->first();
  $prepare->InspectionStatus='2';
  $prepare->InspectionApprove_at=\Carbon\Carbon::now();
  $prepare->save();
  switch ($prepare->MachineType) {
    case 'Grab':
    $datas=\App\Models\Machine\Grab::where('code',$code)
    ->first();
    break;
      case 'Crane':
      $datas=\App\Models\Machine\Crane::where('code',$code)
      ->first();
      break;
      case 'Gennerrator':
      $datas=\App\Models\Machine\Electricity::where('code',$code)
      ->first();
      break;
      case 'BobCat':
      $datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;
      case 'Tractor':
      $datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;
      case 'BackHoe':
      $datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;

  }

  $datas->approve_status='1';
  $datas->save();
  return redirect()->action('FTS\MachineController@approveInspection')->with(['RecordID' => $prepare->id,'alert'=>\App\Models\Alert::Msg('success')]);

}
public function notapprove($code,$id)
{
  $prepare= \App\Models\SWP\PrepareMachine::leftjoin('ck_Master_Machine','ck_Item_Prepare_Machine.MachineID','=','ck_Master_Machine.id')
  ->select('ck_Item_Prepare_Machine.*','MachineType')
  ->where('InspectionCode',$code)
  ->where('MachineID',$id)
  ->first();

  $prepare->InspectionStatus='2';
  $prepare->InspectionApprove_at=\Carbon\Carbon::now();
  $prepare->save();

  switch ($prepare->MachineType) {
    case 'Grab':
    $datas=\App\Models\Machine\Grab::where('code',$code)
    ->first();
    break;
      case 'Crane':
      $datas=\App\Models\Machine\Crane::where('code',$code)
      ->first();
      break;
      case 'Gennerrator':$datas=\App\Models\Machine\Electricity::where('code',$code)
      ->first();
      break;
      case 'BobCat':$datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;
      case 'Tractor':$datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;
      case 'BackHoe':$datas=\App\Models\Machine\MachineCondition::where('code',$code)
      ->first();
      break;

  }
  $datas->approve_status='0';
  $datas->save();
  return redirect()->action('FTS\MachineController@approveInspection')->with(['RecordID' => $prepare->id,'alert'=>\App\Models\Alert::Msg('success')]);

}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
