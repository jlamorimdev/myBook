@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Livros </h3>
		@include('livros.livros.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Num</th>
					<th>Nome</th>
					<th>Autor</th>
					<th>Editora</th>
					<th>Gênero</th>
					<th>Numº de páginas</th>			
					<th>Tag</th>			
					<th>Opções</th>
				</thead>
				@foreach ($livros as $livro)
				<tr>
					<td>{{ $livro->id_livro}}</td>
					<td>{{ $livro->nome}}</td>
					<td>{{ $livro->autor}}</td>
					<td>{{ $livro->editora}}</td>
					<td>{{ $livro->tipo}}</td>
					<td>{{ $livro->paginas}}</td>					
					<td>
						@if($livro->id_marcador==1)
						<a class="btn btn-danger"><i class="fa fa-bookmark-o"></i></a>
						@elseif($livro->id_marcador==2)
						<a class="btn btn-success"><i class="fa fa-bookmark"></i></a>
						@else
						<a class="btn btn-warning"><i class="fa fa-bookmark"></i></a>
						@endif
					</td>					
					<td>
						<a href="{{URL::action('LivrosController@edit', $livro->id_livro)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$livro->id_livro}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('livros.livros.modal')
				@endforeach
			</table>
			<a href="/livros/livros/create"><button class="btn btn-success">Novo</button></a>
		</div>
		{{$livros->render()}}
	</div>
</div>
@stop