<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LivroMarcador;
use App\Livros;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LivroMarcadorFormRequest;
use DB;

class LivroMarcadorController extends Controller
{
  public function __construct()
  {
    //
  }

  public function index(Request $request)
  {
  }

  public function create($id)
  {
    $marcadores = DB::table('marcadores')
      ->where('condicao', '=', '1')->get();
    return view("cadastros.marcadores.livro", ['marcadores' => $marcadores, 'id_livro' => Livro::findOrFail($id)]);
  }

  public function store(LivroMarcadorFormRequest $request)
  {
    $livro_marcador = new LivroMarcador;
    $livro_marcador->id_livro = $request->get('id_livro');
    $livro_marcador->id_marcador = $request->get('id_marcador');
    $livro_marcador->condicao = 1;
    $livro_marcador->save();

    return Redirect::to('livros/livros');
  }

  public function show()
  {
    return Redirect::to('livros/livros');
  }

  public function edit($id)
  {
    $livro = Livros::findOrFail($id);

    $marcadores = DB::table('marcadores')
      ->where('condicao', '=', '1')->get();

    return view(
      "livros.livros.marcador",
      ['marcadores' => $marcadores, "livro" => $livro]
    );
  }

  public function update(LivrosFormRequest $request, $id)
  {
    $livro = Livros::findOrFail($id);
    $livro->id_marcador = $request->get('id_marcador');
    $livro->update();
    return Redirect::to('livros/livros');
  }

  public function destroy($id)
  {
    $livro_marcador = LivroMarcador::findOrFail($id);
    $livro_marcador->condicao = '0';
    $livro_marcador->update();
    return Redirect::to('livros/livros');
  }
}
