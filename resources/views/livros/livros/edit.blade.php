@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Livro:  {{$livro->nome}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($livro, ['method'=>'PATCH', 'route'=>['livros.update', 
		$livro->id_livro]])!!}
		{{Form::token()}}

		<div class="form-group">
			<label for="nome">Nome do Livro</label>
			<input type="text" name="nome" class="form-control" 
			value="{{$livro->nome}}" 
			placeholder="Nome...">
		</div>

		<div class="form-group">
			<label for="autor">Autor</label>
			<input type="text" name="autor" class="form-control" 
			value="{{$livro->autor}}" 
			placeholder="Nome...">
		</div>

		<div class="form-group">
			<label>Editora</label>
			<select name="id_editora" class="form-control">
				@foreach($editoras as $editora)
				@if($editora->id_editora == $livro->id_editora)
				<option value="{{$editora->id_editora}}" selected>
					{{$editora->nome}}
				</option>
				@else
				<option value="{{$editora->id_editora}}">
					{{$editora->nome}}
				</option>
				@endif
				@endforeach
			</select>			
		</div>

		<div class="form-group">
			<label>Gênero</label>
			<select name="id_tipo" class="form-control">
				@foreach($tipos as $tipo)
				@if($tipo->id_tipo == $livro->id_tipo)
				<option value="{{$tipo->id_tipo}}" selected>
					{{$tipo->nome}}
				</option>
				@else
				<option value="{{$tipo->id_tipo}}">
					{{$tipo->nome}}
				</option>
				@endif
				@endforeach
			</select>			
		</div>

		<div class="form-group">
			<label for="paginas">Páginas</label>
			<input type="text" name="paginas" class="form-control" 
			value="{{$livro->paginas}}" 
			placeholder="Valor...">
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Salvar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>

		{!!Form::close()!!}		

	</div>
</div>
@stop


