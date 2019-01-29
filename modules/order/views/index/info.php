<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
        <table>
            <tr>
                <th width="50">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>1</th>
                <td>Обозначение</th>
                <td><?=$order->symbol?></th>
            </tr>
            <tr>
                <td>2</th>
                <td>Описание</th>
                <td class="left"><?=$order->description?></th>
            </tr>
            <tr>
                <td>2</th>
                <td>Состояние</th>
                <td><?=$order->state?></th>
            </tr>
            <tr>
                <td>3</th>
                <td>Срок выполнения</th>
                <td><? if ($order->date_exec) echo date('d.m.y', $order->date_exec); ?></th>
            </tr>
            <? if ($order->note): ?>
                <tr>
                    <td>4</th>
                    <td>Примечание</th>
                    <td class="left red"><?=$order->note?></th>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>