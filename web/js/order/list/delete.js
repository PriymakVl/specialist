$( document ).ready(function() {

        var order_id, agree, type_order, ids = '';

        $('#order-delete').click(function() {
            var items = $('table :checkbox:checked');

            $('table input:checked').each(function() {
                order_id = $(this).attr('order_id');
                if (order_id) ids += order_id + ',';
            });

            if (!ids) {
                alert('Вы не выбрали заказ');
                return;
            }
            else {
                agree = confirm('Вы действительно хотите удалить заказ(ы)');
                if (!agree) return;
            }

            type_order = $('#filter-type').val();

            location.href = 'http://' + location.host + '/order/delete?ids=' + ids + '&type=' + type_order;
        });
});