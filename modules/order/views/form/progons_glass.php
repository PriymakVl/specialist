<div id="form-progon-glass-wrp" class="form-progon-wrp" style="display: none;">
    <h2>Прогоны заказа</h2>
    <form action="/order/progon?type=<?=Order::TYPE_GLASS?>" method="post">
        <div id="not-progon-wrp">
            <input type="checkbox" name="not-progons">
            <label>Сохранить без прогона</label>
        </div>
        <!-- table -->
        <table>
            <tr>
                <th width="40">№</th>
                <th>Закалка</th>
                <th>Порезка</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <input type="text" name="temp_glass[]">
                </td>
                <td>
                    <input type="text" name="cut[]">
                </td>
            </tr>
        </table>
        <!-- buttons -->
        <input type="hidden" name="ids">
        <input type="submit" value="Сохранить" class="progons-save">
        <input type="button" value="Отменить" class="progon-close">
    </form>
</div>