<?php

namespace App\Http\Controllers\Master\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BuoyController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.FTS.buoy_index')->with(array('PageContainer'=> true));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.FTS.buoy_form')->with(array('PageContainer'=> true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\FTS\Buoy;
        $sData->BuoyName	= request('BuoyName');
        $sData->Staff_1		= request('Staff_1');
        $sData->Staff_2		= request('Staff_2');
        $sData->Staff_3		= request('Staff_3');
        $sData->Staff_4		= request('Staff_4');
        $sData->Staff_5		= request('Staff_5');
        $sData->Staff_6		= request('Staff_6');
        $sData->Staff_7		= request('Staff_7');
        $sData->Staff_8		= request('Staff_8');
        $sData->Staff_9		= request('Staff_9');
        $sData->save();
		return redirect()->action('Master\FTS\BuoyController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$sRow = \App\Models\Master\FTS\Buoy::find($id);
		return view('Master.FTS.buoy_form')->with( array('PageContainer'=> true, 'sRow'=>	$sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\FTS\Buoy::find($id);
		if( $sData ){;
			$sData->BuoyName	= request('BuoyName');
			$sData->Staff_1		= request('Staff_1');
			$sData->Staff_2		= request('Staff_2');
			$sData->Staff_3		= request('Staff_3');
			$sData->Staff_4		= request('Staff_4');
			$sData->Staff_5		= request('Staff_5');
			$sData->Staff_6		= request('Staff_6');
			$sData->Staff_7		= request('Staff_7');
			$sData->Staff_8		= request('Staff_8');
			$sData->Staff_9		= request('Staff_9');
			$sData->save();
			return redirect()->action('Master\FTS\BuoyController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('Master\FTS\BuoyController@index')->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		if( request('withTrashed') == 'true' ){
			\App\Models\Master\FTS\Buoy::find($id)->restore();
			return response()->json(\App\Models\Alert::Msg('success','restore'));
		}else{
			\App\Models\Master\FTS\Buoy::find($id)->delete();
			return response()->json(\App\Models\Alert::Msg('success'));
		}
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\FTS\Buoy::query();
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
