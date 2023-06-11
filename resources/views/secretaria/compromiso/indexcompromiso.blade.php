@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Compromiso Conducta</h3>
        </div>
        
        <div class="col text-right">
            <a href="{{Route('dashboardsec.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>




      </div>
    </div>
    <div class="card-body">
     @if (session('notification'))
     <div class="alert alert-success" role="alert">
      {{session('notification')}}
  </div>
     @endif
    </div>
    <div class="table-responsive">
      <!-- Projects table -->

      <form action ="{{ route('indexcompromiso.store')}}" method="POST">
      @csrf

      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Id</th>
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
   <div class="col text-left">
      <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
      </form>
    </div>
    </div>
  </div>
@endsection
