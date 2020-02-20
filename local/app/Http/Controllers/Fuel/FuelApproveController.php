<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
class FuelApproveController extends Controller
{
    public function postDatatable(Request $request){
      $sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->where('approve_status','!=',null)
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.updated_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Fuel_Stock.deleted_at')
      ;
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
    public function approved($id)
    {
      $stock= \App\Models\Fuel\FuelStock::find($id);
      if($stock->type=="แก้ไขน้ำมัน(เพิ่ม)" or $stock->type=="รับน้ำมัน"){
      $fuel= \App\Models\Fuel\Fuel::find($stock->tank_id);
      $fuel->balance=(($fuel->balance)+$stock->amount);
      $fuel->save();

      }
      else{
      $fuel= \App\Models\Fuel\Fuel::find($stock->tank_id);
      $fuel->balance=(($fuel->balance)-$stock->amount);
      $fuel->save();
      }
      $stock->approve_status="yes";
      $stock->save();
      return redirect('fuel/approve')->with(['RecordID' => $stock->id, 'alert'=>\App\Models\Alert::Msg('success')]);


    }
    public function notapproved($id)
    {
      $stock= \App\Models\Fuel\FuelStock::find($id);
      $stock->approve_status="no";
      $stock->save();
      return redirect('fuel/approve')->with(['RecordID' => $stock->id, 'alert'=>\App\Models\Alert::Msg('success')]);

    }

}
