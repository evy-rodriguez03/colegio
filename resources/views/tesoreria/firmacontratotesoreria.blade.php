@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Firma de Contrato</h3>
        </div>

        <div class="col text-right">
            <a href="{{Route('paneltesoreria.index')}}" class="btn btn-lg btn-success">
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

        <form action ="{{ route('firmacontratotesoreria.store')}}" method="POST">
      @csrf
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre del Padre</th>
            <th scope="col">Firma del contrato</th>
          </tr>
        </thead>
    


        <tbody>

        @foreach ($padres as $index=> $padre)
        <tr>
            <input name='id_padre[]' value="{{$padre->id}}" type="text" style="display: none">
             <td>  {{$index + 1}}</td>
            <td> {{$padre->primernombre}} {{$padre->primerapellido}}</td>
             <td>
              <input type="checkbox" name="contrato[]" value="1" @if (isset($padre->firmacontrato[0]))
                                                                      @if($padre->firmacontrato[0]->contrato)
                                                                        checked
                                                                      @endif

                                                                  @endif>  Firmo el contrato</td>

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
