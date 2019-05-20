<div id="form-add-action-wrp">
    <h2>Форма редактирования состояния для группы операций</h2>
    <form action="/order_action/edit_state_group" method="post">
	
			<div class="form-box">
			
				<span>Состояние: </span>
				<select name="state">
					<option value="">Не указано</option>
					<option value="<?=OrderActionState::PLANED?>">Запланированы</option>
					<option value="<?=OrderActionState::PROGRESS?>">В работе</option>
					<option value="<?=OrderActionState::STOPPED?>">Остановлены</option>
					<option value="<?=OrderActionState::ENDED?>">Сделаны</option>
					<option value="<?=OrderActionState::WAITING?>">Отложены</option>
				</select>
			</div>
			
			<!-- id action for multi edit state -->
			<input type="hidden" value="<?=$this->get->ids?>" name="ids">

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>