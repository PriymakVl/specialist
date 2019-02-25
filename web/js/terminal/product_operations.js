$(document).ready(function() {

		var state_work, id_order, id_prod, id_worker, prod_name;
		const STATE_WORK_PREPARATION = 1;
	//деталь взята в работу
	$('.terminal-action-box').click(function() {
		state_work = $(this).attr('state');
		id_order = $(this).attr('id_order');
		id_prod = $(this).attr('id_prod');
		id_worker = $(this).attr('id_worker');
		//prod_name = $(this).find('.info-product').text();
		id_action = $(this).attr('id_action');
		
		if (state_work == STATE_WORK_PREPARATION) {
			location.href = '/terminal/start_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker + '&id_action=' + id_action;
		}
		else {
			$('#terminal-actions-wrp, #filter-actions-wrp').hide();
			//$('#terminal-wrp h3').hide();
			$('#actions-box-wrp').show();
			//$('#actions-info-product').text(prod_name);
		}
	});
	
	//exit operation box
	$('#exit-actions-box').click(function() {
		$('#terminal-actions-wrp, #filter-actions-wrp').show();
		$('#actions-box-wrp').hide();
	});

    //end work
    $('#prod-state-made').click(function() {
        location.href = '/terminal/end_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_action=' + id_action;
    });
	
	 //stop work
    $('#prod-state-stop').click(function() {
        location.href = '/terminal/stop_work?id_order=' + id_order + '&id_prod=' + id_prod;
    });
});