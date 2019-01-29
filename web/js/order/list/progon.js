$( document ).ready(function() {

    var number_row = 2;

    $('#order-progon').click(function() {

        var order_id, type_order, ids = '';
        const TYPE_ORDER_PACKET = 1;
        const TYPE_ORDER_GLASS = 2;

        type_order = $('#filter-type').val();

        $('table input:checked').each(function() {
            order_id = $(this).attr('order_id');
            if (order_id) ids += order_id + ',';
        });

        if (!ids) {
            alert('Вы не выбрали заказ');
            return;
        }

        $('input[name="ids"]').val(ids);

        $('#fade').fadeIn();
        if (type_order == TYPE_ORDER_PACKET) $('#form-progon-packet-wrp').fadeIn();
        else $('#form-progon-glass-wrp').fadeIn();
    });

    $('.progon-close').click(function() {
        $('#fade').fadeOut();
        $('#form-progon-packet-wrp, #form-progon-glass-wrp').fadeOut();
    });

    //add next row with inputs for pgogons
    $('#progon-add').click(function() {
        $('#form-progon-packet-wrp table').append('<tr><td>' + number_row + '</td><td><input type="text" name="packet[]"></td><td><input type="text" name="temp[]"></td><td><input type="text" name="emalit[]"></td></tr>');
        number_row++;
    });
});


// var order_id, state, ids = '';
//
// state = $(this).attr('state');
//
// $('table input:checked').each(function() {
//     order_id = $(this).attr('order_id');
//     if (order_id) ids += order_id + ',';
// });
// if (!ids) {
//     alert('Вы не выбрали заказ');
//     return;
// }
// location.href = 'http://' + location.host + '/order/state?ids=' + ids + '&state=' + state;