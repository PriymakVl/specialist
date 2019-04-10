<tr>
	<td colspan="6" class="product-group-name">Изделия</td>
<tr>
<? foreach($product->specificationGroup['product'] as $prod_specif): ?>
	<tr>
		<td>
			<?=$prod_specif->number?>
		</td>
		<td>
			<?=$prod_specif->symbol?>
		</td>
		<td>
			<a href="/order_product?id_prod=<?=$prod_specif->id?>"><?=$prod_specif->name?></a>
		</td>
		<td><?=$prod_specif->qty?></td>
		<td><?=$detail->note?></td>
		<td style="background:<?=$detail->stateBg?>"><?=$detail->stateString?></td>
	</tr>
<? endforeach; ?>