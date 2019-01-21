@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Novo Livro</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

{!!Form::open(array('url'=>'livros/livros',
'method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nome">Nome do Livro</label>
			<input type="text" name="nome" class="form-control" required value="{{old('nome')}}" 
			class="form-control"  placeholder="Nome do livro...">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="codigo">Autor</label>
			<input type="text" name="autor" class="form-control" required value="{{old('autor')}}" 
			class="form-control"  placeholder="Autor do Livro...">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label>Editora</label>
			<select name="id_editora" class="form-control">
				@foreach($editoras as $editora)
				<option value="{{$editora->id_editora}}">
					{{$editora->nome}}
				</option>
				@endforeach
			</select>			
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label>Gênero do Livro</label>
			<select name="id_tipo" class="form-control">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id_tipo}}">
					{{$tipo->nome}}
				</option>
				@endforeach
			</select>			
		</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="paginas">Número de Páginas</label>
			<input type="text" name="paginas" class="form-control" required value="{{old('paginas')}}" 
			class="form-control"  placeholder="Páginas...">
		</div>
	</div>
</div>

<div class="form-group">
	<button class="btn btn-primary" type="submit">Salvar</button>
	<button class="btn btn-danger" type="reset">Cancelar</button>
</div>

{!!Form::close()!!}		

@stop