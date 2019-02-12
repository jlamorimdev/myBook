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
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();	

     $nao_lidos = DB::table('livros')
     ->where('id_marcador' ,'=' , '1')
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();

     $nao_lidos_emprestados = DB::table('livros')
     ->where('id_marcador' ,'=' , '6')
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();

     $lidos_emprestados = DB::table('livros')
     ->where('id_marcador' ,'=' , '5')
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();


     $lidos = DB::table('livros')
     ->where('id_marcador' ,'=' , '2')
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();	

     $emprestados = DB::table('livros')
     ->where('id_marcador' ,'=' , '3')
     ->where('usuario_id', '=' , '' . Auth::user()->id)
     ->count();	

     if ($total_livros == 0) {
       $nao_lidos = 0;
       $lidos = 0;
       $emprestados = 0;
   } else {
     $nao_lidos = (($nao_lidos + $nao_lidos_emprestados) / $total_livros) * 100;
     $lidos = (($lidos + $lidos_emprestados) / $total_livros) * 100;	
     $emprestados = (($emprestados + $nao_lidos_emprestados + $lidos_emprestados) / $total_livros) * 100;	

     $nao_lidos = number_format($nao_lidos, 0);            
     $lidos = number_format($lidos, 0);            
     $emprestados = number_format($emprestados, 0);             
 }


 return view ("index", ["total_livros" => $total_livros, "lidos" => $lidos,
    "nao_lidos" => $nao_lidos, "emprestados" => $emprestados]);
}

public function logout(){
    Auth::logout();
    return Redirect::to('/');
}
}
