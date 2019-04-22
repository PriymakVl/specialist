<div id="form-edit-order-product-wrp">
    <h2 class="center">Форма редактирования <?=$product->name?>: <span class='green'><?=$product->symbol?></span></h2>
    <form action="/order_product/edit?id_prod=<?=$product->id?>" method="post">
			
        <div class="form-box">
            <!-- product symbol-->
            <div id="form-product-symbol-wrp">
                <label>Обозначение:</label>
                <input type="text" name="symbol" value="<?=$product->symbol?>">
            </div>

            <!-- product type-->
            <div id="form-product-type-wrp">
                <label>Тип:</label>
                <select name="type">
                    <option value="<?=Product::TYPE_DETAIL?>" <? if ($product->type == Product::TYPE_DETAIL) echo 'selected'; ?>>Деталь</option>
                    <option value="<?=Product::TYPE_UNIT?>" <? if ($product->type == Product::TYPE_UNIT) echo 'selected'; ?>>Узел</option>
					<option value="<?=Product::TYPE_PRODUCT?>" <? if ($product->type == Product::TYPE_PRODUCT) echo 'selected'; ?>>Изделие</option>
					<option value="<?=Product::TYPE_STANDARD?>" <? if ($product->type == Product::TYPE_STANDARD) echo 'selected'; ?>>Стандартное изделие</option>
					<option value="<?=Product::TYPE_OTHER?>" <? if ($product->type == Product::TYPE_OTHER) echo 'selected'; ?>>Прочее</option>
					<option value="<?=Product::TYPE_CATEGORY?>" <? if ($product->type == Product::TYPE_CATEGORY) echo 'selected'; ?>>Категория</option>
                </select>
            </div>
			
			<!-- product quantity -->
			<div id="form-product-quantity-wrp">
				<label>Количество:</label>
				<input type="number" name="qty" value="<?=$product->qty?>">
			</div>
			
			<!-- product parent -->
			<div id="form-product-parent-wrp">
				<label>ID Parent:</label>
				<input type="text" name="id_parent" value="<?=$product->id_parent?>">
			</div>

        </div>
		
		<div class="form-box">
			<!-- product name -->
			<label>Наименование:</label>
			<input type="text" name="name" value="<?=$product->name?>" required>
			<!-- number -->
			<label>Номер:</label>
			<input type="number" name="number" value="<?=$product->number?$product->number:1?>">
		</div>
		
		<div class="form-box">
			<!-- order product state -->
			<label>Состояние: </label>
			<select name="state">
				<option value="<?=OrderPRODUCT::STATE_PROGRESS?>" <? if ($product->state == OrderProduct::STATE_PROGRESS) echo "selected";?>>Обрабатывается</option>
				<option value="<?=OrderPRODUCT::STATE_STOPPED?>" <? if ($product->state == OrderProduct::STATE_STOPPED) echo "selected";?>>Остановлен</option>
				<option value="<?=OrderPRODUCT::STATE_ENDED?>" <? if ($product->state == OrderProduct::STATE_ENDED) echo "selected";?>>Изготовлен</option>
				<option value="<?=OrderPRODUCT::STATE_WAITING?>" <? if ($product->state == OrderProduct::STATE_WAITING) echo "selected";?>>Не выдан</option>
			</select>
		</div>
		
			<!-- date execution -->
		<div class="form-box">
			<label>Срок выполнения:</label>
			<? $date_exec = $product->date_exec ? $product->date_exec : $order->date->exec; ?>
			<input type="text" name="date_exec" class="datepicker" value="<?if ($date_exec) echo date('d.m.y', $date_exec);?>" autocomplete="off">
		</div>

        <div class="form-box">
			<!-- note -->
			<div id="form-product-note-wrp">
				<label>Примечание:</label>
				<textarea name="note"><?=$product->note?></textarea>
			</div>
		</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>