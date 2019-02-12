<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editoras;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EditorasFormRequest;
use Auth;
use DB;

class EditorasController extends Controller
{
      public function __construct(){
    	//
    }

    public function index(Request $request){	
    	if($request){
    		$query=trim($request->get('searchText'));
    		$editoras = DB::table('editoras')
    		->where('nome' , 'LIKE' , '%'.$query.'%')
            ->where('condicao' ,'=' , '1')
            ->where('usuario_id', '=' , '' . Auth::user()->id)
    		->orderBy('id_editora', 'desc')
    		->paginate(7);
    		return view('cadastros.editoras.index', [
    			"editoras" => $editoras, "searchText"=>$query
    		]);	
    	}
    }

     public function create(){	
     	return view ("cadastros.editoras.create");
    }

     public function store(EditorasFormRequest $request){
     	$editora = new Editoras;
        $editora->nome=$request->get('nome');   
     	$editora->usuario_id=Auth::user()->id;	        
        $editora->condicao=1;
     	$editora->save();

     	return Redirect::to('cadastro/editoras');	
    }

     public function show($id){
     	return view("cadastros.editoras.show",
     		[
     			"editora"=>Editora::findOrFail($id)
     		]);
    }

     public function edit($id){
     return view("cadastros.editoras.edit",
     		[
     			"editora"=>Editoras::findOrFail($id)
     		]);	
    }

      public function update(EditorasFormRequest $request, $id){
        $editora=Editoras::findOrFail($id);
        $editora->nome=$request->get('nome');
        $editora->update();
        return Redirect::to('cadastro/editoras');
    }
     public function destroy($id){	
     	$editora=Editoras::findOrFail($id);
     	$editora->condicao = '0';     	
     	$editora->update();
     	return Redirect::to('cadastro/editoras');
    }
}
