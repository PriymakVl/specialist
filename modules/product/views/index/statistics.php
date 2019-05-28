<?
	$number = 1;
?>
<li>
    <input type="radio" name="tabs" id="tab-4">
    <label for="tab-4">Статистика</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
			<tr>
				<th width="40">№</th>
				<th width="200">Заказ</th>
				<th width="100">Кол-во</th>
				<th width="150">Состояние</th>
				<th width="200">Фактическое время</th>
				<th>Примечание</th>
			</tr>
			<? foreach($product->orderProducts as $item): ?>
				<tr>
					<td><?=$number?></td>
					<td>
						<a href="/order?id_order=<?=$item->order->id?>"><?=$item->order->symbol?></a>
					</td>
					<td><?=$item->qty, 'шт.'?></td>
					<td style="background:<?=$item->stateBg?>"><?=$item->stateString?></td>
					<td>
						<?=$item->timeFact.'мин.'?></td>
					<td></td>
				</tr>
				<? $number++; ?>
			<? endforeach; ?>
        </table>
    </div>
</li>