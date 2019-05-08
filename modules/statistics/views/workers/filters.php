<?php
	$period_start = $this->get->period_start ? $this->get->period_start : date('d.m.y');
	$period_end = $this->get->period_end ? $this->get->period_end : date('d.m.y');
?>
<div id="statistics-filters-wrp">
	<h3 class="green">Статистика</h3>
	<form action="/statistics/workers" method="get">
		<!-- period -->
		<div class="statistics-period-filter-wrp" id="period-fact-action">
			<label>От: </label>
			<input type="text" name="period_start" class="datepicker" value="<?=$period_start?>">
			<label>До: </label>
			<input type="text" name="period_end" class="datepicker" value="<?=$period_end?>">
		</div>
		<!-- type order -->
		<input type="hidden" name="type_order" value="<?=$this->get->type_order?>">
		<input type="submit" value="Показать" id="show-statistics-worker">
	</form>
</div>