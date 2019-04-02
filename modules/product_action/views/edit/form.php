<?php
	$data_actions = DataAction::getAll('data_actions');
?>
<div id="form-add-action-wrp">
    <h2>Форма редактирования операции</h2>
    <form action="/product_action/edit?id_action=<?=$action->id?>&id_prod=<?=$this->get->id_prod?>?>" method="post">
	
			<div class="form-box product-action-wrp">
				<label>Наименование:</label>
				<select name="id_data">
					<? foreach ($data_actions as $item): ?>
						<option  value="<?=$item->id?>" <? if ($item->id == $action->id_data) echo "selected";?>><?=$item->name?></option>
					<? endforeach; ?>
				</select>
				
				<label>Номер:</label>
				<input type="number" name="number" value="<?=$action->number?>">
				<label>Подгот-ное время:</label>
				<input type="text" name="time_prepar" value="<?=$action->time_prepar?>">
				<label>Штучное время:</label>
				<input type="text" name="time_prod" required value="<?=$action->time_prod?>">
				
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>