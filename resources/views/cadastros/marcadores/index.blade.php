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
					<th>Símbolo</th>
				</thead>
               @foreach ($marcadores as $marcador)
				<tr>
					<td>{{ $marcador->id_marcador}}</td>
					<td>{{ $marcador->nome}}</td>
					<td>
						@if($livro->id_marcador==1)
						<a class="btn btn-danger" title="Não Lido"><i class="fa fa-bookmark-o"></i></a>
						@elseif($livro->id_marcador==2)
						<a class="btn btn-success" title="Lido"><i class="fa fa-bookmark"></i></a>@elseif($livro->id_marcador==4)
						<a class="btn btn-info" title="Lendo"><i class="fa fa-bookmark"></i></a>@elseif($livro->id_marcador==5)
						<a class="btn bg-navy" title="Lido e Emprestado"><i class="fa fa-bookmark"></i></a>@elseif($livro->id_marcador==6)
						<a class="btn bg-maroon" title="Não Lido e Emprestado"><i class="fa fa-bookmark-o"></i></a>
						@else
						<a class="btn btn-warning" title="Emprestado"><i class="fa fa-bookmark"></i></a>
						@endif
					</td>	
				</tr>
				@include('cadastros.marcadores.modal')
				@endforeach
			</table>
			<!-- <a href="marcadores/create"><button class="btn btn-success">Novo</button></a> -->
		</div>
		{{$marcadores->render()}}
	</div>
</div>
@stop