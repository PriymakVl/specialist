$(document).ready(function() {
	
		var state, id_order, id_prod, id_worker, prod_name, state;

	$('.terminal-product-box').click(function() {
		
		state = $(this).attr('prod_state');
		id_order = $(this).attr('id_order');
		id_prod = $(this).attr('id_prod');
		id_worker = $(this).attr('id_worker');
		prod_name = $(this).find('.info-product').text();
		
		if (state == 1) {
			location.href = '/terminal/to_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker;
		}
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

    //change state product
    $('#prod-state-made, #prod-state-made').click(function() {
        location.href = '/terminal/change_state_work?id_order=' + id_order + '&id_prod=' + id_prod + '&state=' + state;
    });
});