<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
class MachineConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('machine/indexMachineCondition')->with(array('PageContainer'=> true) );
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
    public function store(Request $r)
    {
      // dd($r);
      if(count($r->check)>1){
        $check=$r->check[0].','.$r->check[1];
      }else{
        $check=$r->check[0];
      }

      $machine= new  \App\Models\Machine\MachineCondition;
      $machine->bigboat_id=$r->bigboat;
      $machine->job_number=$r->job_number;
      $machine->code=$r->No_report;
      $machine->oil=$r->oil;
      $machine->oil_leak=$r->oil_leak;
      $machine->filter=$r->filter;
      $machine->pipe=$r->pipe;
      $machine->start=$r->start;
      $machine->noise=$r->noise;
      $machine->smoke=$r->smoke;
      $machine->exhaust=$r->exhaust;
      $machine->water_level=$r->water_level;
      $machine->cooling=$r->cooling;
      $machine->boiler_pipe=$r->boiler_pipe;
      $machine->boiler_lid=$r->boiler_lid;
      $machine->boiler_condition=$r->boiler_condition;
      $machine->hydro_level=$r->hydro_level;
      $machine->hydro_pipe=$r->hydro_pipe;
      $machine->hydro_leak=$r->hydro_leak;
      $machine->hydro_servo=$r->hydro_servo;
      $machine->hydro_control=$r->hydro_control;
      $machine->hydro_swingmotor=$r->hydro_swingmotor;
      $machine->heart_backhole=$r->heart_backhole;
      $machine->hydro_motor=$r->hydro_motor;
      $machine->hydro_hand_control=$r->hydro_hand_control;
      $machine->hand_control=$r->hand_control;
      $machine->hydro_noise=$r->hydro_noise;
      $machine->hydro_physical=$r->hydro_physical;
      $machine->hydro_boom=$r->hydro_boom;
      $machine->hydro_arm=$r->hydro_arm;
      $machine->hydro_bung=$r->hydro_bung;
      $machine->hydro_grease=$r->hydro_grease;
      $machine->hydro_nipple=$r->hydro_nipple;
      $machine->monitor=$r->monitor;
      $machine->heat_gauge=$r->heat_gauge;
      $machine->sola_gauge=$r->sola_gauge;
      $machine->charge_gauge=$r->charge_gauge;
      $machine->hour_mitor=$r->hour_mitor;
      $machine->wire=$r->wire;
      $machine->battery=$r->battery;
      $machine->distilled_water=$r->distilled_water;
      $machine->chain=$r->chain;
      $machine->spokket=$r->spokket;
      $machine->tire=$r->tire;
      $machine->hammer=$r->hammer;
      $machine->key_lock=$r->key_lock;
      $machine->body=$r->body;
      $machine->check_type=$check;

      $machine->machine_id=$r->machine;
      $machine->technician_id=$r->technician;
      $machine->hourMeter=$r->hour;
      $machine->status=$r->status;
      $machine->created_by=Auth::user()->id;
      $machine->created_at=\Carbon\Carbon::now();
      $machine->updated_at=\Carbon\Carbon::now();
      $machine->save();

      $prepare= \App\Models\SWP\PrepareMachine::where('id',$r->prepare_id)->first();
      $prepare->InspectionStatus='1';
      $prepare->InspectionCheck_at=\Carbon\Carbon::now();
      $prepare->save();

      $machine= \App\Models\Master\Machine::where('id',$r->machine)->first();
      $machine->MachineHourMeter=$r->hour;
      $machine->save();
      return redirect()->action('FTS\MachineController@checkInspection')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function postDatatable(Request $request){
      $sTable = \App\Models\Machine\MachineCondition::get();
      if( $request->has('Where') ){
        foreach(request('Where') AS $key => $val){
          if( $val ){
            $sTable->where($key, $val);
          }
        }
      }
      if( $request->has('Like') ){
        foreach(request('Like') AS $key => $val){
          if( $val ){
            $sTable->where($key, 'like', '%'.$val.'%');
          }
        }
      }
      $sQuery	= DataTables::of($sTable);
      return $sQuery->make(true);
    }
}
