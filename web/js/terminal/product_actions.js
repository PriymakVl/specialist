$(document).ready(function() {
	
		var state, id_order, id_prod, id_worker, prod_name;

	$('.terminal-product-box').click(function() {
		
		state = $(this).attr('prod_state');
		id_order = $(this).attr('id_order');
		id_prod = $(this).attr('id_prod');
		id_worker = $(this).attr('id_worker');
		prod_name = $('.info-product').text();
		console.log(prod_name);
		return;
		
		if (state == 1) {
			alert('Взять в работу');
			location.href = '/terminal/to_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker;
		}
		//else $('#box_actions_product').show();
		else {
			$('#terminal-products-wrp').hide();
			$('#actions-box-wrp').show();
			$('#actions-info-product').text(prod_name);
		}
	});
	
	//exit action box
	$('#exit-actions-box').click(function() {
		$('#terminal-products-wrp').show();
		$('#actions-box-wrp').hide();
	});
});