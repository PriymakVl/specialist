<div id="plan-filter-level-wrp">
<span>План на <?=date('d.m.y')?></span> - <span class="green"><?=$type_string?></span>
    <label>Уровень:</label>
    <select id="plan-level-filter">
        <option value="orders" >Заказы</option>
        <option value="products" selected>Продукты</option>
		<option value="actions">Операции</option>
		<option value="workers">Рабочие</option>
    </select>
</div>