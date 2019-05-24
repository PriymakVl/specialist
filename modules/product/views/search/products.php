<table class="list-products" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="200">Обозначение</th>
        <th width="550">Наименование</th>
		<th>Примечание</th>
    </tr>
    <? if ($products): ?>
        <?foreach ($products as $product): ?>
            <tr>
                <td>
                    <input type="checkbox" name="product" id_prod="<?=$product->id?>">
                </td>
                <td>
                    <a href="/product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
                </td>
				<td>
                    <?=$product->name?>
                </td>
				<td><?=$product->note?></td>
            </tr>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="3" style="color: red;">Продуктов нет</td>
        </tr>
    <? endif; ?>
</table>