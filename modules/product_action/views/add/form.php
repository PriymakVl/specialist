<?php
	$actions = Action::getAll('actions');
?>
<div id="form-add-action-wrp">
    <h2>Форма добавления операции</h2>
    <form action="/product_action/add?id_prod=<?=$this->get->id_prod?>&symbol=<?=$this->get->symbol?>" method="post">
	
			<div class="form-box product-action-name-wrp">
				<!-- name action -->
				<label>Наименование:</label>
				<select id="actions">
					<option value="">Не выбрана</option>
					<? foreach ($actions as $action): ?>
						<option  value="<?=$action->id?>"><?=$action->name?></option>
					<? endforeach; ?>
				</select>
				<label>Наименование:</label>
				<input type="text" name="name" value="">
				
			</div>
			
			<div class="form-box product-action-properties-wrp">
				<!-- price action -->
				<label>Стоимость:</label>
				<input type="text" name="price">
				<!-- number action -->
				<label>Номер:</label>
				<input type="number" name="number" value="1">
				<!-- time preparation action --> 
				<label>Подгот-ное время:</label>
				<input type="text" name="time_prepar">
				<!-- time production action -->
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