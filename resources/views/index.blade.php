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
      <i class="ion ion-stats-bars"></i>
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
      <i class="ion ion-stats-bars"></i>
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
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right""></i>
    </a>
  </div>
</div>
@stop