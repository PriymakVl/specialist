<?php
	$planed = OrderActionState::PLANED;
	$progress = OrderActionState::PROGRESS;
	$stopped = OrderActionState::STOPPED;
	$end = OrderActionState::ENDED;
?>
<div id="form-add-action-wrp">
    <h2>Форма редактирования состояния операции</h2>
    <form action="/order_action/edit_state?id=<?=$action->id?>" method="post">
	
			<div class="form-box">
			
				<span>Состояние: </span>
				<select name="state">
					<option value="<?=$planed?>" <? if ($action->state==$planed) echo "selected";?>>В подготовке</option>
					<option value="<?=$progress?>" <? if ($action->state==$progress) echo "selected";?>>В работе</option>
					<option value="<?=$stopped?>" <? if ($action->state==$stopped) echo "selected";?>>Остановлен</option>
					<option value="<?=$end?>" <? if ($action->state==$end) echo "selected";?>>Сделан</option>
				</select>
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>