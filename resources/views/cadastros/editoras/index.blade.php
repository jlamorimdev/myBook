@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Editoras</h3>
		@include('cadastros.editoras.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Num</th>
					<th>Nome</th>
					<th>Opções</th>
				</thead>
               @foreach ($editoras as $editora)
				<tr>
					<td>{{ $editora->id_editora}}</td>
					<td>{{ $editora->nome}}</td>
					<td>
						<a href="{{URL::action('EditorasController@edit',$editora->id_editora)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$editora->id_editora}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('cadastros.editoras.modal')
				@endforeach
			</table>
			<a href="editoras/create"><button class="btn btn-success">Novo</button></a>
		</div>
		{{$editoras->render()}}
	</div>
</div>
@stop