 	var state, id_action, action, note;
	
	const STATE_ACTION_PLANED = 1;
	const STATE_ACTION_PROGRESS = 2;
	const STATE_ACTION_STOPPED = 3;
	const STATE_ACTION_ENDED = 4;

	function show_box_operations(elem) {
		state = $(elem).attr('state');
		action = $(elem).attr('action_name');
		id_action = $(elem).attr('id_action');
		note = $(elem).attr('note');
		
		$('#terminal-actions-wrp, #terminal-actions-unplan-wrp, #filters-wrp').hide();
		$('#operations-box').show();
			
		if (state == STATE_ACTION_STOPPED) $('#text-work-box').text('Продолжить задание');
		else $('#text-work-box').text('Выдать в работу');
		 
		if (note) {
			$('.fa-comment-alt').hide();
			$('#text-action-note').text(note);
		} 
		else {
			$('.fa-comment-alt').show();
			$('#text-action-note').text('');
		}
		return false;
	}
	
	//exit operation box
	function exit_operations_box() {
		$('#terminal-actions-wrp, #filters-wrp').show();
		$('#operations-box').hide();
		return false;
	}
	
	//в работу
	function action_state_work() {
		if (state == STATE_ACTION_PROGRESS) {
			alert('Операция уже выполняется');
			return;
		}
		location.href = '/terminal/edit_state?action=' + action + '&state=' + STATE_ACTION_PROGRESS + '&id_action=' + id_action ;
		return false;
	}

    //made
	function action_state_made() {
		if (state == STATE_ACTION_STOPPED) {
			alert('Сначала нужно продолжить задание');
			return;
		}
		else if (state == STATE_ACTION_PLANED) {
			alert('Сначала нужно выдать задание в работу');
			return;
		}
		location.href = '/terminal/edit_state?action=' + action + '&state=' + STATE_ACTION_ENDED + '&id_action=' + id_action;
		return false;
	}
	
	 //stop work
	function action_state_stop() {
		if (state == STATE_ACTION_STOPPED) {
			alert('Задание уже остановлено');
			return;
		}
		else if (state == STATE_ACTION_PLANED) {
			alert('Сначала нужно выдать задание в работу');
			return;
		}
		location.href = '/terminal/edit_state?action=' + action + '&state=' + STATE_ACTION_STOPPED + '&id_action=' + id_action;
		return false;
	}
	
	function action_note_add() {
		var note = prompt('Введите примечание к операции');
		if (!note) return;
		var params = getObjectGetParams();
		var request = '/terminal/add_note?id_action=' + id_action + '&note=' + note;
		action = params.action ? params.action : action; //если загружен 1 раз берет значение не с get запроса а с атрибута
		request = request + '&action=' + action; 
		location.href = request;
		return false;
	}
	

	
	

