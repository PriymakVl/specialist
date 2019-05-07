<?php
	$period_start = $this->get->period_start ? $this->get->period_start : date('d.m.y');
	$period_end = $this->get->period_end ? $this->get->period_end : date('d.m.y');
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
	<a href="/statistics/workers?type_order=<?=$worker->defaultTypeOrder?>" id="link-list-workers">К списку рабочих</a>
</div>