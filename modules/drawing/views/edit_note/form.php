<div id="form-drawing-wrp">
    <h2>Форма для редактирования примечания чертежа</h2>
    <form action="/drawing/edit_note?id_dwg=<?=$dwg->id?>&id_prod=<?=$this->get->id_prod?>" method="post">
      
        <!-- note -->
        <div class="form-box">
            <label>Примечание:</label>
            <textarea name="note"><?=$dwg->note?></textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>