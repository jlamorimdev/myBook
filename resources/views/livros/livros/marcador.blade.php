@extends('layout.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Marcador do Livro</h3>
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
			<label>Marcador</label>
			<select name="id_marcador" class="form-control">
				@foreach($marcadores as $marcador)
				<option value="{{$marcador->id_marcador}}">
					{{$marcador->nome}}
				</option>
				@endforeach
			</select>			
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Salvar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>

		{!!Form::close()!!}		

	</div>
</div>
@stop