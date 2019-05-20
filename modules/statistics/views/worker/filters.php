<?php
	$period_start = $this->get->period_start ? $this->get->period_start : date('d.m.y');
	$period_end = $this->get->period_end ? $this->get->period_end : date('d.m.y');
	
	$default_actions = Action::getAll('actions');
?>

<div id="statistics-filters-wrp">
	<h3 class="green"><?=$worker->title?></h3>
	<form action="/statistics/worker?id_worker=<?=$worker->id?>" method="get">
		<!-- period -->
		<div class="statistics-period-filter-wrp" id="period-fact-action">
			<label>От: </label>
			<input type="text" name="period_start" class="datepicker" value="<?=$period_start?>">
			<label>До: </label>
			<input type="text" name="period_end" class="datepicker" value="<?=$period_end?>">
			<!-- id worker -->
			<input type="hidden" value="<?=$worker->id?>" name="id_worker">
		</div>
		<input type="submit" value="Показать" id="show-statistics-worker">
	</form>
	
	<!-- filter actions -->
	<div id="statistics-filter-actions-wrp">
		<label>Операции:</label>
		<select id="statistics-filter-actions">
			<option value="" <? if (!$this->get->action) echo 'selected'; ?>>Все операции</option>
			<? foreach ($default_actions as $item): ?>
				<option <? if ($item->name == $this->get->action) echo 'selected'; ?> value="<?=$item->name?>"><?=$item->name?></option>
			<? endforeach; ?>
			<option value="other" <? if ($this->get->action == 'other') echo 'selected'; ?>>Разные</option>
		</select>
	</div>
	
</div>