<h2>Общая статистика</h2>
<table width="940">
	<tr>
		<th>Наим-ние операции</th>
		<th width="220">Трудоемкость плановая</th>
		<th width="220">Трудоемкость фактическая</th>
		<th>Заработал</th>
	</tr>
	<tr>
		<td>
			<? if ($this->get->action && $this->get->action == 'other'): ?>
				<span>Разные</span>
			<? elseif ($this->get->action): ?>
				<?=$this->get->action?>
			<? else: ?>
				<span>Все</span>
			<? endif; ?>
		</td>
		<!-- time plan all -->
		<td>
			<? if ($worker->timePlanMade): ?>
				<? if ($worker->timePlanMadeDivision && $worker->timePlanMadeDivision->hours): ?>
					<? printf('%uч. %uмин.', $worker->timePlanMadeDivision->hours, $worker->timePlanMadeDivision->minutes); ?>
				<? else: ?>
					<? printf('%uмин.', $worker->timePlanMade); ?>
				<? endif; ?>
			<? else: ?>
				<span class="red"></span></td>
			<? endif; ?>
		</td>
		
		<!-- time fact all -->
		<td>
			<? if ($worker->timeFact): ?>
				<? if ($worker->timeFactDivision && $worker->timeFactDivision->hours): ?>
					<? printf('%u ч. %u мин.', $worker->timeFactDivision->hours, $worker->timeFactDivision->minutes); ?>
				<? else: ?>
					<? printf('%u мин.', $worker->timeFact); ?>
				<? endif; ?>
			<? else: ?>
				<span class="red">Нет</span>
			<? endif; ?>
		</td>
		
		<td><?=$worker->cost?></td>
	<tr>
<table>
<br>


