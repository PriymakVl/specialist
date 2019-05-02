<?php
	$items = Action::getAll('actions');
?>
<div id="form-product-action-wrp">
    <h2 class="center">
		Редактирования операции заказ: <span class="green"><?=$action->order->symbol?></span>
	</h2>
    <form action="/order_action/edit?id_action=<?=$action->id?>&sent=<?=$this->get->sent?>" method="post">
	
			<div class="form-box product-action-name-wrp">
				<!-- action name -->
				<label>Операции:</label>
				<select id="actions">
					<option value="">Не выбрана</option>
					<? foreach ($items as $item): ?>
						<option  value="<?=$item->name?>" price="<?=$item->price?>" <? if ($item->name == $action->name) echo 'selected'; ?>><?=$item->name?></option>
					<? endforeach; ?>
				</select>
				
				<label>Наименование:</label>
				<input type="text" name="name" value="<?=$action->name?>" required>
			</div>
			
			<div class="form-box product-action-properties-wrp">
				<!-- price action -->
				<label>Стоимость:</label>
				<input type="text" name="price" value="<?=$action->price?>"><span>грн/час.</span>
				<!-- number action -->
				<label>Номер:</label>
				<input type="number" name="number" value="<?=$action->number?>">
				<!-- time preparation action -->
				<label>Подгот-ное время:</label>
				<input type="number" name="time_prepar" value="<?=$action->time_prepar?>"><span>мин.</span>
				<!-- time production action -->
				<label>Штучное время:</label>
				<input type="number" name="time_prod" required value="<?=$action->time_prod?>"><span>мин.</span>
			</div>
			<div class="form-box">
				<!-- action rating -->
				<label>Рейтинг:</label>
				<input type="number" name="rating" value="<?=$action->rating?>">
				<!-- action quantity -->
				<label>Количество:</label>
				<input type="number" name="qty" value="<?=$action->qty?>">
				<!-- action state -->
				<label>Состояние:</label>
				<select name="state">
					<option value="<?=OrderActionState::PLANED?>" <? if ($action->state == OrderActionState::PLANED) echo "selected";?>>Запланирована</option>
					<option value="<?=OrderActionState::PROGRESS?>" <? if ($action->state == OrderActionState::PROGRESS) echo "selected";?>>Выполняется</option>
					<option value="<?=OrderActionState::STOPPED?>" <? if ($action->state == OrderActionState::STOPPED) echo "selected";?>>Остановлена</option>
					<option value="<?=OrderActionState::WAITING?>" <? if ($action->state == OrderActionState::WAITING) echo "selected";?>>Отложена</option>
					<option value="<?=OrderActionState::ENDED?>" <? if ($action->state == OrderActionState::ENDED) echo "selected";?>>Выполнена</option>
				</select>
			</div>
			<!-- action note -->
			<div class="form-box">
				<label>Примесание:</label>
				<textarea name="note"><?=$action->note?></textarea>
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>