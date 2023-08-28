@extends('layout.panel')


@section('css')
<style>
  /* Estilos para el mensaje de alerta */
  .alert {
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
  }
  #botonPago {
  background-color: #3498db; /* Color normal */
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

#botonPago.pagoEfectuado {
  background-color: #2ecc71; /* Color cuando el pago está efectuado */
}

.alert {
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
  }

  
</style>

@endsection


@section('content')
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Pago a Realizar</h3>
        </div>
        <div class="col text-right">
          <a href="{{Route('vistapago.index')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>Regresar</a>
        </div>
      </div>
    </div>
    <!-- Formulario para crear -->
    <div class="card-body">
      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          {{ session('notification') }}
        </div>
      @endif

      <form action ="{{ route('pagorealizar.store', ['id_alumno' => $alumno->id])}}" method="POST">
        @csrf <!-- Agrega el token CSRF para proteger el formulario -->
        <table class="table table-bordered">
          <tbody>
      
          </tr>
          <tr>
            <th scope="row">Mensualidad</th>
            <th scope="col"><center><input type="checkbox" name="mensualidad" value="1" 
              {{ $alumno->mensualidad ? 'checked': '' }}  ></center></th>
          </tr>
          
            <tr>
              <th scope="row">Gastos administrativos</th>
              <td><center><input type="checkbox" name="pagosadministrativos" value="1"
              {{ $alumno->pagosadministrativos ? 'checked': '' }}></center></td></tr>
            </tr>
            <tr>
              <th scope="row">Bolsa escolar</th>
              <td><center><input type="checkbox" name="bolsaescolar" value="1" 
              {{ $alumno->bolsaescolar ? 'checked': '' }} ></center></td>
            </tr>
          </tbody>
        </table>
        <br>
        <br>
        <button  type="submit" class="btn btn-primary btn-lg">Guardar</button>
    
</div>

<script>
  // Obtener referencia al botón y al mensaje de alerta
  var botonPago = document.getElementById("botonPago");
  var alertaPago = document.getElementById("alertaPago");
  // Agregar un evento al botón para mostrar el mensaje de alerta
  botonPago.addEventListener("click", function() {
    const pagosRealizados = [];

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkbox.disabled = true;
            pagosRealizados.push(checkbox.id);
        }
    });

    if (pagosRealizados.length > 0) {
        mensaje.textContent = "Pagos realizados para: " + pagosRealizados.join(", ");

    // Mostrar el mensaje de alerta
    alertaPago.style.display = "block";
    
    // Ocultar el mensaje después de unos segundos (ejemplo: 3 segundos)
    setTimeout(function() {
      alertaPago.style.display = "none";
    }, 3000); // 3000 milisegundos = 3 segundos
  }  );
</script>
      </form>
    </div>
  </div>
@endsection
