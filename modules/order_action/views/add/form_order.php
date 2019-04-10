<?php
	$actions = Action::getAll('actions');
?>
<div id="form-product-action-wrp">
    <h2 class="center">
		Добавить операцию для заказа: <span class="green"><?=$order->symbol?></span>
	</h2>
    <form action="/order_action/add_for_order?id_order=<?=$this->get->id_order?>" method="post">
	
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
			<!-- product qty -->
			<div class="form-box">
				<label>Количеcтво:</label>
				<input type="number" value="<?=$product?$product->qty:1?>" required name="qty"> <span>шт.</span>
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