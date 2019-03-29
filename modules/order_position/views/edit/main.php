<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/web/modules/order_position/css/form.css">

<div id="content">

	<!-- message -->
    <? include_once('./views/total/message.php'); ?>

    <div id="form-order-position-wrp">
		<h2>Форма для редактирования позиции к заказу: <span class="red"><?=$position->order->symbol?></span></h2>
		<form action="/order_position/edit?id_position=<?=$position->id?>" method="post">
		
			<div class="form-box">
				<label>Обозначение:</label>
				<input type="text" name="symbol" value="<?=$position->symbol?>" required>
				<label>Количество:</label>
                <input type="number" name="qty" value="<?=$position->qty?>" required>
            </div>
			
			<div class="position-note-wrp form-box">
				<label>Примечание:</label>
				<textarea name="note"><?=$position->note?></textarea>
			</div>

			<!-- buttons -->
			<div class="button-box">
				<input type="submit" value="Сохранить" name="save">
				<input type="button" onclick="location.href='/order?tab=1&id_order=' + <?=$position->id_order?>" value="Отменить">
			</div>
		</form>
	</div>

</div><!-- id content -->

<!-- js files -->


