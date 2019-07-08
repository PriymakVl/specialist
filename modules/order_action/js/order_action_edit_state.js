$(document).ready(function() {

	//edit state order actions
	$('#order-action-edit-state').click(function() {
		event.preventDefault();
		var actions = $('[name="actions"]:checked');
		if (actions.length < 1) return alert('Вы не выбрали операцию');

		if (actions.length == 1) {
			var id_action = $(actions).attr('id_action');
			var id_prod = $(this).attr('id_prod');
			return location.href = '/order_action/edit_state_one?id_action=' + id_action + '&id_prod=' + id_prod;
		}
		
		var id_order = $(this).attr('id_order');
		ids_str = get_ids_str(actions);
		location.href = '/order_action/edit_state_group?ids=' + ids_str + '&id_order=' + id_order;
	});
});

function get_ids_str(actions) {
	if (!actions) return false;
	var id_action, ids_str = '';
	for (var i = 0; i < actions.length; i++) {
		id_action = actions[i].getAttribute('id_action');
		if (id_action) ids_str += id_action + ',';
	}
	return ids_str.slice(0, -1);
}