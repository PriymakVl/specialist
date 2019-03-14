<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Спецификация</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
            <? if ($product->specification): ?>
                <tr>
                    <th width="40">№</th>
                    <th width="200">Обозначение</th>
                    <th width="340">Наименование</th>
					<th width="100">Колич-во</th>
                    <th width="100">Трудоем-ть</th>
                    <th>Примечание</th>
                </tr>
                <? foreach($product->specification as $prod): ?>
                    <tr>
                        <td class="<?=($id_active == $prod->id)?'bg-green':''?>">
                            <input type="hidden" name="specif" id_prod="<?=$prod->id?>">
							<?=$prod->number?>
                        </td>
                        <td>
							<? if ($prod->type == Product::TYPE_CATEGORY): ?>
								<span>Категория</span>
							<? else: ?>
								<?=$prod->symbol?>
							<? endif; ?>
                        </td>
                        <td>
							<a href="/product?id_prod=<?=$prod->id?>"><?=$prod->name?></a>
						</td>
						<td><?=$prod->quantity?></td>
                        <td>
							<? if ($prod->timeManufacturing): ?>
								<?=$prod->timeManufacturing?> мин.</td>
							<? else: ?>
								<span class="red">Не указана</span>
							<? endif; ?>
                        <td><?=$prod->note?></td>
                    </tr>
					<? $number++; ?>
                <? endforeach; ?>
            <? else: ?>
                <tr>
                    <td>Нет содержимого</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>