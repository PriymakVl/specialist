<div id="filter-actions-wrp">
	<form action="/terminal/action">
		<select id="actions">
			<option value="all">Все операции без дополн.</option>
			<? foreach ($data_actions as $item): ?>
				<option <? if ($item->id == $params['action']) echo 'selected'; ?> value="<?=$item->id?>"><?=$item->name?></option>
			<? endforeach; ?>
			<option value="unplan" <? if ($params['action'] == 'unplan') echo 'selected';?>>Дополнительные операц.</option>
		</select>
	</form>
</div>