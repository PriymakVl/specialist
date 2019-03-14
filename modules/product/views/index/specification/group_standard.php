<tr>
	<td colspan="6" class="product-group-name">Стандартные изделия</td>
<tr>
<? foreach($product->specificationGroup['standard'] as $standard): ?>
	<tr>
		<td class="<?=($id_active == $standard->id)?'bg-green':''?>">
			<?=$standard->number?>
		</td>
		<td>
			<?=$standard->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$standard->id?>"><?=$standard->name?></a>
		</td>
		<td><?=$standard->quantity?></td>
		<td>
			<? if ($standard->timeManufacturing): ?>
				<?=$standard->timeManufacturing?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$standard->note?></td>
	</tr>
<? endforeach; ?>