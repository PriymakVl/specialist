$(document).ready(function() {

	//delete order action unplan
	$('#order-action-unplan-delete').click(function() {
	
		var id_action_unplan = $('[name="actions_unplan"]:checked').attr('id_action');
	
		if (!id_action_unplan) return alert('Вы не выбрали внеплановую операцию');
		var agree = confirm('Вы действительно хотите удалить указанную операцию?');
		var id_order = $(this).attr('id_order');

		if (agree) location.href = '/order_action/delete?id_action_unplan=' + id_action_unplan + '&id_order=' + id_order;
	});
});