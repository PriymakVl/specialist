<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="550">Содержание</th>
		<th width="80">Дата вып.</th>
		<th>Примечание</th>
    </tr>
    <? if ($orders): ?>
        <?foreach ($orders as $order): ?>
			<? $bg_priority = ($order->rating == Order::RATING_PRIORITY || $order->rating == Order::RATING_IMPORTANT) ? 'Aqua' : ''; ?>
            <tr>
                <td class="<?=($id_active == $order->id)?'bg-green':''?>">
                    <input type="checkbox" name="order" id_order="<?=$order->id?>">
                </td>
                <td style="background:<?=$bg_priority?>;">
                    <a href="/order?id_order=<?=$order->id?>"><?=$order->symbol?></a>
                </td>
				<? if ($order->positions): ?>
					<td class="order-positions-td"><?=$order->positionsTable?></td>
				<? else: ?>
					<td class="red">Нет позиций</td>
				<? endif; ?>
				<td><?=$order->date_exec ? date('d.m.y', $order->date_exec) : 'Нет';?></td>
				<td><?=$order->note?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>