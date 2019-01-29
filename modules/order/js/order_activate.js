$(document).ready(function() {

    $('#order-activate').click(function(e) {

        e.preventDefault();

        var id_order;

        var order = $('table :checked');

        if (order.length == 0) {
            alert('Вы не выбрали заказ');
            return;
        }
        else if (order.length > 1) {
            alert('Сделать активным можно только одну заказ');
            return;
        }

        id_order = order[0].getAttribute('id_order');

        location.href = '/order/activate?id_order=' + id_order;
    });

});