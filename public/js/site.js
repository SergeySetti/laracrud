$(function () {
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
    
    $('.good-edit-form').on('submit', function () {

        $('.errors-here li').remove();
        $('.success-here li').remove();
        
        $.post('/good/store', $(this).serialize(), function(result){
            var res = result;
            
            if(result.status == false) {
               for(var message in result.errors) {
                   $('.errors-here').append("<li>"+result.errors[message][0]+"</li>");
               }
            } else {
                $('.success-here').append("<li>Товар сохранён</li>");
            }
        });
        
        return false;
    });
});