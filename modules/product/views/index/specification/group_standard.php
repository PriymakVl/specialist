<tr>
	<td colspan="6" class="product-group-name">Стандартные изделия</td>
<tr>
<? foreach($product->specificationGroup['standard'] as $standard): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $standard->id)?'bg-green':''?>">
			<?=$standard->number?>
		</td>
		<td>
			<?=$standard->symbol?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$standard->id?>"><?=$standard->name?></a>
		</td>
		<td><?=$standard->qty?></td>
		<td class="red">Не изготав.</td>
		<td><?=$standard->note?></td>
	</tr>
<? endforeach; ?>