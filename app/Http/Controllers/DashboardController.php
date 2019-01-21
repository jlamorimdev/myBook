<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class DashboardController extends Controller
{
     public function __construct(){
    	//
    }

    public function index(Request $request){
    	$total_livros = DB::table('livros')
    	->where('condicao' ,'=' , '1')
    	->count();	
    	return view ("index", ["total_livros" => $total_livros]);
    }
}
