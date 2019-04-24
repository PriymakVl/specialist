<tr>
	<td colspan="6" class="product-group-name">Сборочные единицы</td>
<tr>
<? foreach($product->specificationGroup['unit'] as $unit): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $unit->id)?'bg-green':''?>">
			<?=$unit->number?>
		</td>
		<td>
			<?=$unit->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$unit->id?>"><?=$unit->name?></a>
		</td>
		<td><?=$unit->qty?></td>
		<td>
			<? if ($unit->timeManufacturingUnit): ?>
				<?=$unit->timeManufacturingUnit?> мин.
			<? elseif ($unit->timeManufacturingItem): ?>
				<?=$unit->timeManufacturingItem?> мин.
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		</td>
		<td><?=$unit->note?></td>
	</tr>
<? endforeach; ?>