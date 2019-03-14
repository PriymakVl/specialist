<div id="form-product-wrp">
    <h2>Форма для редактирования продукции</h2>
    <form action="/product/edit?id=<?=$product->id?>" method="post">
        <!-- first box -->
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
				<input type="text" name="quantity" value="<?=$product->quantity?>">
			</div>
			
			<!-- product parent -->
			<div id="form-product-parent-wrp">
				<label>ID Parent:</label>
				<input type="text" name="id_parent" value="<?=$product->id_parent?>">
			</div>

        </div>
		
		<div class="form-box">
			<!-- product name -->
			<div id="form-product-name-wrp">
				<label>Наименование:</label>
				<input type="text" name="name" value="<?=$product->name?>">
				<label>Редактировать все:</label>
				<input type="checkbox" name="edit_all">
			</div>
		</div>
		
		<div class="form-box">
			<!-- number -->
			<label>Номер:</label>
			<input type="number" name="number" value="<?=$product->number?>">
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
            <input type="submit" value="Сохранить" id="form-product" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>