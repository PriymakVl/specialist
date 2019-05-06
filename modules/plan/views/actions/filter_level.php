<?
	$default_actions = Action::getAll('actions');
?>
<div id="plan-filter-level-wrp">
	<span>План на <?=date('d.m.y')?></span> - <span class="green"><?=$type_string?></span>
    <label>Уровень:</label>
    <select id="plan-level-filter">
        <option value="orders" >Заказы</option>
        <option value="products">Продукты</option>
		<option value="actions" selected>Операции</option>
		<option value="workers">Рабочие</option>
    </select>
	<!-- filter actions -->
	<label>Вид</label>
	<select id="plan-filter-actions">
		<option value="" <? if (!$this->get->action) echo 'selected'; ?>>Все операции</option>
		<? foreach ($default_actions as $item): ?>
			<option <? if ($item->name == $this->get->action) echo 'selected'; ?> value="<?=$item->name?>"><?=$item->name?></option>
		<? endforeach; ?>
		<option value="other" <? if ($this->get->action == 'other') echo 'selected'; ?>>Разные</option>
	</select>
</div>