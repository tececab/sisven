$(document).ready(function () {
    ConfigGridJSON();
//    ConfigDatePickerRangeReport();

//    ConfigDatePickersReporte('.txtFechaConsumo');

//    var fechaHoy = new Date();
//    $(".txtFechaConsumo").datepicker("setDate", new Date(fechaHoy.getFullYear(), fechaHoy.getMonth(), 1));


    $("#btnLimpiar").click(function () {
        $("#ReporteVentasConsumosxMesForm_mes").val('');
        $("#tblGrid").jqGrid("clearGridData", true).trigger("reloadGrid");

//        var maxDate = new Date();
//        $('.txtFechaConsumo').datepicker('setStartDate', null);
//        $('.txtFechaConsumo').datepicker('setEndDate', maxDate);
//
//        var fechaHoy = new Date();
//        $(".txtFechaConsumo").datepicker("setDate", new Date(fechaHoy.getFullYear(), fechaHoy.getMonth(), 1));

    });

    $("#btnExcel").click(function () {
        GenerarDocumentoReporte('GenerateExcel');
    });
});


function ConfigGridJSON() {
    jQuery("#tblGrid").jqGrid({
        loadonce: true,
        datatype: 'json',
        mtype: 'POST',
        colNames: [
            'VENDEDOR',
            'VENTAS',
            'VENTAS CON CONSUMO',
        ],
        colModel: [
            {name: 'VENDEDOR', index: 'VENDEDOR', width: 250, sortable: false, frozen: true},
            {name: 'VENTAS', index: 'VENTAS', width: 200, sortable: false, frozen: true},
            {name: 'CONSUMO', index: 'CONSUMO', width: 200, frozen: false, sortable: false, resizable: false},
        ],
        pager: '#pagGrid',
        rowNum: NroFilas,
        rowList: ElementosPagina,
        //sortname: 'bank_date',
        sortorder: 'ASC',
        viewrecords: true,
//        height: 'auto',
        height: 360,
//        width: 200,
        autowidth: true,
        gridview: true,
        shrinkToFit: false, //permite mantener la dimensi�n personalizada de las celdas,
        rownumbers: true,
        jsonReader: {
            root: "Result",
            repeatitems: false, //cuando el array de la data son object
            id: "id" //representa el �ndice del identificador �nico de la entidad
        },
        beforeRequest: function () {
//            blockUIOpen();
        },
        loadError: function (xhr, st, err) {
//            blockUIClose();
            // RedirigirError(xhr.status);
        }
//        ,
//        footerrow: true,
//        loadComplete: function () {
//            var sum = grid.jqGrid('getCol', 'VENTAS', false, 'sum');
//
//            grid.jqGrid('footerData', 'set', {invdate: 'Total:', VENTAS: sum});
//        }

    });

    jQuery("#tblGrid").jqGrid('navGrid', '#pagGrid',
            {add: false, edit: false, del: false, search: true, refresh: true, view: false}, //options 
    {}, // edit options 
            {}, // add options 
            {}, // del options 
            {multipleSearch: true, closeAfterSearch: true, closeOnEscape: true}//opciones search
    );
}

function GenerarDocumentoReporte(accion) {
    if ($("#ReporteVentasConsumoxMesForm_mes").val() != "") {
        window.open('/sisven/reporteventasconsumosxmes/' + accion + '?mes=' + $("#ReporteVentasConsumosxMesForm_mes").val());
    } else {
        mostrarVentanaMensaje("Ingrese los par�metros necesarios para generar el reporte", 'Alerta');
    }
}