<div id="form-add-action-wrp">
    <h2>Форма добавления операции</h2>
    <form action="/product_action/add?id_prod=<?=$product->id?>" method="post">
	
			<div class="form-box product-action-wrp">
			
				<label>Наименование:</label>
				<select name="id_data">
					<option>Не выбрана</option>
					<? foreach ($data_actions as $item): ?>
						<option  value="<?=$item->id?>"><?=$item->name?></option>
					<? endforeach; ?>
				</select>
				<label>Номер:</label>
				<input type="number" name="number">
				<label>Подгот-ное время:</label>
				<input type="text" name="time_prepar">
				<label>Штучное время:</label>
				<input type="text" name="time_prod" required>
				
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>