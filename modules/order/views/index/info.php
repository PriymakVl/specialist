<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
		<h3>Заказ: <span class="red"><?=$order->symbol?></span></h3>
        <table>
            <tr>
                <th width="50">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Состояние</td>
                <td><?=$order->convertState?></td>
            </tr>
			<tr>
				<td>2</td>
				<td>Приоритет заказа</td>
				<td><?=$order->convertRating?></td>
			</tr>
            <tr>
                <td>3</td>
                <td>Срок выполнения</td>
                <td>
					<? if ($order->date_exec): ?>
						<?=date('d.m.y', $order->date_exec)?>
					<? else: ?>
						<span class="red">Не указан</span>
					<? endif; ?>
				</td>
            </tr>
			<tr>
                <td>4</td>
                <td>Дата регистрации</td>
                <td>
					<? if ($order->date_reg): ?>
						<?=date('d.m.y', $order->date_reg)?>
					<? else: ?>
						<span class="red">Не указана</span>
					<? endif; ?>
				</td>
            </tr>
        </table>
		
		<!-- table order positions -->
		<? include_once('order_positions.php'); ?>
		
    </div>
</li>