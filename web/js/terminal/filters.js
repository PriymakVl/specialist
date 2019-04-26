$(document).ready(function() {
	//actions
	$('#filters-wrp #filter-actions').change(function() {
		var action = $(this).val();
		var params = getObjectGetParams();
		if (!action) location.href = '/terminal/actions';
		else if (params.type_order) location.href = '/terminal/actions?action=' + action + '&type_order=' + params.type_order;
		else if (params.id_order) location.href = '/terminal/actions?action=' + action + '&id_order=' + params.id_order;
		else location.href = '/terminal/actions?action=' + action;
	});
	
	//orders
	$('#filters-wrp #filter-orders').change(function() {
		var id_order = $(this).val();
		var params = getObjectGetParams();
		if (params.action) location.href = '/terminal/actions?id_order=' + id_order + '&action=' + params.action;
		else location.href = '/terminal/actions?id_order=' + id_order;
	});
	
	//type order
	$('#filters-wrp #filter-type-order').change(function() {
		var type_order = $(this).val();
		var params = getObjectGetParams();
		if (params.action) location.href = '/terminal/actions?type_order=' + type_order + '&action=' + params.action;
		else location.href = '/terminal/actions?type_order=' + type_order;;
	});
});