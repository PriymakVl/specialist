$(document).ready(function() {
	$('#filter-actions-wrp #actions').change(function() {
		var id_action;
		
		id_action = $(this).val();

		if (id_action) location.href = '/terminal/actions?id_action=' + id_action;
		else location.href = '/terminal/actions?all_actions=all';
	});
});