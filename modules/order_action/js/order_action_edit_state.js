$(document).ready(function() {

	//edit order actions
	$('#order-action-edit-state').click(function() {
	var id_action = $('[name="actions"]:checked').attr('id_action');
		if (!id_action) return alert('Вы не выбрали операцию');
		location.href = '/order_action/edit_state?id_action=' + id_action;
	});
});