<?php
	$actions = Action::getAll('actions');
?>
<div id="form-product-action-wrp">
    <h2 class="center">
		Добавить операцию для <?=$product->name?>: <span class="green"><?=$product->symbol?></span> 
	</h2>
    <form action="/order_action/add_for_product?id_prod=<?=$this->get->id_prod?>&id_order=<?=$this->get->id_order?>" method="post">
	
			<div class="form-box product-action-name-wrp">
				<!-- name action -->
				<label>Операции:</label>
				<select id="actions">
					<option value="">Не выбрана</option>
					<? foreach ($actions as $action): ?>
						<option  value="<?=$action->name?>" price="<?=$action->price?>"><?=$action->name?></option>
					<? endforeach; ?>
				</select>
				<label>Наименование:</label>
				<input type="text" name="name" required>
				
			</div>
			
			<div class="form-box product-action-properties-wrp">
				<!-- price action -->
				<label>Стоимость:</label>
				<input type="text" name="price"><span>грн/час.</span>
				<!-- number action -->
				<label>Номер:</label>
				<input type="number" name="number" value="1">
				<!-- time preparation action --> 
				<label>Подгот-ное время:</label>
				<input type="text" name="time_prepar"><span>мин.</span>
				<!-- time production action -->
				<label>Штучное время:</label>
				<input type="text" name="time_prod" required><span>мин.</span>
			</div>
			
			<div class="form-box">
				<!-- product qty -->
				<label>Количеcтво:</label>
				<input type="number" value="<?=$product?$product->qty:1?>" required name="qty"> <span>шт.</span>
				<!-- date execution-->
				 <label>Срок выполнения:</label>
                <input type="text" name="date_exec" class="datepicker" value="<?=$product->date_exec ? date('d.m.y', $product->date_exec) : ''?>" autocomplete="off">
			</div>
			
			<!-- action note -->
			<div class="form-box">
				<label>Примесание:</label>
				<textarea name="note"></textarea>
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>