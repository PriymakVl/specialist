<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Содержание</label>
    <div class="tab-content">
        <table width="940">
            <? if ($order->content): ?>
				<tr>
					<th width="50"><input type="checkbox" disabled></th>
					<th width="150">Обозначение</th>
					<th width="400">Наименование</th>
					<th width="120">Кол-во</th>
					<th>Трудоемкось</th>
				</tr>
                <? foreach($order->content as $product): ?>
                    <tr>
						<td><input type="checkbox"></td>
						<td>
							<? if ($product->idSpecifActive): ?>
								<a href="/specification?id_specif=<?=$product->idSpecifActive?>"><?=$product->symbol?></a>
							<? else: ?>
								<?=$product->symbol?>
							<? endif; ?>
						</td>
						<td><?=$product->name?></td>
						<td><?=$product->orderQty?></td>
						<td>5 мин</td>
					</tr>
                <? endforeach; ?>
            <? else: ?>
                <tr>
                    <td>Нет содержимого</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>