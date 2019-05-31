<tr>
	<td colspan="6" class="product-group-name">Изделия</td>
<tr>
<? foreach($product->specificationGroup['product'] as $prod_specif): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $prod_specif->id)?'bg-green':''?>">
			<?=$prod_specif->number?>
		</td>
		<td>
			<? if (!$prod_specif->drawings): ?>
				<?=$prod_specif->symbol?>
			<? elseif (count($prod_specif->drawings) == 1): ?>
				<a href="/web/drawings/<?=$prod_specif->drawings[0]->filename?>" target="_blank"><?=$prod_specif->symbol?></a>
			<? else: ?>
				<a href="/product?id_prod=<?=$prod_specif->id?>"><?=$prod_specif->symbol?></a>
			<? endif; ?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$prod_specif->id?>&tab=<?=Controller_Base::PRODUCT_TAB_DRAWINGS?>"><?=$prod_specif->name?></a>
		</td>
		<td><?=$prod_specif->qty?></td>
		<!-- time plan -->
		<?php
			$time_plan_unit = $prod_specif->timePlanUnitAll ? $prod_specif->timePlanUnitAll : $prod_specif->timePlanUnitOne;
			$time_plan_unit_division = $prod_specif->timePlanUnitAllDivision ? $prod_specif->timePlanUnitAllDivision : $prod_specif->timePlanUnitOneDivision;
			$time_plan_detail = $prod_specif->timePlanDetailAll ? $prod_specif->timePlanDetailAll : $prod_specif->timePlanDetailOne;
			$time_plan_detail_division = $prod_specif->timePlanDetailAllDivision ? $prod_specif->timePlanDetailAllDivision : $prod_specif->timePlanDetailOneDivision;
			include 'time_plan.php';
		?>
		<!-- note -->
		<td><?=$prod_specif->note?></td>
	</tr>
<? endforeach; ?>