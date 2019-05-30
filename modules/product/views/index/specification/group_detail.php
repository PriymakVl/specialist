<tr>
	<td colspan="6" class="product-group-name">Детали</td>
<tr>
<? foreach($product->specificationGroup['detail'] as $detail): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $detail->id)?'bg-green':''?>">
			<?=$detail->number?>
		</td>
		<td>
			<? if (!$detail->drawings): ?>
				<?=$detail->symbol?>
			<? elseif (count($detail->drawings) == 1): ?>
				<a href="/drawings/<?=$detail->drawings[0]->filename?>" target="_blank"><?=$detail->symbol?></a>
			<? else: ?>
				<a href="/product?id_prod=<?=$detail->id?>&tab=<?=Controller_Base::PRODUCT_TAB_DRAWINGS?>"><?=$detail->symbol?></a>
			<? endif; ?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$detail->id?>"><?=$detail->name?></a>
		</td>
		<td><?=$detail->qty?></td>
		<td>
			<?//debug($detail->timeManufacturingUnit);?>
			<? if ($detail->timeManufacturingUnit): ?>
				<?=$detail->timeManufacturingUnit?> мин.
			<? elseif ($detail->timeManufacturingItem): ?>
				<?=$detail->timeManufacturingItem?> мин.
			<? else: ?>
				<span class="red">Не указана</span>
			<? endif; ?>
		</td>
		<td><?=$detail->note?></td>
	</tr>
<? endforeach; ?>