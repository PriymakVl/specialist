<table class="list-products" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="120">Обозначение</th>
        <th width="450">Наименование</th>
        <th>Примечание</th>
    </tr>
    <? if ($cat->products): ?>
        <?foreach ($cat->products as $product): ?>
            <tr>
                <td>
                    <input type="checkbox" name="order" id_prod="<?=$product->id?>">
                </td>
                <td>
                    <a href="../../../../index.php"><?=$product->symbol?></a>
                </td>
                <td>
                    <a href="../../../../index.php"><?=$product->name?></a>
                </td>
                <td class="left"><?=$product->note?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Содержимого нет</td>
        </tr>
    <? endif; ?>
</table>