$(document).ready(function() {

	//edit state order actions
	$('#order-action-edit-state').click(function() {
		event.preventDefault();
		var actions = $('[name="actions"]:checked');
		ids_str = get_ids_str(actions);

		if (!ids_str) return alert('Вы не выбрали операцию');
		location.href = '/order_action/edit_state_group?ids=' + ids_str;
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