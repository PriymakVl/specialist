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
		<td>
			<? if ($other->timeManufacturing): ?>
				<?=$other->timeManufacturing?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$other->note?></td>
	</tr>
<? endforeach; ?>