<?php 
	$number = 1;
?>
<table class="list-orders" width="940">
    <tr>
        <th width="50">№</th>
        <th width="180">Обозначение заказа</th>
        <th width="180">Описание заказа</th>
		<th width="180">Трудоемкость план</th>
    </tr>
    <? if ($worker->ordersPlan): ?>
        <?foreach ($worker->ordersPlan as $order): ?>
            <tr>
                <td><?=$number?></td>
                <td>
                    <a href="/statistics/order?id_worker=<?=$worker->id?>&id_order=<?=$order->id?>"><?=$order->symbol?></a>
                </td>
                <td><?=$order->description?></td>
				<td><? if ($order->timeManufacturingForWorker) echo date('i:s', $order->timeManufacturingForWorker); ?></td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="4" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>