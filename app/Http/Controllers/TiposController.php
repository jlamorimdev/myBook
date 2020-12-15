<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TiposFormRequest;
use Auth;
use DB;

class TiposController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tipos = DB::table('tipos')
                ->where('nome', 'LIKE', '%' . $query . '%')
                ->where('condicao', '=', '1')
                ->where('usuario_id', '=', '' . Auth::user()->id)
                ->orderBy('id_tipo', 'desc')
                ->paginate(7);
            return view('cadastros.tipos.index', [
                "tipos" => $tipos, "searchText" => $query
            ]);
        }
    }

    public function create()
    {
        return view("cadastros.tipos.create");
    }

    public function store(TiposFormRequest $request)
    {
        $tipo = new Tipos;
        $tipo->nome = $request->get('nome');
        $tipo->condicao = 1;
        $tipo->usuario_id = Auth::user()->id;
        $tipo->save();

        return Redirect::to('cadastro/tipos');
    }

    public function show($id)
    {
        return view(
            "cadastros.tipos.show",
            [
                "tipo" => Tipos::findOrFail($id)
            ]
        );
    }

    public function edit($id)
    {
        return view(
            "cadastros.tipos.edit",
            [
                "tipo" => Tipos::findOrFail($id)
            ]
        );
    }

    public function update(TiposFormRequest $request, $id)
    {
        $tipo = Tipos::findOrFail($id);
        $tipo->nome = $request->get('nome');
        $tipo->update();
        return Redirect::to('cadastro/tipos');
    }
    public function destroy($id)
    {
        $tipo = Tipos::findOrFail($id);
        $tipo->condicao = '0';
        $tipo->update();
        return Redirect::to('cadastro/tipos');
    }
}
