<div id="form-drawing-wrp">
    <h2>Форма для добавления чертежа</h2>
    <form action="/drawing/add?symbol=<?=$this->get->symbol?>&id_prod=<?=$this->get->id_prod?>" method="post" enctype="multipart/form-data">
        <!-- file drawing -->
        <div class="form-box">
            <label>Файл чертежа:</label>
                <input type="file" name="file" required>
		</div>
      
        <!-- note -->
        <div class="form-box">
            <label>Примечание:</label>
            <textarea name="note"></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Добавить чертеж" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>