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
							<a href="/product?id_prod=<?=$product->id?>"><?=$product->symbol?></a>
						</td>
						<td><?=$product->name?></td>
						<td><?=$product->orderQtyAll?></td>
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