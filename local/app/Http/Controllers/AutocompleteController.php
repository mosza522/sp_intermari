<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AutocompleteController extends Controller
{
	public function __construct(){
		
	}
	
	
	
	

	
	
	
	
	
	
	public function getSearch()
    {
		if( request('Models') == 'true' ){
			return DB::table('ck_Master_'.str_replace('Name', '', request('Field')))->where(request('Field'), 'like', '%'.request('query').'%')
				->select('id', request('Field').' AS value')
				->orderBy(request('Field'), 'asc')->take(10)->get();
		}else if( request('Models') == 'job' ){
			return \App\Models\Smd2Item::join('ck_Master_Smd_Product','ck_Master_Smd_Product.id','=','ck_Smd_2_Item.ProductID')
				->select('ProductID AS id', 'ProductName AS value')
				->where('SmdID',request('Id'))
				->where('ProductName', 'like', '%'.request('query').'%')
				->orderBy(request('Field'), 'asc')->take(10)->get();
		}else if( request('Models') == 'jobProduct' ){
			return \App\Models\Master\SMD\Product::where('ProductName', 'like', '%'.request('query').'%')
				->select('id', 'ProductName AS value')
				->where('ProductCat',request('Id'))
				->orderBy('ProductName','asc')->take(10)->get();
		}else{
			$App = '\App\Models\\'.request('Models');
			return $App::where(request('Field'), 'like', '%'.request('query').'%')
				->select('id', request('Field').' AS value')
				->orderBy(request('Field'), 'asc')->take(10)->get();
			
		}
	}
	
	
}
