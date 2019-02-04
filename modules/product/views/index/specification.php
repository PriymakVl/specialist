<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Спецификация</label>
    <div class="tab-content">
        <table width="900">
            <? if ($product->specification): ?>
                <tr>
                    <th width="40">
                        <input type="checkbox" disabled>
                    </th>
                    <th width="150">Обозначение</th>
                    <th width="400">Наименование</th>
                    <th width="100">Трудоем-ть</th>
                    <th>Примечание</th>
                </tr>
                <? foreach($product->specification as $prod): ?>
                    <tr>
                        <td class="<?=($id_active == $prod->id)?'bg-green':''?>">
                            <input type="checkbox" name="specif" id_prod="<?=$prod->id?>">
                        </td>
                        <td>
							<?=$prod->symbol?>
                        </td>
                        <td>
							<a href="/product?id_prod=<?=$prod->id?>"><?=$prod->name?></a>
						</td>
                        <td><?=$prod->timeProduction?></td>
                        <td><?=$prod->note?></td>
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