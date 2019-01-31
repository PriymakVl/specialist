<?php
    $state = $params['state'];
    $selected_reg = ($state == OrderState::REGISTERED) ? 'selected' : '';
    $selected_prep = ($state == OrderState::PREPARATION) ? 'selected' : '';
	$selected_work = ($state == OrderState::WORK) ? 'selected' : '';
    $selected_all = ($state == OrderState::ALL) ? 'selected' : '';
?>

<div id="order-filters-wrp">
    <span>Заказы:</span>
    <select id="order-filter-state">
        <option value="<?=OrderState::REGISTERED?>" <?=$selected_reg?>>Зарегистрированые</option>
        <option value="<?=OrderState::PREPARATION?>" <?=$selected_prep?>>В подготовке</option>
		<option value="<?=OrderState::WORK?>" <?=$selected_work?>>В работе</option>
        <option value="<?=OrderState::ALL?>" <?=$selected_all?>>Все</option>
    </select>
</div>