<tr>
	<td colspan="6" class="product-group-name">Изделия</td>
<tr>
<? foreach($product->specificationGroup['product'] as $prod_specif): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $prod_specif->id)?'bg-green':''?>">
			<?=$prod_specif->number?>
		</td>
		<td>
			<?=$prod_specif->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$prod_specif->id?>"><?=$prod_specif->name?></a>
		</td>
		<td><?=$prod_specif->qty?></td>
		<td>
			<? if ($prod_specif->timeManufacturingUnit): ?>
				<?=$prod_specif->timeManufacturingUnit?> мин.
			<? elseif ($prod_specif->timeManufacturingItem): ?>
				<?=$prod_specif->timeManufacturingItem?> мин.
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		</td>
		<td><?=$prod_specif->note?></td>
	</tr>
<? endforeach; ?>