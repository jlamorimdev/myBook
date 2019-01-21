<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;
use App\Editoras;
use App\Tipos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LivrosFormRequest;
use DB;

class LivrosController extends Controller
{
	public function __construct(){
    	//
	}

	public function index(Request $request){	
		if($request){
			$query=trim($request->get('searchText'));
			$livros = DB::table('livros as l')
			->join('editoras as e', 'l.id_editora', '=', 'e.id_editora')
			->join('tipos as t', 'l.id_tipo', '=' , 't.id_tipo')
			->select('l.id_livro', 'l.autor', 'l.nome','l.paginas',
				'e.nome as editora', 't.nome as tipo')
			->where('l.nome' , 'LIKE' , '%'.$query.'%')
			->where('l.condicao', '=', '1')
			->orderBy('id_livro', 'desc')
			->paginate(7);
			return view('livros.livros.index', [
				"livros" => $livros, "searchText"=>$query
			]);	
		}
	}

	public function create(){	

		$editoras=DB::table('editoras')
		->where('condicao', '=', '1')->get();
		$tipos=DB::table('tipos')
		->where('condicao', '=', '1')->get();

		return view("livros.livros.create", ["editoras"=>
			$editoras, "tipos"=>$tipos]);
	}

	public function store(LivrosFormRequest $request){
		$livro = new Livros;
		$livro->id_editora=$request->get('id_editora');	
		$livro->id_tipo=$request->get('id_tipo');	
		$livro->nome=$request->get('nome');	
		$livro->autor=$request->get('autor');   
		$livro->paginas=$request->get('paginas'); 	
		$livro->condicao=1;	
		$livro->save();
		return Redirect::to('livros/livros');	
	}

	public function show($id){
		return view("livros.livros.show",
			[
				"livro"=>Editoras::findOrFail($id)
			]);
	}

	public function edit($id){

		$livro = Livros::findOrFail($id);

		$editoras=DB::table('editoras')
		->where('condicao', '=', '1')->get();

		$tipos=DB::table('tipos')
		->where('condicao', '=', '1')->get();

		return view("livros.livros.edit", ["livro"=>$livro, "editoras"=>
			$editoras, "tipos"=>$tipos]);
	}

	public function update(LivrosFormRequest $request, $id){
		$livro=Livros::findOrFail($id);
		$livro->id_editora=$request->get('id_editora');	
		$livro->id_tipo=$request->get('id_tipo');	
		$livro->nome=$request->get('nome');	
		$livro->autor=$request->get('autor');   
		$livro->paginas=$request->get('paginas');
		$livro->update();
		return Redirect::to('livros/livros');
	}
	public function destroy($id){	
		$livro=Livros::findOrFail($id);
		$livro->condicao = 0;     	
		$livro->update();
		return Redirect::to('livros/livros');
	}
}
