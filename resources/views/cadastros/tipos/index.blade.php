@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Tipos </h3>
		@include('cadastros.tipos.search')
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
               @foreach ($tipos as $tipo)
				<tr>
					<td>{{ $tipo->id_tipo}}</td>
					<td>{{ $tipo->nome}}</td>
					<td>
						<a href="{{URL::action('TiposController@edit',$tipo->id_tipo)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$tipo->id_tipo}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('cadastros.tipos.modal')
				@endforeach
			</table>
		</div>
		<a href="tipos/create"><button class="btn btn-success">Novo</button></a>
		{{$tipos->render()}}
	</div>
</div>
@stop