$(document).ready(function() {
	$('.order-box').click(function() {
		var id_order;
		
		id_order = $(this).attr('id_order');
		location.href = '/terminal/products?id_order=' + id_order;
	});
});