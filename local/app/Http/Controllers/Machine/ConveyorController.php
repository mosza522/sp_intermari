<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
class ConveyorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('machine/indexConveyor')->with(array('PageContainer'=> true) );
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
      if(count($r->check)==1) $check=$r->check[0];
      if(count($r->check)==2) $check=$r->check[0].','.$r->check[1];
      if(count($r->check)==3) $check=$r->check[0].','.$r->check[1].','.$r->check[2];
      $Con= new  \App\Models\Machine\Conveyor;
      $Con->code=$r->No_report;
      $Con->bigboat_name=$r->bigboat;
      $Con->boat_name=$r->boat;
      $Con->status=$r->status;
      $Con->check_type=$check;
      $Con->winch_L=$r->winch_L;
      $Con->winch_C=$r->winch_C;
      $Con->winch_R=$r->winch_R;
      $Con->spring_head=$r->spring_head;
      $Con->spring_end=$r->spring_end;
      $Con->winch_end_L=$r->winch_end_L;
      $Con->winch_end_C=$r->winch_end_C;
      $Con->winch_end_R=$r->winch_end_R;
      $Con->shockproof_around=$r->shockproof_around;
      $Con->anchor=$r->anchor;
      $Con->hoist_A=$r->hoist_A;
      $Con->hoist_B=$r->hoist_B;
      $Con->gear_swing_LR_A=$r->gear_swing_LR_A;
      $Con->gear_pull_A=$r->gear_pull_A;
      $Con->belt_BC1_A=$r->belt_BC1_A;
      $Con->belt_BC2_A=$r->belt_BC2_A;
      $Con->roller_BC1_A=$r->roller_BC1_A;
      $Con->roller_BC2_A=$r->roller_BC2_A;
      $Con->sling_wire_A=$r->sling_wire_A;
      $Con->check_sling_BC1_A=$r->check_sling_BC1_A;
      $Con->check_sling_pull_A=$r->check_sling_pull_A;
      $Con->valve_hopper_A=$r->valve_hopper_A;
      $Con->cylinder_hopper_A=$r->cylinder_hopper_A;
      $Con->grille_hopper_A=$r->grille_hopper_A;
      $Con->gear_swing_LR_B=$r->gear_swing_LR_B;
      $Con->gear_pull_B=$r->gear_pull_B;
      $Con->belt_BC1_B=$r->belt_BC1_B;
      $Con->belt_BC2_B=$r->belt_BC2_B;
      $Con->roller_BC1_B=$r->roller_BC1_B;
      $Con->roller_BC2_B=$r->roller_BC2_B;
      $Con->sling_wire_B=$r->sling_wire_B;
      $Con->check_sling_BC1_B=$r->check_sling_BC1_B;
      $Con->check_sling_pull_B=$r->check_sling_pull_B;
      $Con->valve_hopper_B=$r->valve_hopper_B;
      $Con->grille_hopper_B=$r->grille_hopper_B;
      $Con->bobcat=$r->bobcat;
      $Con->bachole=$r->bachole;
      $Con->tractor=$r->tractor;
      $Con->check_saken=$r->check_saken;
      $Con->created_by=Auth::user()->id;
      $Con->created_at=\Carbon\Carbon::now();
      $Con->updated_at=\Carbon\Carbon::now();
      $Con->note=$r->note;
      $Con->save();

      $prepare= \App\Models\SWP\PrepareMachine::where('id',$r->prepare_id)->first();
      $prepare->InspectionStatus='1';
      $prepare->InspectionCheck_at=\Carbon\Carbon::now();
      $prepare->save();

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
      $sTable = \App\Models\Machine\Conveyor::get();
      $sTable = \App\Models\Machine\Conveyor::leftjoin('ck_Master_Smd_Boat','ck_Master_Machine_Conveyor.bigboat_name','=','ck_Master_Smd_Boat.id')
      ->select('ck_Master_Machine_Conveyor.*','BoatName')
      ->get();
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
