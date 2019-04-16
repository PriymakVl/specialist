<? 
	$number = 1;
	$tab_active_products = false;
	if  (!$this->get->tab & $order->productsMain) $tab_active_products = true;
	if ($this->get->tab == 2) $tab_active_products = true;
?>
<li id="order-products-wrp">
    <input type="radio" name="tabs" id="tab-2" <? if ($tab_active_products) echo 'checked'; ?>>
    <label for="tab-2">Содержание</label>
    <div class="tab-content">
		<h3>Заказ: <span class="red"><?=$order->symbol?></span></h3>
        <table width="940">
            <? if ($order->productsMain): ?>
				<tr>
					<th width="50">№</th>
					<th width="150">Обозначение</th>
					<th width="380">Наименование</th>
					<th width="80">Кол-во</th>
					<th>Примечание</th>
					<th width="120">Состояние</th>
				</tr>
                <? foreach($order->productsMain as $product): ?>
                    <tr>
						<td><?=$number?></td>
						<td>
							<a href="/order_product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
						</td>
						<td><?=$product->name?></td>
						<td><?=$product->qty?></td>
						<td><?=$product->note?></td>
						<td style="background:<?=$product->stateBg?>"><?=$product->stateString?></td>
					</tr>
					<? $number++; ?>
                <? endforeach; ?>
            <? else: ?>
                <tr>
                    <td>Нет содержимого</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>