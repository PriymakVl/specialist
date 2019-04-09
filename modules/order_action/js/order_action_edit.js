$(document).ready(function() {

	$('#order-action-edit').click(function() {
	var id_action = $('[name="actions"]:checked').attr('id_action');
	
		if (!id_action) return alert('Вы не выбрали операцию');

		location.href = '/order_action/edit?sent=order&id_action=' + id_action;
	});
	
});