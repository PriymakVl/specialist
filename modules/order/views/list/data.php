<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="80">Дата</th>
        <th width="450">Описание</th>
        <th>Примечание</th>
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
                <td><?=$order->date_exec?></td>
                <td class="left"><?=$order->description?></td>
                <td class="left"><?=$order->note?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Заказов нет</td>
        </tr>
    <? endif; ?>
</table>