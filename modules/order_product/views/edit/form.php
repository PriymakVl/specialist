<div id="form-edit-order-product-wrp">
    <h2>Форма редактирования <span><?=$product->options->name, ' : ' ,$product->options->symbol?></span></h2>
    <form action="/order_product/edit?id_prod=<?=$product->id?>" method="post">
			<!-- order product state -->
			<div class="form-box">
				<span>Состояние: </span>
				<select name="state">
					<option value="<?=OrderPRODUCT::STATE_PROGRESS?>" <? if ($product->state == OrderProduct::STATE_PROGRESS) echo "selected";?>>Обрабатывается</option>
					<option value="<?=OrderPRODUCT::STATE_STOPPED?>" <? if ($product->state == OrderProduct::STATE_STOPPED) echo "selected";?>>Остановлен</option>
					<option value="<?=OrderPRODUCT::STATE_ENDED?>" <? if ($product->state == OrderProduct::STATE_ENDED) echo "selected";?>>Изготовлен</option>
					<option value="<?=OrderPRODUCT::STATE_WAITING?>" <? if ($product->state == OrderProduct::STATE_WAITING) echo "selected";?>>Не выдан</option>
				</select>
			</div>
			
			<!-- order product quantity -->
			<div class="form-box">
				<label>Количество:</label>
				<input type="number" value="<?=$product->qty?>" name="qty">
			</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>