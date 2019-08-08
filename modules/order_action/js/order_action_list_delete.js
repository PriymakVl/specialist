$(document).ready(function() {

	$('#order-action-list-delete').click(function(event) {
		event.preventDefault();
		var actions = $('[name="actions"]:checked');
		var ids = '';
		var id_order = new URL(location).searchParams.get("id_order");

		if (actions.length < 1) return alert('Вы не выбрали операции');

		for (i = 0; i < actions.length; i++) {
			ids += actions[i].getAttribute('id_action') + ',';
		}
		
		var agree = confirm('Вы действительно хотите удалить указанные операции?');
		if (!agree) return;
		location.href = '/order_action/delete_list?ids=' + ids + '&id_order=' + id_order;

	});
	
});