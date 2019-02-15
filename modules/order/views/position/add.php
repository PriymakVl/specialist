<?php

require_once ('./modules/order/models/order.php');
require_once ('./modules/order/models/order_state.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<!--<link rel="stylesheet" href="/modules/order/css/form.css">-->

<div id="content">

    <div id="form-order-wrp">
		<h2>Форма для добавления позиции заказа</h2>
		<form action="/order/add_position?id_order=<?=$id_order?>" method="post">
		
			<div class="form-box">
				<label>Обозначение:</label>
				<input type="text" name="symbol">
				<label>Количество:</label>
				<input type="text" name="qty">
				<div class="position-note-wrp">
					<label>Примечание:</label>
					<textarea name="note"></textarea>
				</div>
			</div>

			<!-- buttons -->
			<div class="button-box">
				<input type="submit" value="Сохранить" id="add-order" name="save">
				<input type="button" onclick="history.back();" value="Отменить">
			</div>
		</form>
	</div>

</div><!-- id content -->

<!-- js files -->

