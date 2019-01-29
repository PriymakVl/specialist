$( document ).ready(function() {

    //order is preparation, is problem
    $('#order-highlight, #order-problem').click(function() {

        var kind, order_id, type_order, ids = '';

        kind = $(this).attr('kind');
        type_order = $('#filter-type').val();

        $('table input:checked').each(function() {
            order_id = $(this).attr('order_id');
            if (order_id) ids += order_id + ',';
        });
        if (!ids) {
            alert('Вы не выбрали заказ');
            return;
        }
        location.href = 'http://' + location.host + '/order/kind?ids=' + ids + '&kind=' + kind + '&type=' + type_order;
    });
});