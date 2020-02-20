<?php

namespace App\Http\Controllers\SWP\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Fuel.index')->with(array('PageContainer'=> true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
       return redirect()->action('SWP\Fuel\BalanceController@index')->with(['RecordID' => $fuel->id, 'alert'=>\App\Models\Alert::Msg('success')]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
