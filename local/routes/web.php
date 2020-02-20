<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

if( in_array(Request::ip(), array('127.0.0.1','::1')) ){
	\Debugbar::enable();
    //echo "environment=local\n";
	//exit;
}


Route::group(['middleware' => 'auth'], function (){

	Route::get('/', function () {return view('index')->with(array('PageContainer'=> true) );});

	##### SMD-ฝ่ายขายและการตลาด
	if( Request::is('smd/*') )	require_once('web_routes_smd.php');
	##### FTS-ฝ่ายขนถ่ายสินค้าทางทะเล
	if( Request::is('fts/*') )	require_once('web_routes_fts.php');
	##### CLM-ฝ่ายขนถ่ายสินค้าท่าเรือ
	if( Request::is('clm/*') )	require_once('web_routes_clm.php');
	##### SWP-ฝ่ายท่าเรือสินวัฒนา
	if( Request::is('swp/*') || Request::is('clm/*') )	require_once('web_routes_swp.php');
	##### RTM-ฝ่ายขนส่งทางน้ำ
	if( Request::is('rtm/*') )	require_once('web_routes_rtm.php');
	##### Machine
	if( Request::is('machine/*') )	require_once('web_routes_machine.php');
	##### fuel
	if( Request::is('fuel/*') )	require_once('web_routes_fuel.php');
	##### ข้อมูลทั่วไปส่งออกเป็น json
	require_once('web_routes_json.php');














	/*
	|--------------------------------------------------------------------------------------
	| #SMD-ฝ่ายขายและการตลาด
	|--------------------------------------------------------------------------------------*/
	Route::resource('admin/master/smd/owner', 'Master\SMD\OwnerController');
	Route::resource('admin/master/smd/owner/{OwnerID}/client', 'Master\SMD\OwnerClientController');
	Route::resource('admin/master/smd/boat', 'Master\SMD\BoatController');
	Route::resource('admin/master/smd/product', 'Master\SMD\ProductController');
	Route::resource('admin/master/smd/harbor', 'Master\SMD\HarborController');
	Route::resource('admin/master/smd/warehouse', 'Master\SMD\WarehouseController');
	Route::resource('admin/master/smd/route', 'Master\SMD\RouteController');

	Route::post('datatable/master/smd/owner', 'Master\SMD\OwnerController@postDatatable');
	Route::post('datatable/master/smd/boat', 'Master\SMD\BoatController@postDatatable');
	Route::post('datatable/master/smd/owner/{OwnerID}/client', 'Master\SMD\OwnerClientController@postDatatable');
	Route::post('datatable/master/smd/product', 'Master\SMD\ProductController@postDatatable');
	Route::post('datatable/master/smd/harbor', 'Master\SMD\HarborController@postDatatable');
	Route::post('datatable/master/smd/route', 'Master\SMD\RouteController@postDatatable');
	Route::post('datatable/master/smd/warehouse', 'Master\SMD\WarehouseController@postDatatable');

	/*
	|--------------------------------------------------------------------------------------
	| #FTS-ฝ่ายขนถ่ายสินค้าทางทะเล
	|--------------------------------------------------------------------------------------*/
	Route::resource('admin/master/fts/buoy', 'Master\FTS\BuoyController');
	Route::resource('admin/master/fts/sweep', 'Master\FTS\SweepController');
	Route::resource('admin/master/fts/machine', 'Master\FTS\MachineController');
	Route::resource('admin/master/fts/foreman', 'Master\FTS\ForemanController');

	Route::post('/datatable/master/fts/buoy', 'Master\FTS\BuoyController@postDatatable');
	Route::post('/datatable/master/fts/sweep', 'Master\FTS\SweepController@postDatatable');
	Route::post('/datatable/master/fts/machine', 'Master\FTS\MachineController@postDatatable');
	Route::post('/datatable/master/fts/foreman', 'Master\FTS\ForemanController@postDatatable');

	/*
	|--------------------------------------------------------------------------------------
	| #CLM-ฝ่ายขนถ่ายสินค้าท่าเรือ
	|--------------------------------------------------------------------------------------*/





	/*
	|--------------------------------------------------------------------------------------
	| #SWP-ฝ่ายท่าเรือสินวัฒนา
	|--------------------------------------------------------------------------------------*/
	Route::resource('admin/master/swp/machine', 'Master\SWP\MachineController');
	Route::post('/datatable/master/swp/machine', 'Master\SWP\MachineController@postDatatable');








	/*
	|--------------------------------------------------------------------------------------
	| #RTM-ฝ่ายขนส่งสินค้าทางน้ำ
	|--------------------------------------------------------------------------------------*/


	// =========================================ใบตรวจเช็ค========================================
	Route::get('machine/indexMachineCondition', function () {
		 return view('Machine.indexMachineCondition')->with(array('PageContainer'=> true));
	 }
	 );
	 Route::get('machine/indexGrab', function () {
	 	 return view('Machine.indexGrab')->with(array('PageContainer'=> true));
	  }
	  );
	Route::get('machine/indexElectricity', function () {
	  	return view('Machine.indexElectricity')->with(array('PageContainer'=> true));
	  }
	  );
		Route::get('machine/indexCrane', function () {
		  	return view('Machine.indexCrane')->with(array('PageContainer'=> true));
		  }
		  );
	Route::get('machine/indexConveyor', function () {
				return view('Machine.indexConveyor')->with(array('PageContainer'=> true));
			}
			);

// =========================================น้ำมัน========================================
			Route::get('fuel/index', function () {
						return view('Fuel.index')->with(array('PageContainer'=> true));
					}
					);
					Route::get('fuel/stock', function () {
								return view('Fuel.stock')->with(array('PageContainer'=> true));
							}
							);
							Route::get('fuel/approve', function () {
										return view('Fuel.approve')->with(array('PageContainer'=> true));
									}
									);








	Route::get('/import/staff', 'ImportController@getStaff');
    Route::post('/autocomplete/', 'AutocompleteController@getSearch');
	/*--------------------------------------------------------------------------------------------------------*/
	Route::get('/admin', function () { return view('index');});
	Route::get('admin/template/', 'TemplateController@getIndex');
});
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
