<tr>
	<td colspan="6" class="product-group-name">Изделия</td>
<tr>
<? foreach($product->specificationGroup['product'] as $prod_specif): ?>
	<tr>
		<td class="<?=($id_active == $prod_specif->id)?'bg-green':''?>">
			<?=$prod_specif->number?>
		</td>
		<td>
			<?=$prod_specif->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$prod_specif->id?>"><?=$prod_specif->name?></a>
		</td>
		<td><?=$prod_specif->quantity?></td>
		<td>
			<? if ($prod_specif->timeActions): ?>
				<?=$prod_specif->timeActions?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$prod_specif->note?></td>
	</tr>
<? endforeach; ?>