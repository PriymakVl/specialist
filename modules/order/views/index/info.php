<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
        <table>
            <tr>
                <th width="50">№</td>
                <th width="200">Наименование</td>
                <th>Значение</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Обозначение</td>
                <td><?=$order->symbol?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Состояние</th>
                <td><?=$order->convertState?></td>
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
        </table>
		
		<!-- table order positions -->
		<? include_once('order_positions.php'); ?>
		
    </div>
</li>