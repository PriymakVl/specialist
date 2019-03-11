<div id="form-order-wrp">
    <h2>Форма для редактирования заказа</h2>
    <form action="/order/edit?id_order=<?=$order->id?>" method="post">
        <!-- first box -->
        <div class="form-box">
            <!-- order symbol-->
            <div id="form-order-symbol-wrp">
                <label>Обозначение заказа:</label>
                <input type="text" name="symbol" value="<?=$order->symbol?>">
            </div>

            <!-- type orders-->
            <div id="form-order-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_CYLINDER?>" <? if ($order->symbol == Order::TYPE_CYLINDER) echo 'selected';?>>Пневмоцилиндры</option>
                    <option value="<?=Order::TYPE_CAR_NUMBER?>" <? if ($order->symbol == Order::TYPE_CAR_NUMBER) echo 'selected';?>>Автономера</option>
                </select>
            </div>

            <!-- date execution-->
            <div id="form-order-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" class="datepicker" value="<?if ($order->date_exec) echo date('d.m.y', $order->date_exec);?>">
            </div>
        </div>
		
		<!-- rating order -->
		<div class="form-box">
			<label>Приоритет:</label>
			<select name="rating">
				<option value="<?=Order::RATING_REGULAR?>" <? if ($order->rating == Order::RATING_REGULAR) echo 'selected';?>>Обычный</option>
				<option value="<?=Order::RATING_IMPORTANT?>" <? if ($order->rating == Order::RATING_IMPORTANT) echo 'selected';?>>Важный</option>
				<option value="<?=Order::RATING_PRIORITY?>" <? if ($order->rating == Order::RATING_PRIORITY) echo 'selected';?>>Первоочередной</option>
			</select>
		</div>

        <!-- note -->
        <div id="form-order-note-wrp" class="form-box">
            <label>Примечание:</label>
            <textarea name="note"><?=$order->note?></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" id="form-order" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>