<tr>
	<td colspan="6" class="product-group-name">Детали</td>
<tr>
<? foreach($product->specificationGroup['detail'] as $detail): ?>
	<tr>
		<td>
			<?=$detail->number?>
		</td>
		<td>
			<?=$detail->symbol?>
		</td>
		<td>
			<a href="/order_product?id_prod=<?=$detail->id?>"><?=$detail->name?></a>
		</td>
		<td><?=$detail->qty?></td>
		<td><?=$detail->note?></td>
		<td style="background:<?=$detail->stateBg?>"><?=$detail->stateString?></td>
	</tr>
<? endforeach; ?>