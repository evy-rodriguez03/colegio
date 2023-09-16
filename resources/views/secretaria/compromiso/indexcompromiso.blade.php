@extends('layout.panel')

@section('css')
<style>
    .btn-sm-custom {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}
</style>

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h2 class="mb-0">Compromiso Conducta</h2>
        </div>
        
        <div class="col text-right"> 
            <a href="{{Route('dashboardsec.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
      </div>
    </div>
    <div >
     @if (session('notification'))
     <div class="alert alert-success" role="alert">
      {{session('notification')}}
  </div>
     @endif
    </div>
    <div class="table-responsive-sm container">
      <!-- Projects table -->

      <form action ="{{ route('indexcompromiso.store')}}" method="POST">
      @csrf

      <div class="card-body">
      <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre del Padre</th>
            <th scope="col">Compromiso</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($padres as $index=> $padre)
        <tr>
            <input name='id_padre[]' value="{{$padre->id}}" type="text" style="display: none">
             <td>  {{$index + 1}}</td>
            <td> {{$padre->primernombre}} {{$padre->primerapellido}}</td>
             <td>
              <input type="checkbox" name="compromiso[]" value="1" @if (isset($padre->firmacompromiso[0]))
                                                                      @if($padre->firmacompromiso[0]->compromiso)
                                                                        checked
                                                                      @endif

                                                                  @endif>  Firmo el compromiso</td>
        </tr>
           @endforeach
        </tbody>
      </table>
   <br>
   <br>
   <div class="btn-group">
      <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
      </form>
    </div>
    </div>
  </div>
</div>

@endsection
