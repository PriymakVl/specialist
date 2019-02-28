$(document).ready(function() {
	//delete order actions
	$('#order-action-delete').click(function() {
	var id_action = $('[name="actions"]:checked').attr('id_action');
	
		if (!id_action) return alert('Вы не выбрали операцию');
		var agree = confirm('Вы действительно хотите удалить указанную операцию?');
		
		if (agree) location.href = '/order_action/delete?id_action=' + id_action;
	});
	
	
	//edit order actions
	$('#order-action-edit').click(function() {
	var id_action = $('[name="actions"]:checked').attr('id_action');
		if (!id_action) return alert('Вы не выбрали операцию');
		location.href = '/order_action/edit?id_action=' + id_action;
	});
});