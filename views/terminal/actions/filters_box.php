<div id="filter-actions-wrp">
	<form action="/terminal/action">
		<select id="actions">
			<option value="all">Все операции</option>
			<? foreach ($actions as $item): ?>
				<option <? if ($item->id == $params['id_action']) echo 'selected'; ?> value="<?=$item->id?>"><?=$item->name?></option>
			<? endforeach; ?>
			<option value="unplan" <? if ($params['id_action'] == 'unplan') echo 'selected';?>>Дополнительные</option>
		</select>
	</form>
</div>