/*
Скрипт для генерации таблицы с
возможностью выгрузки данных
*/
$(document).ready(function () {
    $('#toExport').DataTable({
        dom      : 'Bfrtip',
        buttons  : [
            'excelHtml5',
            {
                extend     : 'pdfHtml5',
                // orientation: 'landscape',
                pageSize   : 'LEGAL'
            }
        ],
        searching: false,
        ordering : false,
        paging   : false,
        "info"   : false
    });
});

$(document).ready(function () {
    $('#dataTable').DataTable({
        dom      : 'Bfrtip',
        // buttons  : [
        //     'excelHtml5',
        //     {
        //         extend     : 'pdfHtml5',
        //         orientation: 'landscape',
        //         pageSize   : 'LEGAL'
        //     }
        // ],
        searching: false,
        ordering : false,
        paging   : false,
        "info"   : false
    });
});