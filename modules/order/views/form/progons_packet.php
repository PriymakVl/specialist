<div id="form-progon-packet-wrp" class="form-progon-wrp" style="display: none;">
    <h2>Прогоны заказа</h2>
    <form action="/order/progon?type=<?=Order::TYPE_PACKET?>" method="post">
        <div id="not-progon-wrp">
            <input type="checkbox" name="not-progons">
            <label>Сохранить без прогона</label>
        </div>
        <!-- table -->
        <table>
            <tr>
                <th width="40">№</th>
                <th>Стеклопакет</th>
                <th>Закалка</th>
                <th>Эмалит</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <input type="text" name="packet[]">
                </td>
                <td>
                    <input type="text" name="temp_packet[]">
                </td>
                <td>
                    <input type="text" name="emalit[]">
                </td>
            </tr>
        </table>
        <!-- buttons -->
        <input type="hidden" name="ids">
        <input type="submit" value="Сохранить" class="progons-save">
        <input type="button" value="Добавить строку" id="progon-add">
        <input type="button" value="Отменить" class="progon-close">
    </form>
</div>