$(document).ready(function() {
	const STATE_PLANED = 1;
	const STATE_WAITING = 5;
	
	$('#action-to-work').click(function(event) {
		event.preventDefault();
		sentRequestAction(STATE_PLANED);
	});
	
	$('#action-to-waiting').click(function(event) {
		event.preventDefault();
		sentRequestAction(STATE_WAITING);
	});
});

function sentRequestAction($state)
{
	var id_action = $('#plan-actions-wrp :radio:checked').attr('id_action');
	if (!id_action) {
		alert('Вы не выбрали операцию');
		return;
	}
	var params = getObjectGetParams();
	location.href = '/plan/edit_state?id_action=' + id_action + '&state=' + $state + '&type_order=' + params.type_order;
}