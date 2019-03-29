<tr>
	<td colspan="6" class="product-group-name">Изделия</td>
<tr>
<? foreach($product->specificationGroup['product'] as $prod_specif): ?>
	<tr>
		<td>
			<?=$prod_specif->options->number?>
		</td>
		<td>
			<?=$prod_specif->options->symbol?>
		</td>
		<td>
			<a href="/order_product?id_prod=<?=$prod_specif->id?>"><?=$prod_specif->options->name?></a>
		</td>
		<td><?=$prod_specif->qty?></td>
		<td>
			<span class="red">Не указана</span>
		</td>
		<td><?=$prod_specif->note?></td>
	</tr>
<? endforeach; ?>