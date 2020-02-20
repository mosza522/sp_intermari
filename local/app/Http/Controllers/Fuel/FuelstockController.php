<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FuelstockController extends Controller
{
    public function __construct(){

    }
    public function indexReceive()
    {
      return view('Fuel.receive')->with(array('PageContainer'=> true) );
    }
    public function receiveForm()
    {
      return view('Fuel.formstock')->with(array('PageContainer'=> true,'type'=>'receive'));
    }
    public function indexCompany()
    {
      return view('Fuel.company')->with(array('PageContainer'=> true) );
    }
    public function companyForm()
    {
      return view('Fuel.formstock')->with(array('PageContainer'=> true,'type'=>'forcompany'));
    }
    public function indexJob()
    {
      return view('Fuel.job')->with(array('PageContainer'=> true) );
    }
    public function jobForm()
    {
      return view('Fuel.formstock')->with(array('PageContainer'=> true,'type'=>'forwork'));
    }
    public function indexBoats()
    {
      return view('Fuel.boats')->with(array('PageContainer'=> true) );
    }
    public function boatsForm()
    {
      return view('Fuel.formstock')->with(array('PageContainer'=> true,'type'=>'forboat'));
    }
    public function indexSell()
    {
      return view('Fuel.sell')->with(array('PageContainer'=> true) );
    }
    public function sellForm()
    {
      return view('Fuel.formstock')->with(array('PageContainer'=> true,'type'=>'sell'));
    }
    public function indexApprove()
    {
      return view('Fuel.approve')->with(array('PageContainer'=> true) );
    }
    public function createForboat(Request $r)
    {
      // $rand=rand(0,99999);
      // if(strlen($rand)==1){
      //   $rand="0000".$rand;
      // }
      // elseif(strlen($rand)==2) {
      //   $rand="000".$rand;
      // }
      // elseif(strlen($rand)==3) {
      //   $rand="00".$rand;
      // }
      // elseif(strlen($rand)==4) {
      //   $rand="0".$rand;
      // }
      // $tank = \App\Models\Fuel\Fuel::where('id',$r->tank)->first();
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->code=$r->No_report;
      $stock->type="จ่ายน้ำมันเรือยนต์";
      $stock->boat_id=$r->boat;
      $stock->objective=$r->object;
      $stock->tank_id=$r->tank;
      $stock->staff_id=$r->staff;
      $stock->amount=$r->amount;
      // $stock->balance=$tank->balance;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();

      return redirect()->action('Fuel\FuelstockController@indexBoats')->with(['alert'=>\App\Models\Alert::Msg('success')]);

    }
    public function createReceive(Request $r)
    {
      // $tank = \App\Models\Fuel\Fuel::where('id',$r->tank)->first();
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->code=$r->No_report;
      $stock->type="รับน้ำมัน";
      $stock->tank_id=$r->tank;
      $stock->amount=$r->amount;
      // $stock->balance=$tank->balance;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();
      return redirect()->action('Fuel\FuelstockController@indexReceive')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);

    }
    public function createForwork(Request $r)
    {
      // $tank = \App\Models\Fuel\Fuel::where('id',$r->tank)->first();
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->code=$r->No_report;
      $stock->type="จ่ายน้ำมันในงาน";
      $stock->work_no=$r->job_number;
      $stock->machine_id=$r->machine;
      $stock->objective=$r->object;
      $stock->tank_id=$r->tank;
      $stock->staff_id=$r->staff;
      $stock->amount=$r->amount;
      // $stock->balance=$tank->balance;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();

      return redirect()->action('Fuel\FuelstockController@indexJob')->with(['alert'=>\App\Models\Alert::Msg('success')]);
    }
    public function createForcompany(Request $r)
    {
      // $tank = \App\Models\Fuel\Fuel::where('id',$r->tank)->first();
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->code=$r->No_report;
      $stock->type="จ่ายน้ำมันในบริษัท";
      $stock->machine_id=$r->machine;
      $stock->objective=$r->object;
      $stock->tank_id=$r->tank;
      $stock->staff_id=$r->staff;
      $stock->amount=$r->amount;
      // $stock->balance=$tank->balance;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();

      return redirect()->action('Fuel\FuelstockController@indexCompany')->with(['alert'=>\App\Models\Alert::Msg('success')]);
    }
    public function createForsell(Request $r)
    {
      // $tank = \App\Models\Fuel\Fuel::where('id',$r->tank)->first();
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->code=$r->No_report;
      $stock->type="ขายน้ำมัน";
      $stock->price_liter=$r->price;
      $stock->amount_price=$r->total_price;
      $stock->amount=$r->amount;
      $stock->tank_id=$r->tank;
      $stock->customer=$r->customer;
      $stock->tell=$r->tell;
      $stock->payment_type=$r->pay_type;
      // $stock->balance=$tank->balance;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();

      return redirect()->action('Fuel\FuelstockController@indexSell')->with(['alert'=>\App\Models\Alert::Msg('success')]);
    }
    public function postDatatableReceive(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','รับน้ำมัน')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('id');
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
    public function postDatatableCompany(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->leftJoin('ck_Master_Machine','ck_Master_Machine.id','=','ck_Master_Fuel_Stock.machine_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Machine.MachineName','ck_Master_Fuel.balance','ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','จ่ายน้ำมันในบริษัท')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('id');
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
    public function postDatatableJob(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->leftJoin('ck_Master_Machine','ck_Master_Machine.id','=','ck_Master_Fuel_Stock.machine_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Machine.MachineName','ck_Master_Fuel.balance'
      ,'ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','จ่ายน้ำมันในงาน')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('id');
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
    public function postDatatableBoats(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->leftJoin('ck_Master_Smd_Boat', 'ck_Master_Smd_Boat.id', '=', 'ck_Master_Fuel_Stock.boat_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Smd_Boat.BoatName','ck_Master_Fuel.balance'
      ,'ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','จ่ายน้ำมันเรือยนต์')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('id');
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
    public function postDatatableSell(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Fuel.balance','ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','ขายน้ำมัน')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('id');
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
    public function postDatatableEditFuel(Request $request){
  		$sTable = \App\Models\Fuel\FuelStock::leftJoin('ck_Master_Fuel', 'ck_Master_Fuel.id', '=', 'ck_Master_Fuel_Stock.tank_id')
      ->select('ck_Master_Fuel_Stock.id','code','ck_Master_Fuel.name','amount','ck_Master_Fuel_Stock.type as typeStock',
      'ck_Master_Fuel_Stock.created_at','ck_Master_Fuel_Stock.approve_status','ck_Master_Fuel.balance','ck_Master_Fuel_Stock.deleted_at')
      ->where('ck_Master_Fuel_Stock.type','LIKE','%แก้ไขน้ำมัน%')
      ->where('ck_Master_Fuel_Stock.approve_status',NULL)
      ->orderBy('ck_Master_Fuel_Stock.created_at','DESC');
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
    public function AddFuel(Request $r)
    {
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->type="แก้ไขน้ำมัน(เพิ่ม)";
      $stock->amount=$r->AddAmout;
      $stock->tank_id=$r->id;
      $stock->staff_id=$r->staff;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();
      return redirect()->action('Fuel\FuelController@indexBalance')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);
    }
    public function ReduceFuel(Request $r)
    {
      $stock= new \App\Models\Fuel\FuelStock;
      $stock->type="แก้ไขน้ำมัน(ลด)";
      $stock->amount=$r->ReduceAmout;
      $stock->tank_id=$r->id;
      $stock->staff_id=$r->staff;
      $stock->created_at=\Carbon\Carbon::now();
      $stock->created_by=Auth::user()->id;
      $stock->save();
      return redirect()->action('Fuel\FuelController@indexBalance')->with(['RecordID' => $r->id,'alert'=>\App\Models\Alert::Msg('success')]);

    }
    // public function del($type,$id)
    // {
    // $stock= \App\Models\Fuel\FuelStock::find($id);
    // $stock->deleted_at=\Carbon\Carbon::now();
    // $stock->updated_at=\Carbon\Carbon::now();
    // $stock->updated_by=Auth::user()->id;
    // $stock->save();
    // return redirect()->back()->with([ 'alert'=>\App\Models\Alert::Msg('success')]);
    // }
    public function destroy($type,$id)
    {
      \App\Models\Fuel\FuelStock::where('id',$id)->delete();
      return redirect()->back()->with(['alert'=>\App\Models\Alert::Msg('success')]);

    }
    public function approve($type,$id,$reduceOrAdd)
    {
      if($type=='receive' or $reduceOrAdd=='add'){
        $stock= \App\Models\Fuel\FuelStock::find($id);
        $stock->approve_status='อนุมัติ';
        $fuel=\App\Models\Fuel\Fuel::find($stock->tank_id);

        $stock->updated_by=Auth::user()->id;
        $stock->balance_before=$fuel->balance;
        $stock->balance_after=$fuel->balance+$stock->amount;
        $fuel->balance=$fuel->balance+$stock->amount;
        $fuel->save();
        $stock->save();
        return redirect()->back()->with(['RecordID' => $id,'alert'=>\App\Models\Alert::Msg('success')]);

      }
      else{
        $stock= \App\Models\Fuel\FuelStock::find($id);
        $stock->approve_status='อนุมัติ';
        $fuel=\App\Models\Fuel\Fuel::find($stock->tank_id);
        $stock->updated_by=Auth::user()->id;
        $stock->balance_before=$fuel->balance;
        $stock->balance_after=$fuel->balance-$stock->amount;
        $fuel->balance=$fuel->balance-$stock->amount;
        $fuel->save();
        $stock->save();
        return redirect()->back()->with(['RecordID' => $id,'alert'=>\App\Models\Alert::Msg('success')]);

      }
    }
    public function notapprove($type,$id)
    {
      $stock= \App\Models\Fuel\FuelStock::find($id);
      $stock->approve_status='ไม่อนุมัติ';
      $stock->updated_by=Auth::user()->id;
      $stock->save();

      return redirect()->back()->with(['RecordID' => $id,'alert'=>\App\Models\Alert::Msg('success')]);
    }




}
