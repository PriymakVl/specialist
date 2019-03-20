<div id="operations-box" style="display:none;">
	<div id="info-product"></div>
	<h3>Действия с выбранным заданием</h3>
	<div id="terminal-operations-wrp">
		<div id="action-state-work" onclick="action_state_work();">
			<i class="fas fa-play"></i>
			<span id="text-work-box"></span>
		</div>
		<div id="action-state-made" onclick="action_state_made();">
			<i class="fas fa-check"></i>
            <span>Задание выполнено</span>
		</div>
		<div id="action-state-stop" onclick="action_state_stop();" >
			<i class="fas fa-pause"></i>
			<span>Остановить задание</span>
		</div>
		<div id="exit-operations-box" onclick="exit_operations_box();">
			<i class="fas fa-sign-out-alt"></i>
			<span>Отмена</span>
		</div>
		<div id="action-order-note-box" onclick="action_note_add();">
			<i class="far fa-comment-alt"></i>
			<span id="text-action-note"></span>
			<span>Примечание</span>
		</div>
	</div>
</div>