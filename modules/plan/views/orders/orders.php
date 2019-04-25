<table class="list-orders" width="940">
    <? if ($orders): ?>
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="350">Содержание</th>
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
		<th width="80">Рейтинг</th>
		<th width="130">Состояние</th>
    </tr>
        <?foreach ($orders as $order): ?>
            <tr>
                <td>
                    <input type="radio" name="order" id_order="<?=$order->id?>">
                </td>
                <td>
                    <a href="/order?id_order=<?=$order->id?>"><?=$order->symbol?></a>
                </td>
				<? if ($order->productsMain): ?>
					<td class="order-products-td"><?=$order->productsTable?></td>
				<? else: ?>
					<td class="red">Нет продуктов</td>
				<? endif; ?>
				<!-- date execution -->
				<td><?=$order->date_exec ? date('d.m.y', $order->date_exec) : '<span class=red>Нет</span>'?></td>
				<td <? if ($order->date_exec + Date::DAY_WORKING_SECOND < $order->dateReady) echo 'class="bg-red"';?>>
					<?=date('d.m.y', $order->dateReady)?>
				</td>
				<!-- rating -->
				<td>
					<a href="#" class="order-rating" id_order="<?=$order->id?>"><?=$order->rating ? $order->rating : 0?></a>
				</td>
				<td style="background:<?=$order->stateBg?>"><?=$order->stateString?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>