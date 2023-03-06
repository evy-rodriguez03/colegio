$(document).ready(function() {
    // Seleccionamos la tabla
    var tablaAlumnos = $('.tabla-alumnos');
  
    // Agregamos la clase "table-hover" para resaltar las filas al pasar el mouse por encima
    tablaAlumnos.addClass('table-hover');
  
    // Agregamos un listener al evento "click" en las filas de la tabla
    tablaAlumnos.find('tr').click(function() {
      // Obtenemos el texto de la segunda columna (cantidad de alumnos)
      var cantidadAlumnos = $(this).find('td:eq(1)').text();
  
      // Mostramos un mensaje con la cantidad de alumnos
      alert('La cantidad de alumnos en esta fecha es: ' + cantidadAlumnos);
    });
  });