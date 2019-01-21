@extends('layout.admin')
@section('conteudo')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <h3>Nova Compra</h3>
         @if (count($errors)>0)
         <div class="alert alert-danger">
              <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
              </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'livros/compras','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
           <label for="livro">Livro</label>
           <input type="text" name="livro" class="form-control" placeholder="Livro...">
     </div>
     <div class="form-group">
           <label for="autor">Autor</label>
           <input type="text" name="autor" class="form-control" placeholder="Autor...">
     </div>
     <div class="form-group">
           <label for="valor">Valor</label>
           <input type="text" name="valor" class="form-control"  placeholder="Ex.: 49.90">
     </div>
     <div class="form-group">
           <button class="btn btn-primary" type="submit">Salvar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
     </div>

     {!!Form::close()!!}		

</div>
</div>


@stop