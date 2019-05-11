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
				<th colspan="2" >
					<table class="table-date">
						<tr>
							<td colspan="2" class="table-date-header">Срок изгот.</td>
						<tr>
						<tr>
							<td class="table-date-plan">план</td>
							<td class="table-date-fact">факт</td>
						<tr>
					</table>
				</th>
				<th width="70">Рейтинг</th>
				<th width="120">Состояние</th>
			</tr>
			<? foreach($products as $product): ?>
				<tr>
					<td <?if ($this->session->id_prod_active == $product->id) echo 'class="bg-green"'; ?>>
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
					<td><?=$product->date_exec ? date('d.m.y', $product->date_exec) : '<span class=red>Нет</span>'?></td>
					<td <? if ($product->dateReady && $product->date_exec && ($product->date_exec + Date::DAY_WORKING_SECOND < $product->dateReady)) echo 'class="bg-red"';?>>
						<? if ($product->dateReady): ?>
							<?=date('d.m.y', $product->dateReady)?>
						<? else: ?>
							<span class="red">Нет</span>
						<? endif; ?>
					</td>
					<td>
						<a href="#" class="product-rating" id_prod="<?=$product->id?>"><?=$product->rating ? $product->rating : 0?></a>
					</td>
					<td style="background:<?=$product->stateBg?>"><?=$product->stateString?></td>
				</tr>
			<? endforeach; ?>
		<? else: ?>
			<tr><td class="red">Продуктов нет</td></tr>
		<? endif; ?>
	</table>
</div>
