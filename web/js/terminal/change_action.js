$(document).ready(function() {
	$('#filter-actions-wrp #actions').change(function() {
		var action;

		action = $(this).val();

		location.href = '/terminal/actions?action=' + action;

	});
});