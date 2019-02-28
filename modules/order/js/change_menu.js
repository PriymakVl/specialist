$(document).ready(function() {

	$('[for = tab-1]').click(function() {
		$('#menu-order-content').hide();
		$('#menu-order-actions').hide();
		$('#menu-order').show();
	});
	
	$('[for = tab-2]').click(function() {
		$('#menu-order-content').show();
		$('#menu-order').hide();
		$('#menu-order-actions').hide();
	});
	
	$('[for = tab-3]').click(function() {
		$('#menu-order-content').hide();
		$('#menu-order').hide();
		$('#menu-order-actions').show();
	});
});