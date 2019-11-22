//select con buscador select2
$(document).ready(function() {
  $('.select2').select2({
      placeholder: 'Escriba aqui el nombre: ',
      language: {
          //boton para agregar nuevo al no encontrar resultados
          //para definir la accion a realizar al hacer click, se debe crear un metodo noResultsButtonClicked()
        noResults: function() {
          return '<button id="no-results-btn" class="btn btn-info" onclick="noResultsButtonClicked()">No se encontro resultado. Click para agregar</a>';
        },
      },
      escapeMarkup: function(markup) {
        return markup;
      },
    });
});

$(document).ready( function () {  
  $('#dataTableMesaEntrada').DataTable( {
   language: {
       search: "Buscar en la tabla:",
       info: "Mostrando _TOTAL_ elementos",
       infoEmpty: "Mostrando _TOTAL_ elementos",
       infoFiltered: "(Filtrado de un total de _MAX_)",
       zeroRecords: '<button id="no-results-btn" class="btn btn-info" onclick="noResultsButtonClicked()">No se encontro resultado. Click para agregar</a>',
       lengthMenu: "Mostrar _MENU_ entradas",
       paginate: {
       first: "Primero",
       last: "Ultimo",
       next: "Siguiente",
       previous: "Anterior"
   },
   }
} );

$('#dataTable').show(3000);
} );

function noResultsButtonClicked() {
    location.href='mesa-entrada/create'
  }