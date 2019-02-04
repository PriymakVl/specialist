$(document).ready(function() {

	$('.terminal-product-box').click(function() {
		
		var state = $(this).attr('prod_state');
		var id_order = $(this).attr('id_order');
		var id_prod = $(this).attr('id_prod');
		var id_worker = $(this).attr('id_worker');
		
		if (state == 1) {
			alert('Взят в работу');
			location.href = '/terminal/to_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker;
		}
		else $('#box_actions_product').show();
	});
});