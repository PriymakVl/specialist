<tr>
	<td colspan="6" class="product-group-name">Прочие изделия</td>
<tr>
<? foreach($product->specificationGroup['other'] as $other): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $other->id)?'bg-green':''?>">
			<?=$other->number?>
		</td>
		<td>
			<?=$other->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$other->id?>"><?=$other->name?></a>
		</td>
		<td><?=$other->qty?></td>
		<td><?=$detail->note?></td>
		<td style="background:<?=$detail->stateBg?>"><?=$detail->stateString?></td>
	</tr>
<? endforeach; ?>