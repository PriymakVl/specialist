$(document).ready(function() {
	$('#plan-level-filter').change(function() {
		var level = $(this).val();
		var params = getObjectGetParams();
		if (level == 'orders') location.href = '/plan/orders?type_order=' + params.type_order;
		else if (level == 'products') location.href = '/plan/products?type_order=' + params.type_order;
		else location.href = '/plan/actions?type_order=' + params.type_order;
	});

});

