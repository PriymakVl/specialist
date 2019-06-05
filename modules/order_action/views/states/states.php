<?php
	$number = 1;
?>
<table class="list-states-action-order" width="940">
    <tr>
        <th width="40">
            <input type="checkbox" disabled>
        </th>
        <th width="300">Состояние</th>
        <th width="200">Время начала</th>
		<th width="200">Продолжительность</th>
		<th>Кто отметил</th>
    </tr>
        <?foreach ($action->states as $state): ?>
            <tr>
				<td><?=$number?></td>
                <td style="background: <?=$state->bg?>;"><?=$state->name?></td>
                <td>
					<span class="green bold"><?=date('h:i', $state->time)?></span>&nbsp;&nbsp;&nbsp;&nbsp;<?=date('d.m.y', $state->time)?> 
				</td>
				<td>
					<? if ($state->duration): ?>
						<? if ($state->durationHour): ?>
							<?=$state->durationHour->hours?> час. <?=$state->durationHour->minutes?> мин.
						<? else: ?>
							<?=$state->duration.'мин.'?>
						<? endif; ?>
					<? elseif ($state->duration === false): ?>
						<span>Работа закончена</span>
					<? else: ?>
						<span>Меньше минуты</span>
					<? endif; ?>
				</td>
				<td>
					<? if ($state->user): ?>
						<?=$state->user->title?>
					<? else: ?>
						<span class="red">Не указан</span>
					<? endif; ?>
				</td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
</table>