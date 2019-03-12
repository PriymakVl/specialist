 	var state, id_item, action, prod_name, text_stop_box, note;
	const STATE_ACTION_PREPARATION = 1;
	const STATE_ACTION_STOPED = 3;

	//деталь взята в работу
	function to_work(elem) {
		state = $(elem).attr('state');
		id_item = $(elem).attr('id_item');
		action = $(elem).attr('action');
		note = $(elem).attr('note');
		
		if (state == STATE_ACTION_PREPARATION) {
			location.href = '/terminal/start_work?id=' + id_item + '&action=' + action ;
		}
		else {
			if (action == 'unplan') $('#terminal-actions-unplan-wrp, #filter-actions-wrp').hide();
			else $('#terminal-actions-wrp, #filters-wrp').hide();
			
			$('#operations-box').show();
			if (state == STATE_ACTION_STOPED) {
				 text_stop_box = 'Продолжить задание'; 
				 $('#prod-state-stop i').removeClass('fa-pause').addClass('fa-angle-double-right');
			}
			else {
				text_stop_box = 'Остановить задание';
				$('#prod-state-stop i').removeClass('fa-angle-double-right').addClass('fa-pause');
			}
			 
			$('#text-stop-box').text(text_stop_box);
			if (note) {
				$('.fa-comment-alt').hide();
				$('#text-action-note').text(note);
			} 
			else {
				$('.fa-comment-alt').show();
				$('#text-action-note').text('');
			}
		}
		return false;
	}

	
	//exit operation box
	function exit_operations_box() {
		$('#terminal-actions-wrp, #filters-wrp').show();
		$('#operations-box').hide();
		return false;
	}

    //end work
	function action_state_made() {
		if (state == STATE_ACTION_STOPED) {
			alert('Сначала нужно продолжить задание');
			return;
		}
		var params = getObjectGetParams();
		var request = '/terminal/end_work?id=' + id_item;
		action = params.action ? params.action : action; //если загружен 1 раз берет значение не с get запроса а с атрибута
		request = request + '&action=' + action; 
		location.href = request;
		return false;
	}
	
	 //stop work
	function action_state_stop() {
		var params = getObjectGetParams();
		var request = '/terminal/stop_work?id=' + id_item + '&state=' + state;
		action = params.action ? params.action : action; //если загружен 1 раз берет значение не с get запроса а с атрибута
		request = request + '&action=' + action; 
		location.href = request;
		return false;
	}
	
	function action_note_add() {
		var note = prompt('Введите примечание к операции');
		if (!note) return;
		var params = getObjectGetParams();
		var request = '/terminal/add_note?id=' + id_item + '&note=' + note;
		action = params.action ? params.action : action; //если загружен 1 раз берет значение не с get запроса а с атрибута
		request = request + '&action=' + action; 
		location.href = request;
		return false;
	}
	
	

