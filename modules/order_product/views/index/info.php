<?php
	$tab_1 = false;
	if (!$product->specification && !$product->actions) $tab_1 = true;
	if ($this->get->tab == 1) $tab_1 = true;
?>
<li>
    <input type="radio" name="tabs" id="tab-1" <? if ($tab_1) echo 'checked'; ?>>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
		<h2>
			<span>Заказ: </span><a href="/order?id_order=<?=$product->order->id?>" style="margin-right: 20px; color:green;"><?=$product->order->symbol?></a>
			<?=$product->name?>: <span class="green"><?=$product->symbol?></span>
		</h2>
        <table width="900">
            <tr>
                <th width="50">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
			<tr>
                <td>2</td>
                <td>Количество</td>
                <td class="left"><? if ($product->qty) echo $product->qty.' шт.'?></td>
            </tr>
			
			<!-- time manufacturing -->
			<tr>
				<td>3</td>
				<td>Трудоемкость</td>
				<td class="left">
					<span class="red">Не указана</span>
				</td>
			</tr>
			
			<!-- product state -->
			<tr>
				<td>4</td>
				<td>Состояние</td>
				<td style="background:<?=$product->stateBg?>"><?=$product->stateString?></td>
			</tr>
			
			<!-- parent -->
			<? if ($product->parent): ?>
				<tr>
                    <td>5</td>
                    <td>Родитель</td>
                    <td class="left red">
						<? if ($product->id_parent): ?>
							<a href="/order_product?id_prod=<?=$product->id_parent?>"><?=$product->parent->name?> <span style="font-weight: bold;"><?=$product->parent->symbol?></span></a>
						<? else: ?>
							<a href="/order?id_order=<?=$product->order->id?>">Заказ: <?=$product->order->symbol?></a>
						<? endif; ?>
					</td>
                </tr>
			<? endif; ?>
			
			<!-- note product -->
            <? if ($product->note): ?>
                <tr>
                    <td>6</td>
                    <td>Примечание</td>
                    <td class="left red"><?=$product->note?></td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>