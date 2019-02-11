<?php 
	$number = 1;
?>
<table class="list-orders" width="940">
    <tr>
        <th width="40">№</th>
        <th width="80">Обозначение</th>
        <th width="80">Наименование</th>
		<th width="80">Количество</th>
		<th width="80">Трудоемкость план, мин</th>
		<th width="80">Трудоемкость факт</th>
		<th width="80">Начало работы</th>
		<th width="80">Окончание работы</th>
    </tr>
    <? if ($products): ?>
        <?foreach ($products as $product): ?>
            <tr>
                <td><?=$number?></td>
                <td>
                    <?=$product->symbol?></a>
                </td>
                <td><?=$product->name?></td>
				<td><?=$product->orderQtyAll?></td>
				<td><? if ($product->timeManufacturingAll) echo date('i:s', $product->timeManufacturingAll);?></td>
				<td>0</td>
				<td>11.02.19г 12:00</td>
				<td>11.02.19г 13:00</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <tr>
            <td colspan="4" style="color: red;">Позиций нет</td>
        </tr>
    <? endif; ?>
</table>