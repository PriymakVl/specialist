<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Спецификации</label>
    <div class="tab-content">
        <table width="900">
            <? if ($product->specifications): ?>
                <tr>
                    <th width="40">
                        <input type="checkbox" disabled>
                    </th>
                    <th width="150">Обозначение</th>
                    <th width="400">Наименование</th>
                    <th width="100">Трудоем-ть</th>
                    <th>Примечание</th>
                </tr>
                <? foreach($product->specifications as $specification): ?>
                    <tr>
                        <td class="<?=($id_active == $specification->id)?'bg-green':''?>">
                            <input type="checkbox" name="specif" id_specif="<?=$specification->id?>">
                        </td>
                        <td>
                            <a href="/specification/content?id_specif=<?=$specification->id?>"><?=$specification->symbol?></a>
                        </td>
                        <td><?=$specification->name?></td>
                        <td><?=$specification->time_production?></td>
                        <td><?=$specification->note?></td>
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