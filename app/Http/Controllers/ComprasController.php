<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compras;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ComprasFormRequest;
use DB;

class ComprasController extends Controller
{
     public function __construct(){
    	//
    }

    public function index(Request $request){	
    	if($request){
    		$query=trim($request->get('searchText'));
    		$compras = DB::table('compras')
    		->where('livro' , 'LIKE' , '%'.$query.'%')
            ->where('condicao' ,'=' , '1')
    		->orderBy('id_compra', 'desc')
    		->paginate(7);
    		return view('livros.compras.index', [
    			"compras" => $compras, "searchText"=>$query
    		]);	
    	}
    }

     public function create(){	
     	return view ("livros.compras.create");
    }

     public function store(ComprasFormRequest $request){
     	$compra = new Compras;
        $compra->livro=$request->get('livro');    
        $compra->autor=$request->get('autor');    
     	$compra->valor=$request->get('valor');	
        $compra->condicao=1;
     	$compra->save();

     	return Redirect::to('livros/compras');	
    }

     public function show($id){
     	return view("livros.compras.show",
     		[
     			"compra"=>Compra::findOrFail($id)
     		]);
    }

     public function edit($id){
     return view("livros.compras.edit",
     		[
     			"compra"=>Compras::findOrFail($id)
     		]);	
    }

      public function update(ComprasFormRequest $request, $id){
        $compra=Compras::findOrFail($id);
        $compra->livro=$request->get('livro');    
        $compra->autor=$request->get('autor');    
        $compra->valor=$request->get('valor');  
        $compra->update();
        return Redirect::to('livros/compras');
    }
     public function destroy($id){	
     	$compra=Compras::findOrFail($id);
     	$compra->condicao = '0';     	
     	$compra->update();
     	return Redirect::to('livros/compras');
    }
}
