<?php
	$period_start = $this->get->period_start ? $this->get->period_start : date('d.m.y');
	$period_end = $this->get->period_end ? $this->get->period_end : date('d.m.y');
?>
<div id="statistics-filters-wrp">
	<form action="/statistics/worker?id_worker=<?=$worker->id?>" method="post">
		<h3><?=$worker->title?></h3>
		<!-- period -->
		<div class="statistics-period-filter-wrp" id="period-fact-action">
			<label>От: </label>
			<input type="text" name="period_start" class="datepicker" value="<?=$period_start?>">
			<label>До: </label>
			<input type="text" name="period_end" class="datepicker" value="<?=$period_end?>">
		</div>
		<input type="submit" value="Показать" id="show-statistics-worker">
	</form>
</div>