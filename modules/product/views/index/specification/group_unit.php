<tr>
	<td colspan="6" class="product-group-name">Сборочные единицы</td>
<tr>
<? foreach($product->specificationGroup['unit'] as $unit): ?>
	<tr>
		<td class="<?=($this->session->id_prod_active == $unit->id)?'bg-green':''?>">
			<?=$unit->number?>
		</td>
		<td>
			<? if (!$unit->drawings): ?>
				<?=$unit->symbol?>
			<? elseif (count($unit->drawings) == 1): ?>
				<a href="/web/drawings/<?=$unit->drawings[0]->filename?>" target="_blank"><?=$unit->symbol?></a>
			<? else: ?>
				<a href="/product?id_prod=<?=$unit->id?>&tab=<?=Controller_Base::PRODUCT_TAB_DRAWINGS?>"><?=$unit->symbol?></a>
			<? endif; ?>
		</td>
		<td>
			<a href="/product?id_prod=<?=$unit->id?>"><?=$unit->name?></a>
		</td>
		<td><?=$unit->qty?></td>
		<!-- time plan -->
		<?php
			$time_plan_unit = $unit->timePlanUnitAll ? $unit->timePlanUnitAll : $unit->timePlanUnitOne;
			$time_plan_unit_division = $unit->timePlanUnitAllDivision ? $unit->timePlanUnitAllDivision : $unit->timePlanUnitOneDivision;
			$time_plan_detail = $unit->timePlanDetailAll ? $unit->timePlanDetailAll : $unit->timePlanDetailOne;
			$time_plan_detail_division = $unit->timePlanDetailAllDivision ? $unit->timePlanDetailAllDivision : $unit->timePlanDetailOneDivision;
			include 'time_plan.php';
		?>
		<!-- note -->
		<td><?=$unit->note?></td>
	</tr>
<? endforeach; ?>