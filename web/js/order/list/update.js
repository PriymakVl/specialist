$( document ).ready(function() {

    var items, order_id;

    $('#order-update').click(function() {

        var items = $('table :checkbox:checked');


        if (!items[0]) {
            alert('Вы не выбрали заказ');
            return;
        }
        else if (items.length > 1) {
            alert('Можно отредактировать только 1 заказ');
            return;
        }

        order_id = items[0].getAttribute('order_id');

        location.href = 'http://' + location.host + '/order/update?order_id=' + order_id;
    });
});