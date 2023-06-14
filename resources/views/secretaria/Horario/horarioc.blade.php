@extends('layout.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h1 class="mb-0">Horario</h1>
            </div>
            <div class="col text-right">
            <a href="{{route('configuracion.index')}}" class="btn btn-lg btn-success">
                <i class="fas fa-angle-left"></i>
                Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- inicio formulario -->

        <form class="row g-3 mt-3" action="{{route('horario.store')}}" method="POST">
          @csrf
        <div class="form-group col-2 mt-3">
            <label for="jornada">Jornada:</label>
        </div>

        <div class="col-4 mt-3">
            <select type="text" id="jornada" name="jornada" class="form-control" required>
            <option value="">Elegir</option>
            <option value="matutina">Matutina</option>
            <option value="extendida">Extendida</option>
         </select>
         <div class="valid-feedback"></div>
        </div>

        <div class="form-group col-2 mt-3">
            <label for="descripcion">Descripcion:</label>
        </div>
        <div class="col-4 mt-3">
            <input type="text" id="descripcion" name="descripcion" class="form-control"
            placeholder="Ingrese una descripcion">
            <div class="valid-feedback"></div>
        </div>


        <table id="tabla" class="table align-items-center table-flush">
          <thead>
          <tr>
          <th>Hora Inicial</th>

          <th>Hora Final</th>

          <th><button type="submit" class="btn btn-secondary" onclick="agregarFila()">+ Agregar</button></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <div class="input-group">
                <input type="time" class="form-control" name="horaInicial[]">


                <div class="input-group-append">
                    <select name="ampmInicial[]">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input type="time" class="form-control" name="horaFinal[]" >

                <div class="input-group-append">
                    <select name="ampmFinal[]">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
            </div>
        </td>

        <td>
            <button type="button" class="btn btn-danger" onclick="quitarFila(this)">Quitar</button>
        </td>
    </tr>
  </tbody>
</table>

<script src="/js/agregarFila.js"></script>
<script>

  function agregarFila() {
    const tbody = document.querySelector('#tabla tbody');
    const fila = document.createElement('tr');

    fila.innerHTML = `
    <td>
            <div class="input-group">
                <input type="time" class="form-control" name="horaInicial[]" />
                <div class="input-group-append">
                    <select name="ampmInicial[]">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input type="time" class="form-control" name="horaFinal[]" />
                <div class="input-group-append">
                    <select name="ampmFinal[]">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
            </div>
        </td>

        <td>
            <button type="button" class="btn btn-danger" onclick="quitarFila(this)">Quitar</button>
        </td>
    `;
    tbody.appendChild(fila);
  }
</script>

<script>
    function quitarFila(boton) {
        const fila = boton.closest('tr');
        fila.remove();
    }
</script>
    <div class="col text-left">
    <button type="submit" class="btn btn-primary" name="action" value="guardar">Guardar</button>
    </div>
     </form>
    </div>
</div>


@endSection
