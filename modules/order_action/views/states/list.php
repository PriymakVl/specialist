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
                <td><?=date('d.m.y h:i', $state->time)?></td>
				<td>
					<? if ($state->duration): ?>
						<?=$state->duration.'мин.'?>
					<? elseif ($state->duration === false): ?>
						<span>Работа закончена</span>
					<? else: ?>
						<span>Меньше минуты</span>
					<? endif; ?>
				</td>
				<td><?=$state->worker->title?></td>
            </tr>
			<? $number++; ?>
        <? endforeach; ?>
</table>