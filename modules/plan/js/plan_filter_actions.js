$(document).ready(function() {
	//actions
	$('#plan-filter-actions').change(function() {
		var action = $(this).val();
		var params = getObjectGetParams();
		if (!action) location.href = '/plan/actions?type_order=' + params.type_order;
		else location.href = '/plan/actions?action=' + action + '&type_order=' + params.type_order;
	});
	
});