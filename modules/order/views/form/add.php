<div id="form-add-wrp" style="display: none;">
    <h2>Форма для добавления заказа <span id="hide-form-add">скрыть</span></h2>
    <form action="/order/add" method="post">
        <!-- first row -->
        <div class="form-add-first-row">
            <!-- number -->
            <div class="form-number-wrp">
                <label>Номер заказа:</label>
                <input type="text" name="number">
            </div>

            <!-- type orders-->
            <div class="form-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_PACKET?>">Пакет</option>
                    <option value="<?=Order::TYPE_GLASS?>">Стекло</option>
                    <option value="<?=Order::TYPE_TERM?>">Закалка</option>
                </select>
            </div>

            <!-- date -->
            <div class="form-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" id="datepicker">
            </div>
        </div>

        <!-- two row-->
        <div id="form-add-two-row">
            <!-- count packets-->
            <div class="form-count-packet-wrp">
                <label>Количество пакетов:</label>
                <input  type="text" name="count_pack">
            </div>

            <!-- type packets-->
            <div class="form-type-packet-wrp">
                <label>Тип пакета:</label>
                <select name="type-packet">
                    <option value="">Без обработки</option>
                    <option value="">С обработкой</option>
                </select>
            </div>
        </div>

        <!-- three row-->
        <div id="form-add-three-row">
            <label>чертеж:</label>
            <input type="checkbox" id="note-dwg">&nbsp;&nbsp;&nbsp;&nbsp;
            <label>ремонт:</label>
            <input type="checkbox" id="note-repair">&nbsp;&nbsp;&nbsp;&nbsp;
            <hr>
            <!-- note -->
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <!-- four row-->
        <div id="form-add-four-row">
            <!-- text of letter -->
            <label>Текст письма:</label>
            <textarea name="letter" id="text-letter"></textarea>
            <a href="#" id="parse-letter">Обработать</a>
        </div>

        <input type="submit" value="Добавить заказ" id="add-order" name="save">
    </form>
</div>