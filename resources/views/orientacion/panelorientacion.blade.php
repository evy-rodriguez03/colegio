@extends('layout.panel')

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
      <div class="card">
          <center><img src="{{asset('img/brand/preescolar.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
          <div class="card-body">
              <center><a href="{{Route('escolar.index')}}" class="btn btn-lg btn-info">Formulario Escolar</a></center>
          </div>
      </div>
  </div>
  <div class="col">
      <div class="card">
          <center><img src="{{asset('img/brand/preescolar.jpg') }}" class="card-img-top" alt="..." style="width:127px;height:120px;"></center>
          <div class="card-body">
              <center><a href="{{Route('preescolarindex.index')}}" class="btn btn-lg btn-info">Formulario preescolar</a></center>
          </div>
      </div>
  </div>
</div>
  </div>
</div>




@endsection