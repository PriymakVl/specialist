$(document).ready(function() {

	$('#plan-action-add-worker').click(function(event) {
		event.preventDefault();
		var id_action = $('[name="actions"]:checked').attr('id_action');

		if (!id_action) return alert('Вы не выбрали операцию');
		
		location.href = '/order_action/add_worker?id_action=' + id_action;
	});
	
});