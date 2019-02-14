<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="450">Содержание</th>
		<th width="120">Дата выполн.</th>
    </tr>
    <? if ($orders): ?>
        <?foreach ($orders as $order): ?>
            <tr>
                <td class="<?=($id_active == $order->id)?'bg-green':''?>">
                    <input type="checkbox" name="order" id_order="<?=$order->id?>">
                </td>
                <td>
                    <a href="/order?id_order=<?=$order->id?>"><?=$order->symbol?></a>
                </td>
                <td class="order-positions-td"><?=$order->positionsTable?></td>
				<td><?=$order->dateExecution?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="4" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>