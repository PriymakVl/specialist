<?php
	$planed = OrderAction::STATE_WORK_PLANED;
	$progress = OrderAction::STATE_WORK_PROGRESS;
	$stopped = OrderAction::STATE_WORK_STOPPED;
	$end = OrderAction::STATE_WORK_END;
?>
<div id="form-add-action-wrp">
    <h2>Форма редактирования операции</h2>
    <form action="/order_action/edit?id_action=<?=$action->id?>&id_order=<?=$action->id_order?>" method="post">
	
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