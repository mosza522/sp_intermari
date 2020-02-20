<?php

namespace App\Http\Controllers\Master\SMD;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.SMD.product_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.SMD.product_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\SMD\Product;
        $sData->ProductCat		= request('ProductCat');
        //$sData->ProductCode	= request('ProductCode');
        $sData->ProductName		= request('ProductName');
        $sData->created_at		= \Carbon\Carbon::now();
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\ProductController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
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
		$sRow = \App\Models\Master\SMD\Product::find($id);
		return view('Master.SMD.product_form')->with( array('sRow'=>	$sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\SMD\Product::find($id);
        $sData->ProductCat		= request('ProductCat');
        //$sData->ProductCode	= request('ProductCode');
        $sData->ProductName		= request('ProductName');
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\ProductController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		\App\Models\Master\SMD\Product::where('id',$id)->delete();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\SMD\Product::query();
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
		$sQuery	= DataTables::of($sTable)
		->editColumn('ProductCat',function($data){
			if( $data->ProductCat == 1 ) return 'เทกอง';
			if( $data->ProductCat == 2 ) return 'เครื่องจักร';
			if( $data->ProductCat == 3 ) return 'ชิ้น';
		});
		return $sQuery->make(true);
	}
}	
