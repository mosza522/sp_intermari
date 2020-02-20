<?php

namespace App\Http\Controllers\Master\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SweepController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.FTS.sweep_index')->with(array('PageContainer'=> true));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.FTS.sweep_form')->with(array('PageContainer'=> true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\FTS\Sweep;
        $sData->SweepName	= request('SweepName');
        $sData->save();
		return redirect()->action('Master\FTS\SweepController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
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
		$sRow = \App\Models\Master\FTS\Sweep::find($id);
		return view('Master.FTS.sweep_form')->with( array('PageContainer'=> true, 'sRow'=>	$sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\FTS\Sweep::find($id);
		if( $sData ){
			$sData->SweepName	= request('SweepName');
			$sData->save();
			return redirect()->action('Master\FTS\SweepController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('Master\FTS\SweepController@index')->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		if( request('withTrashed') == 'true' ){
			\App\Models\Master\FTS\Sweep::find($id)->restore();
			return response()->json(\App\Models\Alert::Msg('success','restore'));
		}else{
			\App\Models\Master\FTS\Sweep::find($id)->delete();
			return response()->json(\App\Models\Alert::Msg('success'));
		}
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\FTS\Sweep::query();
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
		
		if( request('Sweep') ){
			$sTable->whereIn('id', explode(',', request('Sweep')));
		}
		
		$sQuery	= DataTables::of($sTable);
		return $sQuery->make(true);
	}
}
