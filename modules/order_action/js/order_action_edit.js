$(document).ready(function() {

	$('#order-action-edit, #order-product-action-edit, #plan-action-edit').click(function(event) {
		event.preventDefault();
		
		var action = $('[name="actions"]:checked');
		if (action.length > 1) return alert('Редактировать можно только одну операцию');
		var id_action = action.attr('id_action');
		if (!id_action) return alert('Вы не выбрали операцию');
		
		var id_name = $(this).attr('id');
		if (id_name == 'order-action-edit') location.href = '/order_action/edit?sent=order&id_action=' + id_action;
		else if (id_name == 'order-product-action-edit') location.href = '/order_action/edit?sent=product&id_action=' + id_action;
		else location.href = '/order_action/edit?id_action=' + id_action;
	});
	
});