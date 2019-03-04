	//$('.terminal-action-box').unbind('mousenter mouseleave touchend touchstart');
	
	var state_work, id_order, id_prod, id_worker, prod_name, type_action, text_stop_box;
	const STATE_WORK_PREPARATION = 1;
	const STATE_WORK_STOP = 3;
	
/* 	$(document).ready(function() {
		$('.terminal-action-box').on('mousedown touchstart', function () {
			var elem = $(this);
			to_work(elem);
		});
	}); */
	
	
	//деталь взята в работу
	function to_work(elem) {
		state_work = $(elem).attr('state');;
		id_order = $(elem).attr('id_order');
		id_prod = $(elem).attr('id_prod');
		id_worker = $(elem).attr('id_worker');
		id_action = $(elem).attr('id_action');
		type_action = $(elem).attr('type_action');
		
		if (state_work == STATE_WORK_PREPARATION) {
			location.href = '/terminal/start_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_worker=' + id_worker + '&id_action=' + id_action + '&type_action=' + type_action;
		}
		else {
			if (type_action == 'plan') $('#terminal-actions-wrp, #filter-actions-wrp').hide();
			else $('#terminal-actions-unplan-wrp, #filter-actions-wrp').hide();
			
			$('#operations-box').show();
			if (state_work == STATE_WORK_STOP) {
				 text_stop_box = 'Продолжить задание'; 
				 $('#prod-state-stop i').removeClass('fa-pause').addClass('fa-angle-double-right');
			}
			else {
				text_stop_box = 'Остановить задание';
				$('#prod-state-stop i').removeClass('fa-angle-double-right').addClass('fa-pause');
			}
			 
			$('#text-stop-box').text(text_stop_box);
		}
		return false;
	}

	
	//exit operation box
	function exit_operations_box() {
		$('#terminal-actions-wrp, #filter-actions-wrp').show();
		$('#operations-box').hide();
		return false;
	}

    //end work
	function action_state_made() {
		location.href = '/terminal/end_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_action=' + id_action + '&type_action=' + type_action;
		return false;
	}
	
	 //stop work
	function action_state_stop() {
		var request = '/terminal/stop_work?id_order=' + id_order + '&id_prod=' + id_prod + '&id_action=' + id_action + '&type_action=' + type_action + '&state=' + state_work;
		var params = getObjectGetParams();
		if (params.id_action == 'all') request = request + '&actions=all'; 
		location.href = request;
		return false;
	}
	
	

