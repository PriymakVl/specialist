$(document).ready(function() {

    $('#order-delete').click(function(e) {

        e.preventDefault();

        var id_order = $(this).attr('id_order');
		
		var agree = confirm('Вы действительно хотите удалить заказ?');

        if (agree) location.href = '/order/delete?id_order=' + id_order;
        
    });

});