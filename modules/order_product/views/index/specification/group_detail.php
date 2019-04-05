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
		<td>
			<span class="red">Не указана</span>
		</td>
		<td><?=$detail->note?></td>
	</tr>
<? endforeach; ?>