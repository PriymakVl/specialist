<?php
    $selected_reg = ($this->get->state == OrderState::REGISTERED) ? 'selected' : '';
    $selected_prep = ($this->get->state == OrderState::PREPARATION) ? 'selected' : '';
	$selected_work = ($this->get->state == OrderState::WORK) ? 'selected' : '';
	$selected_made = ($this->get->state == OrderState::MADE) ? 'selected' : '';
	$selected_waiting = ($this->get->state == OrderState::WAITING) ? 'selected' : '';
	$selected_sent = ($this->get->state == OrderState::SENT) ? 'selected' : '';
    $selected_all = ($this->get->state == OrderState::ALL) ? 'selected' : '';
?>

<div id="order-filters-wrp">
    <span>Заказы:</span>
	<label>Состояние:</label>
    <select id="order-filter-state">
        <option value="<?=OrderState::REGISTERED?>" <?=$selected_reg?>>Зарегистрированы</option>
        <option value="<?=OrderState::PREPARATION?>" <?=$selected_prep?>>В подготовке</option>
		<option value="<?=OrderState::WORK?>" <?=$selected_work?>>В работе</option>
		<option value="<?=OrderState::WAITING?>" <?=$selected_waiting?>>Отложены</option>
		<option value="<?=OrderState::MADE?>" <?=$selected_made?>>Выполнены</option>
		<option value="<?=OrderState::SENT?>" <?=$selected_sent?>>Отправлены заказчику</option>
        <option value="<?=OrderState::ALL?>" <?=$selected_all?>>Все</option>
    </select>
	<label>Тип</label>
	<select id="order-filter-type">
        <option value="<?=Order::TYPE_CYLINDER?>">Пневмо</option>
        <option value="<?=Order::TYPE_CAR_NUMBER?>">Пресса и накатки</option>
        <option value="<?=Order::TYPE_ALL?>">Все</option>
    </select>
</div>