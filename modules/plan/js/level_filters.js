$(document).ready(function() {
	$('#plan-level-filter').change(function() {
		var level = $(this).val();
		var params = getObjectGetParams();
		if (level == 'orders') location.href = '/plan/orders?type=' + params.type;
		else if (level == 'products') location.href = '/plan/products?type=' + params.type;
		else location.href = '/plan/actions?type=' + params.type;
	});

});

