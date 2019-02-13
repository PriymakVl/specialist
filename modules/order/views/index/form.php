<div id="form-order-wrp" style="display: none;">
    <h2>Форма для редактирования заказа</h2>
    <form action="/order/edit?id_order=<?=$order->id?>" method="post">
        <!-- first box -->
        <div class="form-box">
            <!-- order symbol-->
            <div id="form-order-symbol-wrp">
                <label>Обозначение заказа:</label>
                <input type="text" name="symbol" value="<?=$order->symbol?>">
            </div>

            <!-- type orders-->
            <div id="form-order-type-wrp">
                <label>Тип заказа:</label>
                <select name="type">
                    <option value="<?=Order::TYPE_CYLINDER?>" <? if ($order->symbol == Order::TYPE_CYLINDER) echo 'selected';?>>Пневмоцилиндры</option>
                    <option value="<?=Order::TYPE_CAR_NUMBER?>" <? if ($order->symbol == Order::TYPE_CAR_NUMBER) echo 'selected';?>>>Автономера</option>
                </select>
            </div>

            <!-- date execution-->
            <div id="form-order-date-wrp">
                <label>Срок выполнения:</label>
                <input type="text" name="date_exec" id="datepicker" value="<?if ($order->date_exec) echo date('d.m.y', $order->date_exec);?>">
            </div>
        </div>

        <!-- order description -->
        <div id="form-order-description-wrp">
            <label>Описание заказа:</label>
            <input type="text" name="description" value="<?=$order->description?>">
        </div>

        <!-- note -->
        <div id="form-note-wrp">
            <label>Примечание:</label>
            <textarea name="note"><?=$order->note?></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" id="form-order" name="save">
            <input type="button" id="hide-form-order" value="Отменить">
        </div>
    </form>
</div>