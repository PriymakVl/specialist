<?php
	$items = Action::getAll('actions');
?>
<div id="form-add-action-wrp">
    <h2 class="center">Форма редактирования операции</h2>
    <form action="/product_action/edit?id_action=<?=$action->id?>" method="post">
	
			<div class="form-box product-action-name-wrp">
				<!-- action name -->
				<label>Операции:</label>
				<select id="actions">
					<option value="">Не выбрана</option>
					<? foreach ($items as $item): ?>
						<option  value="<?=$item->name?>" price="<?=$item->price?>"><?=$item->name?></option>
					<? endforeach; ?>
				</select>
				
				<label>Наименование:</label>
				<input type="text" name="name" value="<?=$action->name?>">
			</div>
			
			<div class="form-box product-action-properties-wrp">
				<!-- price action -->
				<label>Стоимость:</label>
				<input type="text" name="price" value="<?=$action->price?>"><span>грн/час.</span>
				<!-- time preparation action -->
				<label>Подгот-ное время:</label>
				<input type="number" name="time_prepar" value="<?=$action->time_prepar?>"><span>мин.</span>
				<!-- time production action -->
				<label>Штучное время:</label>
				<input type="number" name="time_prod" required value="<?=$action->time_prod?>"><span>мин.</span>
				<!-- number action -->
				<label>Номер:</label>
				<input type="number" name="number" value="<?=$action->number?>">
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>