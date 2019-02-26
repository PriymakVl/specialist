$(document).ready(function() {
	$('#filter-actions-wrp #actions').change(function() {
		var id_action;
		
		id_action = $(this).val();

		location.href = '/terminal/actions?id_action=' + id_action;

	});
});