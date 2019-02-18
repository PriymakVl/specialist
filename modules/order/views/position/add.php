<?php

require_once ('./modules/order/models/order.php');
require_once ('./modules/order/models/order_state.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/modules/order/css/form.css">

<div id="content">

    <div id="form-order-position-wrp">
		<h2>Форма для добавления позиции к заказу: <span class="red"><?=$order->symbol?></span></h2>
		<form action="/order/add_position?id_order=<?=$order->id?>" method="post">
		
			<div class="form-box">
				<label>Обозначение:</label>
				<input type="text" name="symbol">
				<label>Количество:</label>
                <input type="number" name="qty" value="1">
            </div>
			
			<div class="position-note-wrp form-box">
				<label>Примечание:</label>
				<textarea name="note"></textarea>
			</div>

			<!-- buttons -->
			<div class="button-box">
				<input type="submit" value="Сохранить" name="save">
				<input type="button" onclick="history.back();" value="Отменить">
			</div>
		</form>
	</div>

</div><!-- id content -->

<!-- js files -->

