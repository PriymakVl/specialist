<td>
	<? if ($time_plan_unit): ?>
	<? if ($time_plan_unit_division): ?>
		<? printf('%uчас. %uмин.', $time_plan_unit_division['hour'], $time_plan_unit_division['minutes']); ?>
	<? else: ?>
		<? printf('%uмин.', $time_plan_unit); ?>
	<? endif; ?>
	<? elseif ($time_plan_detail): ?>
		<? if ($time_plan_detail_division): ?>
			<? printf('%uчас. %uмин.', $time_plan_detail_division['hour'], $time_plan_detail_division['minutes']); ?>
		<? else: ?>
			<? printf('%uмин.', $time_plan_detail); ?>
		<? endif; ?>
	<? else: ?>
		<span class="red">Не указана</span>
	<? endif; ?>
</td>
