<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="350">Содержание</th>
		<th width="80">Дата вып.</th>
		<th>Срок изг-ния</th>
		<th width="80">Рейтинг</th>
		<th width="130">Состояние</th>
    </tr>
    <? if ($orders): ?>
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
				<td><?=$order->date_exec ? date('d.m.y', $order->date_exec) : 'Нет';?></td>
				<td>Не определен</td>
				<td>
					<a href="#" class="order-rating" id_order="<?=$order->id?>"><?=$order->rating ? $order->rating : 0?></a>
				</td>
				<td style="background:<?=$order->stateBg?>"><?=$order->stateString?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="7" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>