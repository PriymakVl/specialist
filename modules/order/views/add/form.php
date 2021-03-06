<div id="form-order-wrp">
    <h2>Форма для добавления заказа</h2>
    <form action="/order/add" method="post">
        <!-- first box -->
        <div class="form-box">
            <!-- order symbol-->
            <div id="form-order-symbol-wrp">
                <label>Обозначение заказа:</label>
                <input type="text" name="symbol" required>
            </div>

            <!-- type orders-->
            <div id="form-order-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_CYLINDER?>">Пневмоцилиндры</option>
                    <option value="<?=Order::TYPE_CAR_NUMBER?>">Пресса и накатки</option>
                </select>
            </div>

            <!-- date execution-->
            <div id="form-order-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" class="datepicker" autocomplete="off">
            </div>
        </div>
		
		<!-- rating order -->
		<div id="rating-order-wrp" class="form-box">
			<label>Рейтинг:</label>
			<select name="rating">
				<option value="<?=Order::RATING_REGULAR?>">Обычный</option>
				<option value="<?=Order::RATING_IMPORTANT?>">Важный</option>
				<option value="<?=Order::RATING_PRIORITY?>">Первоочередной</option>
			</select>
		</div>
      
        <!-- note -->
        <div id="form-order-note-wrp" class="form-box">
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" id="add-order" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>