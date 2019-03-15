<div id="form-drawing-wrp">
    <h2>Форма для редактирования чертежа</h2>
    <form action="/drawing/add?id_prod=<?=$params['id_prod']?>" method="post" enctype="multipart/form-data">
      
        <!-- note -->
        <div class="form-box">
            <label>Примечание:</label>
            <textarea name="note"><?</textarea>
        </div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>