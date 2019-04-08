$(document).ready(function() {
	//info
	$('[for = tab-1]').click(function() {
		$('#order-menu-wrp').show();
		$('#order-products-menu-wrp').hide();
		$('#order-actions-menu-wrp').hide();
	});
	
	//products
	$('[for = tab-2]').click(function() {
		$('#order-menu-wrp').hide();
		$('#order-products-menu-wrp').show();
		$('#order-actions-menu-wrp').hide();
	});
	
	//actions
	$('[for = tab-3]').click(function() {
		$('#order-menu-wrp').hide();
		$('#order-products-menu-wrp').hide();
		$('#order-actions-menu-wrp').show();
	});
	
});