$(document).ready(function() {

	$('[for = tab-1]').click(function() {
		$('#menu-order-content').hide();
		$('#menu-order').show();
	});
	
	$('[for = tab-2]').click(function() {
		$('#menu-order-content').show();
		$('#menu-order').hide();
	});
});