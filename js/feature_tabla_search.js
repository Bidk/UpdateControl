	
	$(document).ready(function() {
		
    $('.tablaAdmin').dataTable( {
		"pagingType": "full_numbers",
		"ordering": false,
		 "columnDefs": [
                { type: "string", targets: 0 },
				{ type: "string", targets: 1 },
				{ type: "string", targets: 2},
				{ type: "string", targets: 3},
				{ type: "string", targets: 4},
				{ type: "string", targets: 5},
				{ type: "string", targets: 6},
				{ type: "string", targets: 7},
				{ type: "string", targets: 8},
				{ type: "string", targets: 9},					
				{ type: "string", targets: 10},
				{ type: "string", targets: 11},
				{ type: "string", targets: 12}				
            ]  ,
			
			"language":{
    "emptyTable":     "No hay datos disponibles",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtrado de un total de _MAX_ registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "cargando...",
    "processing":     "procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se ha encontrado ninguna coincidencia",
    "paginate": {
        "first":      "Inicio",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    }
}
} );


} );