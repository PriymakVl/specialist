<tr>
	<td colspan="6" class="product-group-name">Сборочные единицы</td>
<tr>
<? foreach($product->specificationGroup['unit'] as $unit): ?>
	<tr>
		<td class="<?=($id_active == $unit->id)?'bg-green':''?>">
			<?=$unit->number?>
		</td>
		<td>
			<?=$unit->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$unit->id?>"><?=$unit->name?></a>
		</td>
		<td><?=$unit->quantity?></td>
		<td>
			<? if ($unit->timeManufacturing): ?>
				<?=$unit->timeManufacturing?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$unit->note?></td>
	</tr>
<? endforeach; ?>