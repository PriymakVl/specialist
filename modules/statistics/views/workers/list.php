<table class="list-orders" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">ФИО</th>
        <th width="450">Загрузка</th>
        <th>Примечание</th>
    </tr>
    <? if ($workers): ?>
        <?foreach ($workers as $worker): ?>
            <tr>
                <td>
                    <input type="checkbox" name="worker" id_worker="<?=$worker->id?>">
                </td>
                <td>
                    <a href="#"><?=$worker->title?></a>
                </td>
                <td class="left">37%</td>
                <td class="left"><?=$order->note?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Рабочих нет</td>
        </tr>
    <? endif; ?>
</table>