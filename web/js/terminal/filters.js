$(document).ready(function() {
	$('#filters-wrp #filter-actions').change(function() {
		var action = $(this).val();
		var params = getObjectGetParams();
		var request = '/terminal/actions?action=' + action;
		if (params.order) request = request + '&order=' + params.order;
		location.href = request;
	});
	
	$('#filters-wrp #filter-orders').change(function() {
		var order = $(this).val();
		var params = getObjectGetParams();
		var request = '/terminal/actions?order=' + order;
		if (params.action) request = request + '&action=' + params.action;
		location.href = request;
	});
});