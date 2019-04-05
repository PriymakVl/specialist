<tr>
	<td colspan="6" class="product-group-name">Сборочные единицы</td>
<tr>
<? foreach($product->specificationGroup['unit'] as $unit): ?>
	<tr>
		<td>
			<?=$unit->number?>
		</td>
		<td>
			<?=$unit->symbol?>
		</td>
		<td>
			<a href="/order_product?id_prod=<?=$unit->id?>"><?=$unit->name?></a>
		</td>
		<td><?=$unit->qty?></td>
		<td>
			<span class="red">Не указана</span>
		</td>
		<td><?=$unit->note?></td>
	</tr>
<? endforeach; ?>