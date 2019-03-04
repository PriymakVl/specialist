$(document).ready(function() {
	//info
	$('[for = tab-1]').click(function() {
		$('#menu-order').show();
		$('#menu-order-content').hide();
		$('#menu-order-actions').hide();
		$('#menu-order-actions-unplan').hide();
	});
	
	//content
	$('[for = tab-2]').click(function() {
		$('#menu-order-content').show();
		$('#menu-order').hide();
		$('#menu-order-actions').hide();
		$('#menu-order-actions-unplan').hide();
	});
	
	//actions
	$('[for = tab-3]').click(function() {
		$('#menu-order-actions').show();
		$('#menu-order-content').hide();
		$('#menu-order').hide();
		$('#menu-order-actions-unplan').hide();
	});
	
	//actions unplan
	$('[for = tab-4]').click(function() {
		$('#menu-order-actions-unplan').show();
		$('#menu-order-content').hide();
		$('#menu-order').hide();
		$('#menu-order-actions').hide();
	});
});