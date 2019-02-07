$(document).ready(function() {
	
		var state_work, id_order, id_prod, id_worker, prod_name;

	$('.terminal-product-box').click(function() {
		
		state_work = $(this).attr('state_work');
		id_order = $(this).attr('id_order');
		id_prod = $(this).attr('id_prod');
		id_worker = $(this).attr('id_worker');
		prod_name = $(this).find('.info-product').text();
		
		if (state_work == 1) {
			location.href = '/terminal/start_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker;
		}
		else {
			$('#terminal-products-wrp').hide();
			$('#terminal-wrp h3').hide();
			$('#actions-box-wrp').show();
			$('#actions-info-product').text(prod_name);
		}
	});
	
	//exit action box
	$('#exit-actions-box').click(function() {
		$('#terminal-products-wrp').show();
		$('#actions-box-wrp').hide();
	});

    //end work
    $('#prod-state-made').click(function() {
        location.href = '/terminal/end_work?id_order=' + id_order + '&id_prod=' + id_prod;
    });
	
	 //stop work
    $('#prod-state-stop').click(function() {
        location.href = '/terminal/stop_work?id_order=' + id_order + '&id_prod=' + id_prod;
    });
});