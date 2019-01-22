<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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

    	$nao_lidos = DB::table('livros')
    	->where('id_marcador' ,'=' , '1')
    	->count();



    	$lidos = DB::table('livros')
    	->where('id_marcador' ,'=' , '2')
    	->count();	

    	$emprestados = DB::table('livros')
    	->where('id_marcador' ,'=' , '3')
    	->count();	

    	$nao_lidos = ($nao_lidos / $total_livros) * 100;	
    	$lidos = ($lidos / $total_livros) * 100;	
    	$emprestados = ($emprestados / $total_livros) * 100;	

    	return view ("index", ["total_livros" => $total_livros, "lidos" => $lidos,
    				"nao_lidos" => $nao_lidos, "emprestados" => $emprestados]);
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
