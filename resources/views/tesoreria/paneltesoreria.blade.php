@extends('layout.panel')

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
      <div class="card">
          <center><img src="{{asset('img/brand/firma_contrato.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
          <div class="card-body">
              <center><a href="{{Route('firmacontratotesoreria.create')}}" class="btn btn-lg btn-info">Firma Contrato</a></center>
          </div>
      </div>
  </div>
  <div class="col">
      <div class="card">
          <center><img src="{{asset('img/brand/pago_realizar.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
          <div class="card-body">
              <center><a href="{{Route('vistapago.index')}}" class="btn btn-lg btn-info">Pago a realizar</a></center>
          </div>
      </div>
  </div>
  <div class="col">
      <div class="card">
          <center><img src="{{asset('img/brand/pago_retrasada.jpg') }}" class="card-img-top" alt="..." style="width:120px;height:120px;"></center>
          <div class="card-body">
              <center><a href="{{Route('retrasadas.index')}}" class="btn btn-lg btn-info">Pago Retrasada</a></center>
          </div>
      </div>
  </div>
</div>
  </div>
</div>




@endsection