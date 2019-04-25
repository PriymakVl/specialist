<div id="plan-filter-level-wrp">
	<span>План на <?=date('d.m.y')?></span> - <span class="green"><?=$type_string?></span>
    <label>Уровень:</label>
    <select id="plan-level-filter">
        <option value="orders" >Заказы</option>
        <option value="products">Продукты</option>
		<option value="actions">Операции</option>
		<option value="actions" selected>Рабочие</option>
    </select>
	
	<label>Рабочие:</label>
    <select id="workers">
        <option value="" >Не указан</option>
		<? if ($workers): ?>
			<? foreach ($workes as $worker): ?>
				<option value="<?=$worker->id?>"><?=$worker->title?></option>
			<? endforeach; ?>
		<? endif; ?>
    </select>
</div>