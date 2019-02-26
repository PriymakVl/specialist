<div id="filter-actions-wrp">
	<form action="/terminal/action">
		<select id="actions">
			<option value="all">Все операции</option>
			<? foreach ($actions as $item): ?>
				<option <? if ($item->id == $params['id_action']) echo 'selected'; ?> value="<?=$item->id?>"><?=$item->name?></option>
			<? endforeach; ?>
		</select>
	</form>
</div>