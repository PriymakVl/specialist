<div id="form-product-wrp">
    <h2>Форма для добавления продукта в заказ: <span class="green"><?=$order->symbol?></span></h2>
    <form action="/order_product/add_form?id_order=<?=$this->get->id_order?>" method="post">
        <!-- first box -->
        <div class="form-box">
            <!-- product symbol-->
            <div id="form-product-symbol-wrp">
                <label>Обозначение:</label>
                <input type="text" name="symbol">
            </div>

            <!-- product type-->
            <div id="form-product-type-wrp">
                <label>Тип:</label>
                <select name="type">
                    <option value="<?=Product::TYPE_DETAIL?>">Деталь</option>
                    <option value="<?=Product::TYPE_UNIT?>">Узел</option>
					<option value="<?=Product::TYPE_PRODUCT?>">Изделие</option>
					<option value="<?=Product::TYPE_STANDARD?>">Стандартное изделие</option>
					<option value="<?=Product::TYPE_OTHER?>">Прочее</option>
					<option value="<?=Product::TYPE_CATEGORY?>">Категория</option>
                </select>
            </div>
			
			<!-- product quantity -->
			<div id="form-product-quantity-wrp">
				<label>Количество:</label>
				<input type="number" name="qty" value="1">
			</div>
        </div>
		
		<div class="form-box">
			<!-- product name -->
			<div id="form-product-name-wrp">
				<label>Наименование:</label>
				<input type="text" name="name" required>
			</div>
			<!-- number -->
			<div id="form-product-number-wrp">
				<label>Номер:</label>
				<input type="number" name="number" value="1">
			</div>
		</div>

        <div class="form-box">
			<!-- note -->
			<div id="form-product-note-wrp">
				<label>Примечание:</label>
				<textarea name="note"></textarea>
			</div>
		</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" id="form-product" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>