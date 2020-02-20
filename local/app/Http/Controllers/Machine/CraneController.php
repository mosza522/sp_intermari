<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
class CraneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       return view('machine/indexCrane')->with(array('PageContainer'=> true) );
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
      $Crane= new  \App\Models\Machine\Crane;
      $Crane->code=$r->No_report;
      $Crane->boat_name=$r->ship_name;
      $Crane->bigboat_id=$r->bigboat;
      $Crane->size=$r->weight;
      $Crane->status=$r->status;
      $Crane->crane_id=$r->crane_no;
      $Crane->check_type=$check;
      $Crane->crane_hook=$r->crane_hook;
      $Crane->sling=$r->crane_hook;
      $Crane->sling_bass=$r->sling_bass;
      $Crane->end_corner=$r->end_corner;
      $Crane->head_crane=$r->head_crane;
      $Crane->cctv=$r->cctv;
      $Crane->cooling_panel=$r->cooling_panel;
      $Crane->leak_oli_sola=$r->leak_oli_sola;
      $Crane->leak_hydrolic=$r->leak_hydrolic;
      $Crane->clean_cooling=$r->clean_cooling;
      $Crane->grease_wire=$r->grease_wire;
      $Crane->compress_grease=$r->compress_grease;
      $Crane->oli_hydrolic=$r->oli_hydrolic;
      $Crane->oli_gear=$r->oli_gear;
      $Crane->oli_gear_corner=$r->oli_gear_corner;
      $Crane->oli_gear_bass=$r->oli_gear_bass;
      $Crane->leak_hy_pump=$r->leak_hy_pump;
      $Crane->winch_mount=$r->winch_mount;
      $Crane->greas_hand_crane=$r->greas_hand_crane;
      $Crane->position_device=$r->position_device;
      $Crane->display_mpc=$r->display_mpc;
      $Crane->control_panel=$r->control_panel;
      $Crane->lighting=$r->lighting;
      $Crane->note=$r->note;
      $Crane->created_by=Auth::user()->id;
      $Crane->created_at=\Carbon\Carbon::now();
      $Crane->updated_at=\Carbon\Carbon::now();
      $Crane->save();

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
      $sTable = \App\Models\Machine\Crane::leftjoin('ck_Master_Smd_Boat','ck_Master_Machine_Crane.bigboat_id','=','ck_Master_Smd_Boat.id')
      ->select('ck_Master_Machine_Crane.*','BoatName')
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
