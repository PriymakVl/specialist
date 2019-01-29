$(document).ready(function() {

    $('#order-to-work').click(function(e) {

        e.preventDefault();

        var id_order;

        var order = $('table :checked');

        if (order.length == 0) {
            alert('Вы не выбрали заказ');
            return;
        }
        else if (order.length > 1) {
            alert('Выдать в работу можно только по одному заказу');
            return;
        }

        id_order = order[0].getAttribute('id_order');

        location.href = '/order/to_work?id_order=' + id_order;
    });

});