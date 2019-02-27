<?php
	$state = empty($params['state']) ? null : $params['state'];
?>
<div id="statistics-filters-wrp">
	<h3><?=$worker->title?></h3>
	<!-- state -->
	<div id="state-order-action-wrp">
		<label>Состояние: </label>
		<select id="state-order-action">
			<option value="<?=Order::STATE_WORK_PLANED?>" <? if ($state == Order::STATE_WORK_PLANED) echo 'selected'; ?> >Запланированы</option>
			<option value="<?=Order::STATE_WORK_END?>" <? if ($state == Order::STATE_WORK_END) echo 'selected'; ?>>Выполнены</option>
			<option value="all">Все</option>
		</select>
	</div>
	<!-- period -->
	<div class="statistics-period-filter-wrp">
		<label>Период: </label>
		<select id="statistics-period-filter">
			<option value="">За день</option>
			<!--<option value="">За месяц</option>
			<option value="">За год</option>
			<option value="">За все время</option>-->
		</select>
	</div>
</div>