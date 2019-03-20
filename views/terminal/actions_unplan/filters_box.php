<?php
	$all_actions = DataAction::getAll('data_actions');
?>
<div id="filters-wrp">
	<!-- filter actions -->
	<div id="filter-actions-wrp">
		<form action="/terminal/action">
			<select id="filter-actions">
				<option value="all">Все операции без дополн.</option>
				<? foreach ($all_actions as $item): ?>
					<option value="<?=$item->id?>"><?=$item->name?></option>
				<? endforeach; ?>
				<option value="unplan" selected>Дополнительные операц.</option>
			</select>
		</form>
	</div>
</div>