<div id="form-order-action-unplan-wrp">
    <h2>Форма для добавления внеплановой операции по заказу: <span class="green"><?=$order->symbol?></span></h2>
    <form action="/order_action/add_unplan?id_order=<?=$order->id?>" method="post">
        <!-- first box -->
        <div class="form-box">
			 <!-- order products-->
			 <? if ($order->products): ?>
				<div id="form-order-products-wrp">
					<label>Выбрать деталь:</label>
					<select name="product">
						<option value="">Не выбрана</option>
						<? foreach ($order->products as $product): ?>
							<option value="<?=$product->id?>" prod_name="<?=$product->name?>" prod_symbol="<?=$product->symbol?>">
								<?=$product->name.': '.$product->symbol?>
							</option>
						<? endforeach; ?>
					</select>
				</div>
			<? endif; ?>
			<div id="form-product-wrp"
				<!-- prod symbol-->
				<div id="form-product-symbol-wrp">
					<label>Обозначение детали:</label>
					<input type="text" name="prod_symbol">
				</div>
				<!-- prod name -->
				<div id="form-product-name-wrp">
					<label>Наименование:</label>
					<input type="text" name="prod_name" required>
				</div>
			</div>
        </div>
		
		<!-- two box -->
        <div class="form-box">
			 <!-- actions-->
            <div id="form-order-actions-wrp">
                <label>Операции:</label>
                <select name="action">
					<option value="">Не выбрана</option>
					<? foreach ($actions as $action): ?>
						<option value="<?=$action->id?>" action_name="<?=$action->name?>"><?=$action->name?></option>
					<? endforeach; ?>
                </select>
            </div>
			<!-- action name-->
            <div id="form-action-name-wrp">
                <label>Наименование:</label>
                <input type="text" name="action_name" required>
            </div>
			<!-- action time manufacturing-->
            <div id="form-action-time-wrp">
                <label>Время:</label>
                <input type="text" name="time_manufac" required placeholder="В минутах">
            </div>
        </div>
		
		<!-- three box -->
		<div class="form-box">
			<label>Количество:</label>
			<input type="number" name="qty" value="1" required>
		</div>
      
        <!-- note -->
        <div id="form-order-action-note-wrp" class="form-box">
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>