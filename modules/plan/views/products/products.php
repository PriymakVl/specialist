<div id="plan-products-wrp">
	<table width="940">
		<? if ($products): ?>
			<tr>
				<th width="50">
					<input type="checkbox" onlyread >
				</th>
				<th width="120">Заказ</th>
				<th width="150">Обозначение</th>
				<th>Наименование</th>
				<th width="60">Кол-во</th>
				<th width="100" colspan="2">Срок изгот.<br> план&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;факт</th>
				<th width="70">Рейтинг</th>
				<th width="120">Состояние</th>
			</tr>
			<? foreach($products as $product): ?>
				<tr>
					<td>
						<input type="radio" name="product" id_prod="<?=$product->id?>">
					</td>
					<td>
						<a href="/order?id_order=<?=$product->order->id?>"><?=$product->order->symbol?></a>
					</td>
					<td>
						<a href="/order_product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
					</td>
					<td><?=$product->name?></td>
					<td><?=$product->qty?></td>
					<td  width="50"><?=$product->date_exec ? date('d.m.y', $prodct->date_exec) : '<span class=red>Нет</span>'?></td>
					<td width="50">Нет</td>
					<td>
						<a href="#" class="product-rating" id_prod="<?=$product->id?>"><?=$product->rating ? $product->rating : 0?></a>
					</td>
					<td style="background:<?=$product->stateBg?>"><?=$product->stateString?></td>
				</tr>
			<? endforeach; ?>
		<? else: ?>
			<tr>
				<td>Нет содержимого</td>
			</tr>
		<? endif; ?>
	</table>
</div>
