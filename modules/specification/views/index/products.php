<?
	$number = 1;
?>
	
<table class="list-products" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
		<th width="40">№</th>
        <th width="150">Обозначение</th>
        <th width="400">Наименование</th>
        <th width="120">Кол-во</th>
        <th>Примечание</th>
    </tr>
    <? if ($specif->products): ?>
        <?foreach ($specif->products as $product): ?>
            <tr>
                <td>
                    <input type="checkbox" name="order" id_prod="<?=$product->id?>">
                </td>
				<td>
                    <?=$number?>
                </td>
                <td>
                    <a href="/product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
                </td>
                <td>
                    <a href="/product?id_prod=<?=$product->id?>"><?=$product->name?></a>
                </td>
                <td><?=$product->specifQty?> шт.</td>
                <td class="left"><?=$product->note?></td>
            </tr>
			<? $number++ ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="5" style="color: red;">Содержимого нет</td>
        </tr>
    <? endif; ?>
</table>