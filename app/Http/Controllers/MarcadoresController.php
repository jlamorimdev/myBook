<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marcadores;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MarcadoresFormRequest;
use DB;

class MarcadoresController extends Controller
{
	public function __construct()
	{
		//
	}

	public function index(Request $request)
	{
		if ($request) {
			$query = trim($request->get('searchText'));
			$marcadores = DB::table('marcadores')
				->where('nome', 'LIKE', '%' . $query . '%')
				->where('condicao', '=', '1')
				->orderBy('id_marcador', 'desc')
				->paginate(7);
			return view('cadastros.marcadores.index', [
				"marcadores" => $marcadores, "searchText" => $query
			]);
		}
	}

	public function show($id)
	{
		return view(
			"cadastros.marcadores.show",
			[
				"marcador" => Marcadores::findOrFail($id)
			]
		);
	}

	public function create()
	{
		return view("cadastros.marcadores.create");
	}
	
	public function edit($id)
	{
		return view(
			"cadastros.marcadores.edit",
			[
				"marcador" => Marcadores::findOrFail($id)
			]
		);
	}

	public function store(MarcadoresFormRequest $request)
	{
		$marcador = new Marcadores;
		$marcador->nome = $request->get('nome');
		$marcador->condicao = 1;
		$marcador->save();

		return Redirect::to('cadastro/marcadores');
	}

	public function update(MarcadoresFormRequest $request, $id)
	{
		$marcador = Marcadores::findOrFail($id);
		$marcador->nome = $request->get('nome');
		$marcador->update();
		return Redirect::to('cadastro/marcadores');
	}

	public function destroy($id)
	{
		$marcador = Marcadores::findOrFail($id);
		$marcador->condicao = '0';
		$marcador->update();
		return Redirect::to('cadastro/marcadores');
	}
}
