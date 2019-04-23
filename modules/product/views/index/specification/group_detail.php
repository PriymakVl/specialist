<tr>
	<td colspan="6" class="product-group-name">Детали</td>
<tr>
<? foreach($product->specificationGroup['detail'] as $detail): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $detail->id)?'bg-green':''?>">
			<?=$detail->number?>
		</td>
		<td>
			<?=$detail->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$detail->id?>"><?=$detail->name?></a>
		</td>
		<td><?=$detail->qty?></td>
		<td>
			<? if ($detail->timeManufacturingItem): ?>
				<?=$detail->timeManufacturingItem?> мин.</td>
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		<td><?=$detail->note?></td>
	</tr>
<? endforeach; ?>