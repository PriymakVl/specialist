<tr>
	<td colspan="6" class="product-group-name">Детали</td>
<tr>
<? foreach($product->specificationGroup['detail'] as $detail): ?>
	<tr>
		<td class="<?=($id_active == $product->id)?'bg-green':''?>">
			<?=$detail->number?>
		</td>
		<td>
			<?=$detail->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$detail->id?>"><?=$detail->name?></a>
		</td>
		<td><?=$detail->quantity?></td>
		<td>
			<? if ($detail->timeManufacturing): ?>
				<?=$detail->timeManufacturing?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$detail->note?></td>
	</tr>
<? endforeach; ?>