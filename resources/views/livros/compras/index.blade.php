@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Compras</h3>
		@include('livros.compras.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Num</th>
					<th>Livro</th>
					<th>Autor</th>
					<th>Valor</th>
					<th>Opções</th>
				</thead>
               @foreach ($compras as $compra)
				<tr>
					<td>{{ $compra->id_compra}}</td>
					<td>{{ $compra->livro}}</td>
					<td>{{ $compra->autor}}</td>
					<td>R$ {{ $compra->valor}}</td>
					<td>
						<a href="{{URL::action('ComprasController@edit',$compra->id_compra)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$compra->id_compra}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('livros.compras.modal')
				@endforeach
			</table>
			<a href="compras/create"><button class="btn btn-success">Novo</button></a>
		</div>
		{{$compras->render()}}
	</div>
</div>
@stop