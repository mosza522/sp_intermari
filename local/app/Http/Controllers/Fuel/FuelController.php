<?php
namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
class FuelController extends Controller
{
  public function __construct(){

  }
  public function indexBalance()
  {
    return view('Fuel.index')->with(array('PageContainer'=> true));
  }

  public function create(Request $r)
  {
    $fuel= new \App\Models\Fuel\Fuel;
    $fuel->name=$r->name;
    $fuel->balance=$r->balance;
    $fuel->created_at=\Carbon\Carbon::now();
    $fuel->created_by=Auth::user()->id;
    $fuel->updated_at=\Carbon\Carbon::now();
    $fuel->save();
    return redirect()->action('Fuel\FuelController@indexBalance')->with(['alert'=>\App\Models\Alert::Msg('success')]);
  }
  public function postDatatable(Request $request){
		$sTable = \App\Models\Fuel\Fuel::where('deleted_at',null)->get();

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
  public function edit($id)
  {
    return view('Fuel.form')->with(array('id'=>$id) );
  }
  public function update(Request $r)
  {
    $fuel= \App\Models\Fuel\Fuel::find($r->id);
    $fuel->name=$r->name;
    $fuel->type=$r->type;
    $fuel->updated_at=\Carbon\Carbon::now();
    $fuel->updated_by=Auth::user()->id;
    $fuel->save();
    return redirect()->action('Fuel\FuelController@indexBalance')->with(['RecordID' => $fuel->id, 'alert'=>\App\Models\Alert::Msg('success')]);
  }
  public function del($id)
  {
  $fuel= \App\Models\Fuel\Fuel::find($id);
  $fuel->deleted_at=\Carbon\Carbon::now();
  $fuel->updated_at=\Carbon\Carbon::now();
  $fuel->updated_by=Auth::user()->id;
  $fuel->save();
  return redirect()->action('Fuel\FuelController@indexBalance')->with(['RecordID' => $fuel->id, 'alert'=>\App\Models\Alert::Msg('success')]);
  }
  public function checkFuel(Request $r)
  {
    $fuel= \App\Models\Fuel\Fuel::find($r->id);

    $price=0;

    $arr=[
      'balance'=>$fuel->balance,
      'type'=>$fuel->type,
    ];
    echo json_encode($arr);
  }
}
