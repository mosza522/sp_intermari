<?php

namespace App\Http\Controllers\Master\SMD;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OwnerClientController extends Controller
{
	public function __construct(){
		
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create($OwnerID)
    {
		$sOwner = \App\Models\Master\SMD\Owner::find($OwnerID);
		return view('Master.SMD.owner_client_form')->with( array('sOwner'=>	$sOwner) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $OwnerID)
    {
        $sData = new \App\Models\Master\SMD\OwnerClient;
		$sData->OwnerID				= $OwnerID;
		$sData->ClientName			= request('ClientName');
		$sData->ClientTel			= request('ClientTel');
		$sData->ClientPosition		= request('ClientPosition');
		$sData->ClientResponsibility= request('ClientResponsibility');
		$sData->ClientAddress		= request('ClientAddress');
		$sData->ClientRoad			= request('ClientRoad');
		$sData->ClientTambon		= request('ClientTambon');
		$sData->ClientAmphoe		= request('ClientAmphoe');
		$sData->ClientProvince		= request('ClientProvince');
		$sData->ClientPostCode		= request('ClientPostCode');
		$sData->ClientMail			= request('ClientMail');
        $sData->created_at			= \Carbon\Carbon::now();
        $sData->updated_at			= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\OwnerController@edit',$OwnerID)->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($OwnerID, $id)
    {
		$sRow 	= \App\Models\Master\SMD\OwnerClient::find($id);
		$sOwner = \App\Models\Master\SMD\Owner::find($OwnerID);
		return view('Master.SMD.owner_client_form')->with( array('sOwner'=>	$sOwner, 'sRow'=> $sRow) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $OwnerID, $id)
    {
		$sData = \App\Models\Master\SMD\OwnerClient::find($id);
		$sData->ClientName			= request('ClientName');
		$sData->ClientTel			= request('ClientTel');
		$sData->ClientPosition		= request('ClientPosition');
		$sData->ClientResponsibility= request('ClientResponsibility');
		$sData->ClientAddress		= request('ClientAddress');
		$sData->ClientRoad			= request('ClientRoad');
		$sData->ClientTambon		= request('ClientTambon');
		$sData->ClientAmphoe		= request('ClientAmphoe');
		$sData->ClientProvince		= request('ClientProvince');
		$sData->ClientPostCode		= request('ClientPostCode');
		$sData->ClientMail			= request('ClientMail');
        $sData->updated_at		= \Carbon\Carbon::now();
        $sData->save();
		return redirect()->action('Master\SMD\OwnerController@edit',$OwnerID)->with(['RecordID' => $sData->id, 'alert'=>\App\Models\Alert::Msg('success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($OwnerID, $id)
    {
		\App\Models\Master\SMD\OwnerClient::where('id',$id)->delete();
		return response()->json(\App\Models\Alert::Msg('success'));
    }
	
    /**
     * Display a listing of the resource with Datatable.
     */
	public function postDatatable(Request $request, $OwnerID){
		$sTable = \App\Models\Master\SMD\OwnerClient::where('OwnerID',$OwnerID);
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
