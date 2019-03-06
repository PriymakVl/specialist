<li id="order-content-wrp">
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Содержание</label>
    <div class="tab-content">
		<h3>Заказ: <span class="red"><?=$order->symbol?></span></h3>
        <table width="940">
            <? if ($order->content): ?>
				<tr>
					<th width="50"><input type="checkbox" disabled></th>
					<th width="150">Обозначение</th>
					<th width="400">Наименование</th>
					<th width="120">Кол-во</th>
					<th>Трудоемкость</th>
				</tr>
                <? foreach($order->content as $product): ?>
                    <tr>
						<td><input type="checkbox" id_prod="<?=$product->id?>"></td>
						<td>
							<a href="/product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
						</td>
						<td><?=$product->name?></td>
						<td class="product-qty" id_order="<?=$order->id?>" id_prod="<?=$product->id?>"><?=$product->orderQtyAll?></td>
						<td>
							<? if ($product->timeManufacturing): ?>
								<?=$product->timeManufacturing?> мин.
							<? else: ?>
								<span class="red">Не указана</span>
							<? endif; ?>
						</td>
					</tr>
                <? endforeach; ?>
            <? else: ?>
                <tr>
                    <td>Нет содержимого</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>