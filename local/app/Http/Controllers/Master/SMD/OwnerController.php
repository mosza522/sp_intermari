<?php

namespace App\Http\Controllers\Master\SMD;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OwnerController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		return View('Master.SMD.owner_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('Master.SMD.owner_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sData = new \App\Models\Master\SMD\Owner;
		$sData->OwnerCode		= request('OwnerCode');
		$sData->OwnerName		= request('OwnerName');
		$sData->OwnerNameBill	= request('OwnerNameBill');
		$sData->OwnerNameEng	= request('OwnerNameEng');
		$sData->OwnerShortName	= request('OwnerShortName');
		$sData->OwnerAddress20	= request('OwnerAddress20');
		$sData->OwnerRoad20		= request('OwnerRoad20');
		$sData->OwnerTambon20	= request('OwnerTambon20');
		$sData->OwnerAmphoe20	= request('OwnerAmphoe20');
		$sData->OwnerProvince20	= request('OwnerProvince20');
		$sData->OwnerPostCode20	= request('OwnerPostCode20');
		$sData->OwnerAddress	= request('OwnerAddress');
		$sData->OwnerRoad		= request('OwnerRoad');
		$sData->OwnerTambon		= request('OwnerTambon');
		$sData->OwnerAmphoe		= request('OwnerAmphoe');
		$sData->OwnerProvince	= request('OwnerProvince');
		$sData->OwnerPostCode	= request('OwnerPostCode');
		$sData->OwnerTel		= request('OwnerTel');
		$sData->OwnerFax		= request('OwnerFax');
		$sData->OwnerMail		= request('OwnerMail');
		$sData->OwnerHomepage	= request('OwnerHomepage');
		$sData->OwnerDate		= empty(request('OwnerDate'))?NULL:date('Y-m-d', strtotime(request('OwnerDate')));
		$sData->OwenrIDcard		= request('OwenrIDcard');
		$sData->OwenrTax		= request('OwenrTax');
		$sData->OwenrBranch		= request('OwenrBranch');
		$sData->OwenrCreditLimit= str_replace(',','',request('OwenrCreditLimit'));
		$sData->OwenrDay		= request('OwenrDay');
        $sData->created_at		= \Carbon\Carbon::now();
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\OwnerController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		$sRow = \App\Models\Master\SMD\Owner::find($id);
		return view('Master.SMD.owner_form')->with( array('sRow'=>	$sRow, 'sShow'=> true) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$sRow = \App\Models\Master\SMD\Owner::find($id);
		return view('Master.SMD.owner_form')->with( array('sRow'=>	$sRow, 'sShow'=> false) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$sData = \App\Models\Master\SMD\Owner::find($id);
		$sData->OwnerCode		= request('OwnerCode');
		$sData->OwnerName		= request('OwnerName');
		$sData->OwnerNameBill	= request('OwnerNameBill');
		$sData->OwnerNameEng	= request('OwnerNameEng');
		$sData->OwnerShortName	= request('OwnerShortName');
		$sData->OwnerAddress20	= request('OwnerAddress20');
		$sData->OwnerRoad20		= request('OwnerRoad20');
		$sData->OwnerTambon20	= request('OwnerTambon20');
		$sData->OwnerAmphoe20	= request('OwnerAmphoe20');
		$sData->OwnerProvince20	= request('OwnerProvince20');
		$sData->OwnerPostCode20	= request('OwnerPostCode20');
		$sData->OwnerAddress	= request('OwnerAddress');
		$sData->OwnerRoad		= request('OwnerRoad');
		$sData->OwnerTambon		= request('OwnerTambon');
		$sData->OwnerAmphoe		= request('OwnerAmphoe');
		$sData->OwnerProvince	= request('OwnerProvince');
		$sData->OwnerPostCode	= request('OwnerPostCode');
		$sData->OwnerTel		= request('OwnerTel');
		$sData->OwnerFax		= request('OwnerFax');
		$sData->OwnerMail		= request('OwnerMail');
		$sData->OwnerHomepage	= request('OwnerHomepage');
		$sData->OwnerDate		= empty(request('OwnerDate'))?NULL:date('Y-m-d', strtotime(request('OwnerDate')));
		$sData->OwenrIDcard		= request('OwenrIDcard');
		$sData->OwenrTax		= request('OwenrTax');
		$sData->OwenrBranch		= request('OwenrBranch');
		$sData->OwenrCreditLimit= str_replace(',','',request('OwenrCreditLimit'));
		$sData->OwenrDay		= request('OwenrDay');
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\OwnerController@index')->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		\App\Models\Master\SMD\Owner::where('id',$id)->delete();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request){
		$sTable = \App\Models\Master\SMD\Owner::query();
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
