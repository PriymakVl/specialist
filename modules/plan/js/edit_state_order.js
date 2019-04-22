$(document).ready(function() {
	
	$('.edit-order-state').click(function(event) {
		event.preventDefault();
		var id_order = $('.list-orders :radio:checked').attr('id_order');
		var state = $(this).attr('state');
		if (!id_order) {
			alert('Вы не выбрали заказ');
			return;
		}
		var params = getObjectGetParams();
		location.href = '/plan/edit_state?id_order=' + id_order + '&state=' + state + '&type_order=' + params.type_order;
	});
	
});
