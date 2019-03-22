<ul>
	<? if ($order->state == OrderState::REGISTERED): ?>
		<li><a href="/order/to_preparation?id_order=<?=$order->id?>">В подготовку</a></li>
	<? elseif($order->state == OrderState::PREPARATION): ?>
		<li><a href="/order/to_work?id_order=<?=$order->id?>">Выдать в работу</a></li>
	<? elseif ($order->state == OrderState::WORK): ?>
			<li><a href="/order/to_made?id_order=<?=$order->id?>">Заказ выполнен</a></li>
	<? endif; ?>
</ul>