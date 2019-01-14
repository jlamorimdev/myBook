@extends('layout.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Editora:  {{$editora->nome}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($editora, ['method'=>'PATCH', 'route'=>['editoras.update', 
			$editora->id_editora]])!!}
			{{Form::token()}}

            <div class="form-group">
            	<label for="nome">Nome</label>
            	<input type="text" name="nome" class="form-control" 
            	value="{{$editora->nome}}" 
            	placeholder="Nome...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop