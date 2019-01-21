@extends('layout.admin')
@section('conteudo')
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3>53<sup style="font-size: 20px">%</sup></h3>

      <p>Lidos</p>
    </div>
    <div class="icon">
      <img src="img/book-open.png" style="
    width: 60px;">
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right""></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3>53<sup style="font-size: 20px">%</sup></h3>

      <p>Não lidos</p>
    </div>
    <div class="icon">
      <img src="img/book.png" style="
    width: 60px;">
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right""></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>53<sup style="font-size: 20px">%</sup></h3>

      <p>Emprestados</p>
    </div>
    <div class="icon">
      <img src="img/emprestado.png" style="
    width: 60px;">
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right""></i>
    </a>
  </div>
</div>

<div class="col-lg-4 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-blue">
    <div class="inner">
      <h3>{{$total_livros}}<sup style="font-size: 20px"></sup></h3>

      <p>Total de Livros</p>
    </div>
    <div class="icon">
      <img src="img/pilha.png" style="
    width: 100px;">
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right""></i>
    </a>
  </div>
</div>
@stop