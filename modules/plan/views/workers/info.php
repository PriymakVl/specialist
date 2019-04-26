<div id="plan-info-worker-wrp">
	<span>План на <span class="green"><?=date('d.m.y')?></span> для </span><span class="green"><?=$worker->title?></span>
	<? if ($worker->timePlanHour): ?>
		<span>загрузка</span> <span class="green"> <?=$worker->timePlanHour->hours?>ч <?=$worker->timePlanHour->minutes?>мин</span>
	<? elseif ($worker->timePlan): ?>
		<span>загрузка <?=$worker->timePlan?></span>
	<? endif; ?>
	<a id="link-list-workers" href="/plan/workers?type_order=<?=$this->get->type_order?>">К списку рабочих</a>
</div>