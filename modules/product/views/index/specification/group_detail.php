<tr>
	<td colspan="6" class="product-group-name">Детали</td>
<tr>
<? foreach($product->specificationGroup['detail'] as $detail): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $detail->id)?'bg-green':''?>">
			<?=$detail->number?>
		</td>
		<!-- product symmbol -->
		<td>
			<? if (!$detail->drawings): ?>
				<?=$detail->symbol?>
			<? elseif (count($detail->drawings) == 1): ?>
				<a href="/web/drawings/<?=$detail->drawings[0]->filename?>" target="_blank"><?=$detail->symbol?></a>
			<? else: ?>
				<a href="/product?id_prod=<?=$detail->id?>&tab=<?=Controller_Base::PRODUCT_TAB_DRAWINGS?>"><?=$detail->symbol?></a>
			<? endif; ?>
		</td>
		<!-- product name -->
		<td>
			<a href="/product?id_prod=<?=$detail->id?>"><?=$detail->name?></a>
		</td>
		<!-- quntity -->
		<td><?=$detail->qty?></td>
		<!-- time plan -->
		<?php
			$time_plan_unit = $detail->timePlanUnitAll ? $detail->timePlanUnitAll : $detail->timePlanUnitOne;
			$time_plan_unit_division = $detail->timePlanUnitAllDivision ? $detail->timePlanUnitAllDivision : $detail->timePlanUnitOneDivision;
			$time_plan_detail = $detail->timePlanDetailAll ? $detail->timePlanDetailAll : $detail->timePlanDetailOne;
			$time_plan_detail_division = $detail->timePlanDetailAllDivision ? $detail->timePlanDetailAllDivision : $detail->timePlanDetailOneDivision;
			include 'time_plan.php';
		?>
		<!-- note -->
		<td><?=$detail->note?></td>
	</tr>
<? endforeach; ?>