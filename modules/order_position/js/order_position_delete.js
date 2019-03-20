$(document).ready(function() {
	$('.order-position-delete').click(function(event) {
		event.preventDefault();
		var id_position = $(this).attr('id_position');
		var agree = confirm('Вы действительно хотите удалить позицию заказа?');
		if (agree) location.href = '/order_position/delete?id_position=' + id_position;
	});
});