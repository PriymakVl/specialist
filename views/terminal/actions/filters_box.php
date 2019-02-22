<div id="filter-actions-wrp">
	<span id="current-action">Сборочные операции</span>
	<form action="/terminal/action">
		<select id="actions">
			<option>Не выбрана</option>
			<? foreach ($actions as $item): ?>
				<option><?=$item->name?></option>
			<? endforeach; ?>
		</select>
	</form>
</div>