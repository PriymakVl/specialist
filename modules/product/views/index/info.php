<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
            <tr>
                <th width="50">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Номер в спецификации</td>
                <td class="left">
					<? if ($product->number): ?>
						<?=$product->number?></td>
					<? else: ?>
						<span class="red">Не указан</span>
					<? endif; ?>
            </tr>
			<tr>
                <td>2</td>
                <td>Количество</td>
                <td class="left"><? if ($product->qty) echo $product->qty.' шт.'?></td>
            </tr>
			
			<!-- time manufacturing -->
			<? if ($product->type != Product::TYPE_CATEGORY): ?>
				<tr>
					<td>3</td>
					<td>Трудоемкость</td>
					<td class="left">
						<? if ($product->timeManufacturingUnit): ?>
							<?=$product->timeManufacturingUnit?> мин.
						<? elseif ($product->timeManufacturingItem): ?>
							<?=$product->timeManufacturingItem?> мин.
						<? else: ?>
							<span class="red">Не указана</span>
						<? endif; ?>
					</td>
				</tr>
			<? endif; ?>
			
			<!-- type product -->
			<tr>
                <td>4</td>
                <td>Тип</td>
                <td class="left"><?=$product->typeString?></td>
            </tr>
			
			<!-- parent -->
			<? if ($product->parent): ?>
				<tr>
                    <td>5</td>
                    <td>Родитель</td>
                    <td class="left red">
						<a href="/product?id_prod=<?=$product->parent->id?>"><?=$product->parent->name?> <span style="font-weight: bold;"><?=$product->parent->symbol?></span></a>
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