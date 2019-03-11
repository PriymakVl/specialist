<?php
	$state = empty($params['state']) ? null : $params['state'];
	$period_start = empty($params['period_start']) ? date('d.m.y') : date('d.m.y', $params['period_start']);
	$period_end = empty($params['period_end']) ? date('d.m.y') : date('d.m.y', $params['period_end']);
?>
<div id="statistics-filters-wrp">
	<form action="/statistics/worker_made?id_worker=<?=$worker->id?>" method="post">
		<h3><?=$worker->title?></h3>
		<!-- state -->
		<div id="state-order-action-wrp">
			<label>Состояние: </label>
			<select id="state-order-action">
				<option value="<?=OrderActionState::ENDED?>">Выполнены</option>
				<option value="<?=OrderActionState::PLANED?>" <? if (empty($params['period_start'])) echo 'selected'; ?> >Запланированы</option>
			</select>
		</div>
		<!-- period -->
		<div class="statistics-period-filter-wrp" id="period-fact-action" <?=empty($params['period_start']) ? 'style="display:none;"' : '' ?>>
			<label>От: </label>
			<input type="text" name="period_start" class="datepicker" value="<?=$period_start?>">
			<label>До: </label>
			<input type="text" name="period_end" class="datepicker" value="<?=$period_end?>">
		</div>
		<div class="statistics-period-filter-wrp" id="period-plan-action" <?= empty($params['period_start']) ? '' : 'style="display:none;"' ?>>
			<label>Дата: </label>
			<input type="text" value="<?=date('d.m.y');?>" name="today" readonly>
		</div>
		<input type="submit" value="Показать" id="show-statistics-worker">
	</form>
</div>