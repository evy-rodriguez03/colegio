@extends('layout.panel')


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Agregar Nuevo Personal</h3>
        </div>
        <div class="col text-right">
          <a href="{{route('alumnos.index')}}" class="btn btn-sm btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>¡Porfavor!</strong> {{$error}}
        </div>
          @endforeach
      @endif
        <form action="{{route('usuarios.index')}}" method="POST">
          @csrf
          <div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="primernombre">Primer Nombre</label>
                  <input type="text" class="form-control" name="primernombre" placeholder="Primer nombre"  required>
                  <div class="valid-feedback">
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="segundonombre">Segundo Nombre</label>
                  <input type="text" class="form-control" name="segundonombre" placeholder="Segunda nombre"  required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
          </div>
          <div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="primerapellido">Primer Apellido</label>
                  <input type="text" class="form-control" name="primerapellido" placeholder="Primer Apellido" required>
                  <div class="valid-feedback">
                    #
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="segundoapellido">Segundo Apellido</label>
                  <input type="text" class="form-control" name="segundoapellido" placeholder="Segundo Apellido"  required>
                  <div class="valid-feedback">
                    #
                  </div>
                </div>
                <div>
                    <div class="form-row">
                        <div class="col-md-6 mb-5">
                          <label for="numerodeidentidad">Número de identidad</label>
                          <input type="text" class="form-control" name="numerodeidentidad" placeholder="Número de identidad" required>
                          <div class="invalid-feedback">
                            #
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="fechadenacimiento">Fecha</label>
                          <input type="date" class="form-control" name="fechadenacimiento"  required>
                          <div class="invalid-feedback">
                            #
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="alergia">Alergia</label>
                          <input type="text" class="form-control" name="alergia"  placeholder="Alergia" required>
                          <div class="invalid-feedback">
                            #
                          </div>
                        </div>
                      </div>
                      <div>
                        <div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                  <label for="lugardenacimiento">Lugar de nacimiento</label>
                                  <input type="text" class="form-control" name="lugardenacimiento" placeholder="Lugar de nacimiento"  required>
                                  <div class="valid-feedback">
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label for="genero">Genero</label>
                                  <input type="text" class="form-control" name="genero" placeholder="Genero"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="direccion">Dirección</label>
                                    <input type="Text" class="form-control" name="direccion" placeholder="Direccion"  required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                  </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-4 mb-3">
                              <label for="numerodehermanosenicgc">Hermanos en ICGC</label>
                              <input type="text" class="form-control" name="numerodehermanosenicgc" placeholder="Numero de hermanos en ICGC" required>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="telefonodelencargado">Telefono del encargado</label>
                              <input type="text" class="form-control" name="telefonodelencargado" placeholder="Telefono del encargado" required>
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="nombredelmedico">Nombre del medico</label>
                              <input type="text" class="form-control" name="nombredelmedico" placeholder="Nombre del medico" required>
                            </div>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                            
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                          </div>
                      </div>


                </div>
                <button type="button" class="btn btn-primary">Guardar</button>
          </div>
      
        </form>
    </div>
  </div>
@endsection