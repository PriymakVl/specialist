$(document).ready(function() {
	const STATE_WORK = 3;
	const STATE_WAITING = 7;
	
	$('#order-to-waiting').click(function(event) {
		event.preventDefault();
		var id_order = $('.list-orders :radio:checked').attr('id_order');
		if (!id_order) {
			alert('Вы не выбрали заказ');
			return;
		}
		var params = getObjectGetParams();
		location.href = '/plan/edit_state_order?id_order=' + id_order + '&state=' + STATE_WAITING + '&type=' + params.type;
	});
	
	$('#order-to-work').click(function(event) {
		event.preventDefault();
		var id_order = $('.list-orders :radio:checked').attr('id_order');
		if (!id_order) {
			alert('Вы не выбрали заказ');
			return;
		}
		var params = getObjectGetParams();
		location.href = '/plan/edit_state_order?id_order=' + id_order + '&state=' + STATE_WORK + '&type=' + params.type;
	});

});
