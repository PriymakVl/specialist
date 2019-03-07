<?php
	$state = empty($params['state']) ? null : $params['state'];
?>
<div id="statistics-filters-wrp">
	<h3><?=$worker->title?></h3>
	<!-- state -->
	<div id="state-order-action-wrp">
		<label>Состояние: </label>
		<select id="state-order-action">
			<option value="<?=OrderActionState::ENDED?>" <? if ($state == OrderActionState::ENDED) echo 'selected'; ?>>Выполнены</option>
			<option value="<?=OrderActionState::PLANED?>" <? if ($state == OrderActionState::PLANED) echo 'selected'; ?> >Запланированы</option>
		</select>
	</div>
	<!-- period -->
	<div class="statistics-period-filter-wrp">
		<label>От: </label>
		<input type="text" name="period-start" class="datepicker" value="<?=date('d.m.y');?>">
		<label>До: </label>
		<input type="text" name="period-end" class="datepicker" value="<?=date('d.m.y');?>">
	</div>
	<input type="submit" value="Показать" id="show-statistics-worker">
</div>