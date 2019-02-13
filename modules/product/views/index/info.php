<li>
    <input type="radio" name="tabs" id="tab-1" checked>
    <label for="tab-1">Информация</label>
    <div class="tab-content">
        <table width="900">
            <tr>
                <th width="50">№</th>
                <th width="200">Наименование</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>1</th>
                <td>Обозначение</th>
                <td class="left"><?=$product->symbol?></th>
            </tr>
            <tr>
                <td>2</th>
                <td>Наименование</th>
                <td class="left"><?=$product->name?></th>
            </tr>
            <? if ($product->note): ?>
                <tr>
                    <td>3</th>
                    <td>Примечание</th>
                    <td class="left red"><?=$product->note?></th>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>