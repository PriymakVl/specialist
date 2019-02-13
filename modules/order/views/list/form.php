<div id="form-order-wrp" style="display: none;">
    <h2>Форма для добавления заказа</h2>
    <form action="/order/add" method="post">
        <!-- first box -->
        <div class="form-box">
            <!-- order symbol-->
            <div id="form-order-symbol-wrp">
                <label>Обозначение заказа:</label>
                <input type="text" name="symbol">
            </div>

            <!-- type orders-->
            <div id="form-order-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_CYLINDER?>">Пневмоцилиндры</option>
                    <option value="<?=Order::TYPE_CAR_NUMBER?>">Автономера</option>
                </select>
            </div>

            <!-- date execution-->
            <div id="form-order-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" id="datepicker">
            </div>
        </div>

        <!-- order description -->
        <div id="form-order-description-wrp">
            <label>Описание заказа:</label>
            <input type="text" name="description">
        </div>

        <!-- note -->
        <div id="form-note-wrp">
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" id="add-order" name="save">
            <input type="button" id="hide-form-order" value="Отменить">
        </div>
    </form>
</div>