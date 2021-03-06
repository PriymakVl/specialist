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
			
			<!-- time plan -->
			<? if ($product->type == Product::TYPE_PRODUCT || $product->type == Product::TYPE_UNIT || $product->type == Product::TYPE_DETAIL): ?>
				<tr>
					<td>3</td>
					<td>Трудоемкость одного</td>
					<td class="left">
						<? if ($product->timePlanUnitOne): ?>
							<? if ($product->timePlanUnitOneDivision): ?>
								<? printf('%uчас. %uмин.', $product->timePlanUnitOneDivision->hours, $product->timePlanUnitOneDivision->minutes); ?>
							<? else: ?>
								<? printf('%uмин.', $product->timePlanUnitOne); ?>
							<? endif; ?>
						<? elseif ($product->timePlanDetailOne): ?>
							<? if ($product->timePlanDetailOneDivision): ?>
								<? printf('%uчас. %uмин.', $product->timePlanDetailOneDivision->hours, $product->timePlanDetailOneDivision->minutes); ?>
							<? else: ?>
								<? printf('%uмин.', $product->timePlanDetailOne); ?>
							<? endif; ?>
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