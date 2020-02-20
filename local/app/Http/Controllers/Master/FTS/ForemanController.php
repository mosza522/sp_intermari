<?php

namespace App\Http\Controllers\Master\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ForemanController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.FTS.foreman_index')->with(array('PageContainer'=> true));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.FTS.foreman_form')->with(array('PageContainer'=> true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\FTS\Foreman;
		$sData->ForemanType	= request('ForemanType');
        $sData->ForemanName	= request('ForemanName');
        $sData->save();
		return redirect()->action('Master\FTS\ForemanController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
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
		$sRow = \App\Models\Master\FTS\Foreman::find($id);
		return view('Master.FTS.foreman_form')->with( array('PageContainer'=> true, 'sRow'=>	$sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\FTS\Foreman::find($id);
		if( $sData ){
			$sData->ForemanType	= request('ForemanType');
			$sData->ForemanName	= request('ForemanName');
			$sData->save();
			return redirect()->action('Master\FTS\ForemanController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('Master\FTS\ForemanController@index')->with(['alert'=>\App\Models\Alert::Msg('danger')]);
		}
	}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		if( request('withTrashed') == 'true' ){
			\App\Models\Master\FTS\Foreman::find($id)->restore();
			return response()->json(\App\Models\Alert::Msg('success','restore'));
		}else{
			\App\Models\Master\FTS\Foreman::find($id)->delete();
			return response()->json(\App\Models\Alert::Msg('success'));
		}
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\FTS\Foreman::query();
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
		
		if( request('Foreman') ){
			$sTable->whereIn('id', explode(',', request('Foreman')));
		}
		
		$sQuery	= DataTables::of($sTable);
		return $sQuery->make(true);
	}
}
