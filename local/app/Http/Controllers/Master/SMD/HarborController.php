<?php

namespace App\Http\Controllers\Master\SMD;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HarborController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.SMD.harbor_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.SMD.harbor_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\SMD\Harbor;
        //$sData->HarborCode	= request('HarborCode');
        $sData->HarborName		= request('HarborName');
        $sData->HarborZone		= request('HarborZone');
        $sData->created_at		= \Carbon\Carbon::now();
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\HarborController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
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
		$sRow = \App\Models\Master\SMD\Harbor::find($id);
		return view('Master.SMD.harbor_form')->with( array('sRow'=>	$sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\SMD\Harbor::find($id);
        //$sData->HarborCode	= request('HarborCode');
        $sData->HarborName		= request('HarborName');
        $sData->HarborZone		= request('HarborZone');
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\HarborController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		\App\Models\Master\SMD\Harbor::where('id',$id)->delete();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\SMD\Harbor::query();
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
