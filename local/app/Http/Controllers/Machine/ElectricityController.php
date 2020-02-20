<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('machine/indexElectricity')->with(array('PageContainer'=> true) );
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
      if(count($r->check)==1) $check=$r->check[0];
      if(count($r->check)==2) $check=$r->check[0].','.$r->check[1];
      if(count($r->check)==3) $check=$r->check[0].','.$r->check[1].','.$r->check[2];
      $elec= new  \App\Models\Machine\Electricity;
      $elec->code=$r->No_report;
      $elec->boat_name=$r->ship_name;
      $elec->bigboat_id=$r->bigboat;
      $elec->type=$r->type;
      $elec->machine_no=$r->machine_no;
      $elec->size=$r->weight;
      $elec->status=$r->status;
      $elec->check_type=$check;
      $elec->mitor_before=$r->mitor_before;
      $elec->mitor_after=$r->mitor_after;
      $elec->mitor_round=$r->mitor_round;
      $elec->boiler=$r->boiler;
      $elec->engine=$r->engine;
      $elec->front_belt=$r->front_belt;
      $elec->pipe_rubber=$r->pipe_rubber;
      $elec->terminals_distilled=$r->terminals_distilled;
      $elec->check_general=$r->check_general;
      $elec->wire_controller=$r->wire_controller;
      $elec->leakage=$r->leakage;
      $elec->motor_sea=$r->motor_sea;
      $elec->leakage_water=$r->leakage_water;
      $elec->leakage_sola=$r->leakage_sola;
      $elec->engine_noise=$r->engine_noise;
      $elec->breaker=$r->breaker;
      $elec->voltage=$r->voltage;
      $elec->frequency=$r->frequency;
      $elec->heat_gauge=$r->heat_gauge;
      $elec->gauge_pressure=$r->gauge_pressure;
      $elec->ammitor=$r->ammitor;
      $elec->hour_gauge=$r->hour_gauge;
      $elec->round_gauge=$r->round_gauge;
      $elec->check_inside=$r->check_inside;
      $elec->created_by=Auth::user()->id;
      $elec->created_at=\Carbon\Carbon::now();
      $elec->updated_at=\Carbon\Carbon::now();
      $elec->note=$r->note;
      $elec->save();

      $prepare= \App\Models\SWP\PrepareMachine::where('id',$r->prepare_id)->first();
      $prepare->InspectionStatus='1';
      $prepare->InspectionCheck_at=\Carbon\Carbon::now();
      $prepare->save();

      return redirect()->action('FTS\MachineController@checkInspection')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);

      // return redirect('machine/indexElectricity')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);

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
      $sTable = \App\Models\Machine\Electricity::get();
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
