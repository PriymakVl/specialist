<div id="form-order-add-wrp" style="display: none;">
    <h2>Форма для добавления заказа</h2><span id="hide-form-add">скрыть</span>
    <form action="/order/add" method="post">
        <!-- first row -->
        <div class="form-add-first-row">
            <!-- order symbol-->
            <div class="form-order-symbol-wrp">
                <label>Обозначение заказа:</label>
                <input type="text" name="symbol">
            </div>

            <!-- order description -->
            <div class="form-order-description-wrp">
                <label>Описание заказа:</label>
                <input type="text" name="description">
            </div>

            <!-- type orders-->
            <div class="form-order-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_CYLINDER?>">Пневмоцилиндры</option>
                    <option value="<?=Order::TYPE_CAR_NUMBER?>">Автономера</option>
                </select>
            </div>

            <!-- date execution-->
            <div class="form-order-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" id="datepicker">
            </div>
        </div>

        <!-- three row-->
        <div id="form-note-wrp">
            <!-- note -->
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <input type="submit" value="Сохранить" id="add-order" name="save">
    </form>
</div>