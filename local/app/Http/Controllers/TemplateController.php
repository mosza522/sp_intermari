<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
		//echo $file1;exit;
		if( empty($_GET['file']) ) return view('Template.index');
		if( !empty($_GET['file']) ) return view('Template.'.$_GET['file']);
    }

}
