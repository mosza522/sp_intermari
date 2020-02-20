<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Session;
class GrabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('machine/indexGrab')->with(array('PageContainer'=> true) );
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

      (count($r->check)>1)? $check=$r->check[0].','.$r->check[1] : $check=$r->check[0];
      $grab= new  \App\Models\Machine\Grab;
      $grab->code = $r->No_report;
      $grab->boat_name = $r->ship_name;
      $grab->bigboat_id = $r->bigboat;
      $grab->type = $r->type;
      $grab->grab_id = $r->Grab_id;
      $grab->size = $r->weight;
      $grab->status = $r->status;
      $grab->check_type = $check;
      $grab->crane_hook = $r->crane_hook;
      $grab->skirt = $r->skirt;
      $grab->sling = $r->sling;
      $grab->hydrolic_shock = $r->hydrolic_shock;
      $grab->hydrolic_shock_mid = $r->hydrolic_shock_mid;
      $grab->valve_hydraulic = $r->valve_hydraulic;
      $grab->pule = $r->pule;
      $grab->reel_hook = $r->reel_hook;
      $grab->check_connect = $r->check_connect;
      $grab->check_skin = $r->check_skin;
      $grab->close_valve = $r->close_valve;
      $grab->check_wire = $r->check_wire;
      $grab->check_boot_bullet = $r->check_boot_bullet;
      $grab->check_nut = $r->check_nut;
      $grab->check_hydraulic = $r->check_hydraulic;
      $grab->check_pad = $r->check_pad;
      $grab->check_grease = $r->check_grease;
      $grab->created_by = Auth::user()->id;
      $grab->created_at = \Carbon\Carbon::now();
      $grab->updated_at = \Carbon\Carbon::now();
      $grab->note = $r->note;
      $grab->save();

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
      $sTable = \App\Models\Machine\Grab::get();
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
