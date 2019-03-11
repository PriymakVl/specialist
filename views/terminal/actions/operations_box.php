<div id="operations-box" style="display:none;">
	<div id="info-product"></div>
	<h3>Действия с выбранным заданием</h3>
	<div id="terminal-operations-wrp">
		<div id="prod-state-made" onclick="action_state_made();">
			<i class="fas fa-check"></i>
            <span>Задание выполнено</span>
		</div>
		<div id="prod-state-stop" onclick="action_state_stop();" >
			<!--<i class="fas fa-pause"></i>-->
			<i class="fas fa-angle-double-right"></i>
			<span id="text-stop-box"></span><!-- if state == stop Продолжить и наоборот -->
		</div>
		<div id="exit-operations-box" onclick="exit_operations_box();">
			<i class="fas fa-sign-out-alt"></i>
			<span>Отмена</span>
		</div>
		<div id="action-order-note-box" onclick="action_note_add();">
			<i class="far fa-comment-alt" style="display:none;"></i>
			<span id="text-action-note"></span>
			<span>Примечание</span>
		</div>
	</div>
</div>