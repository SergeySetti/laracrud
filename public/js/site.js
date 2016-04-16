$(function () {
    var tablesort = new Tablesort(document.getElementById('table-sortable'));
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('.form-filter').on('submit', function () {
        $.post($(this).action, $(this).serialize(), function(result){
            $('.orders-list').html(result);
        });
        tablesort.refresh();
        return false;
    });
});