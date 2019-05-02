$(document).ready(function() {

	$('#order-action-delete, #order-product-action-delete, #plan-action-delete').click(function(event) {
		event.preventDefault();
		var id_action = $('[name="actions"]:checked').attr('id_action');
		var id_name = $(this).attr('id');

		if (!id_action) return alert('Вы не выбрали операцию');
		var agree = confirm('Вы действительно хотите удалить указанную операцию?');
		if (!agree) return;
		
		if (id_name == 'order-action-delete') location.href = '/order_action/delete?sent=order&id_action=' + id_action;
		else if (id_name == 'order-product-action-delete') location.href = '/order_action/delete?sent=product&id_action=' + id_action;
		else location.href = '/order_action/delete?id_action=' + id_action;
	});
	
});