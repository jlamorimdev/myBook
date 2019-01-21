@extends('layout.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Compra:  {{$compra->livro}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($compra, ['method'=>'PATCH', 'route'=>['compras.update', 
			$compra->id_compra]])!!}
			{{Form::token()}}

            <div class="form-group">
            	<label for="livro">Livro</label>
            	<input type="text" name="livro" class="form-control" 
            	value="{{$compra->livro}}" 
            	placeholder="Nome...">
            </div>

            <div class="form-group">
            	<label for="autor">Autor</label>
            	<input type="text" name="autor" class="form-control" 
            	value="{{$compra->autor}}" 
            	placeholder="Nome...">
            </div>

            <div class="form-group">
            	<label for="valor">Valor</label>
            	<input type="text" name="valor" class="form-control" 
            	value="{{$compra->valor}}" 
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