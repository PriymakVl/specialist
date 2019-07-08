<div id="form-add-action-wrp">
    <h2>Форма редактирования состояния операции</h2>
    <form action="/order_action/edit_state_one?id_action=<?=$action->id?>" method="post">
	
			<div class="form-box">
			
				<span>Состояние: </span>
				<select name="state">
					<option value="<?=OrderActionState::PLANED?>" <? if ($action->state == OrderActionState::PLANED) echo "selected";?>>Запланирована</option>
					<option value="<?=OrderActionState::PROGRESS?>" <? if ($action->state == OrderActionState::PROGRESS) echo "selected";?>>В работе</option>
					<option value="<?=OrderActionState::STOPPED?>" <? if ($action->state == OrderActionState::STOPPED) echo "selected";?>>Остановлена</option>
					<option value="<?=OrderActionState::ENDED?>" <? if ($action->state == OrderActionState::ENDED) echo "selected";?>>Сделана</option>
					<option value="<?=OrderActionState::WAITING?>" <? if ($action->state == OrderActionState::WAITING) echo "selected";?>>Отложена</option>
				</select>
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>