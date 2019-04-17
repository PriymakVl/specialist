<div id="form-order-state-wrp">
    <h2>Форма для редактирования состояния заказа</h2>
    <form action="/order/edit_state?id_order=<?=$order->id?>" method="post">
		
		<!-- state order -->
		<div class="form-box">
			<label>Состояние:</label>
			<select name="state">
				<option value="<?=OrderState::REGISTERED?>" <? if ($order->state == OrderState::REGISTERED) echo 'selected';?>>Зарегистрирован</option>
				<option value="<?=OrderState::PREPARATION?>" <? if ($order->state == OrderState::PREPARATION) echo 'selected';?>>В подготовке</option>
				<option value="<?=OrderState::WORK?>" <? if ($order->state == OrderState::WORK) echo 'selected';?>>В работе</option>
				<option value="<?=OrderState::WAITING?>" <? if ($order->state == OrderState::WAITING) echo 'selected';?>>Отложен</option>
				<option value="<?=OrderState::MADE?>" <? if ($order->state == OrderState::MADE) echo 'selected';?>>Выполнен</option>
			</select>
		</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>