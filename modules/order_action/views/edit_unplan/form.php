<?php
	$planed = OrderActionState::PLANED;
	$progress = OrderActionState::PROGRESS;
	$stopped = OrderActionState::STOPPED;
	$end = OrderActionState::ENDED;
?>

<div id="form-order-action-unplan-wrp">
    <h2>Форма для редактирования внеплановой операции по заказу: <span class="green"><?=$order->symbol?></span></h2>
    <form action="/order_action/edit_unplan?id_order=<?=$order->id?>&id=<?=$action->id?>" method="post">
        <!-- first box -->
        <div class="form-box">
			<div id="form-product-wrp"
				<!-- prod symbol-->
				<div id="form-product-symbol-wrp">
					<label>Обозначение детали:</label>
					<input type="text" name="prod_symbol" value="<?=$action->prod_symbol?>">
				</div>
				<!-- prod name -->
				<div id="form-product-name-wrp">
					<label>Наименование:</label>
					<input type="text" name="prod_name" value="<?=$action->prod_name?>" required>
				</div>
			</div>
        </div>
		
		<!-- two box -->
        <div class="form-box">
			<!-- action name-->
            <div id="form-action-name-edit-wrp">
                <label>Наименование:</label>
                <input type="text" name="action_name" value="<?=$action->action_name?>">
            </div>
			<!-- action time manufacturing-->
            <div id="form-action-time-edit-wrp">
                <label>Время:</label>
                <input type="text" name="time_manufac" value="<?=$action->time_manufac?>" required>
            </div>
        </div>
		
		<!-- three box -->
		<div class="form-box">
			<!-- action qty -->
			<div id="form-action-edit-qty-wrp">
				<label>Количество:</label>
				<input type="number" name="qty" value="<?=$action->qty?>"required>
			</div>
			<!-- action state -->
			<div id="form-action-unplan-state-wrp">
				<span>Состояние: </span>
				<select name="state">
					<option value="<?=$planed?>" <? if ($action->state==$planed) echo "selected";?>>В подготовке</option>
					<option value="<?=$progress?>" <? if ($action->state==$progress) echo "selected";?>>В работе</option>
					<option value="<?=$stopped?>" <? if ($action->state==$stopped) echo "selected";?>>Остановлен</option>
					<option value="<?=$end?>" <? if ($action->state==$end) echo "selected";?>>Сделан</option>
				</select>
			</div>
		</div>
      
        <!-- note -->
        <div id="form-order-action-note-wrp" class="form-box">
            <label>Примечание:</label>
            <textarea name="note"><?=$action->note?></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>