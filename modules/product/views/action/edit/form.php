<div id="form-add-action-wrp">
    <h2>Форма редактирования операции</h2>
    <form action="/prodaction/edit?id_prod_action=<?=$prod_action->id?>&id_prod=<?=$id_prod?>" method="post">
	
			<div class="form-box product-action-wrp">
			
				Наименование: <span class="green"><?=$prod_action->name?></span>
				<label>Номер:</label>
				<input type="number" name="number" value="<?=$prod_action->number?>">
				<label>Подгот-ное время:</label>
				<input type="text" name="time_prepar" value="<?=$prod_action->time_prepar?>">
				<label>Штучное время:</label>
				<input type="text" name="time_prod" required value="<?=$prod_action->time_prod?>">
				
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>