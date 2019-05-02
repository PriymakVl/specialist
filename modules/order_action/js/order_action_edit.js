$(document).ready(function() {

	$('#order-action-edit, #order-product-action-edit, #plan-action-edit').click(function(event) {
		event.preventDefault();
		var id_action = $('[name="actions"]:checked').attr('id_action');
		var id_name = $(this).attr('id');
		if (!id_action) return alert('Вы не выбрали операцию');

		if (id_name == 'orderr-action-edit') location.href = '/order_action/edit?sent=order&id_action=' + id_action;
		else if (id_name == 'orderr-product-action-edit') location.href = '/order_action/edit?sent=product&id_action=' + id_action;
		else location.href = '/order_action/edit?id_action=' + id_action;
	});
	
});