<tr>
	<td colspan="6" class="product-group-name">Прочие изделия</td>
<tr>
<? foreach($product->specificationGroup['other'] as $other): ?>
	<tr>
		<td class="<?=($id_active == $other->id)?'bg-green':''?>">
			<?=$other->number?>
		</td>
		<td>
			<?=$other->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$other->id?>"><?=$other->name?></a>
		</td>
		<td><?=$other->quantity?></td>
		<td class="red">Не изготав.</td>
		<td><?=$other->note?></td>
	</tr>
<? endforeach; ?>