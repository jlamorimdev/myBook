@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Marcadores </h3>
		@include('cadastros.marcadores.search')
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
               @foreach ($marcadores as $marcador)
				<tr>
					<td>{{ $marcador->id_marcador}}</td>
					<td>{{ $marcador->nome}}</td>
					<td>
						<a href="{{URL::action('MarcadoresController@edit',$marcador->id_marcador)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$marcador->id_marcador}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('cadastros.marcadores.modal')
				@endforeach
			</table>
			<a href="marcadores/create"><button class="btn btn-success">Novo</button></a>
		</div>
		{{$marcadores->render()}}
	</div>
</div>
@stop