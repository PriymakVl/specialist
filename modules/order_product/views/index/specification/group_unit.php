<tr>
	<td colspan="6" class="product-group-name">Сборочные единицы</td>
<tr>
<? foreach($product->specificationGroup['unit'] as $unit): ?>
	<tr>
		<td>
			<?=$unit->options->number?>
		</td>
		<td>
			<?=$unit->options->symbol?>
		</td>
		<td>
			<a href="/order_product?id_prod=<?=$unit->id?>"><?=$unit->options->name?></a>
		</td>
		<td><?=$unit->qty?></td>
		<td>
			<span class="red">Не указана</span>
		</td>
		<td><?=$unit->note?></td>
	</tr>
<? endforeach; ?>