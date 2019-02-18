<div id="form-product-wrp">
    <h2>Форма для добавления продукции</h2>
    <form action="/product/add" method="post">
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
                    <option >Деталь</option>
                    <option>Узел</option>
					<option>Изделие</option>
					<option>Категория</option>
                </select>
            </div>
			
			<!-- product quantity -->
			<div id="form-product-quantity-wrp">
				<label>Количество:</label>
				<input type="text" name="quantity" value="1">
			</div>
			
			<!-- product parent -->
			<div id="form-product-parent-wrp">
				<label>ID Parent:</label>
				<input type="text" name="id_parent" value="<?=$params['id_parent']?>">
			</div>


            <!-- product parent -->
            <!--<div id="form-product-parent-wrp">
                <label>Родитель:</label>
                <input type="text" name="id_parent" value="<?//=$id_parent?>">
            </div>-->
        </div>
		
		<div class="form-box">
			<!-- product name -->
			<div id="form-product-name-wrp">
				<label>Наименование:</label>
				<input type="text" name="name">
			</div>
		</div>
		
		<div class="form-box">
			<label>Подгот. время:</label>
			<input type="text" name="time_prod">
			<label>Штучное время:</label>
			<input type="text" name="time_prepar">
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