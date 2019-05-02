<div id="form-add-worker-wrp">
    <h2>Форма для закрепления операции за рабочим</h2>
    <form action="/order_action/add_worker?id_action=<?=$action->id?>" method="post">
		
		<!-- workers -->
		<div class="form-box">
			<label>Рабочие:</label>
			<select name="state">
				<option value="">Не выбран</option>
				<? if ($workers): ?>
					<? foreach ($workers as $worker): ?>
						<option value="<?=$worker->id?>"><?=$worker->title?></option>
					<? endforeach; ?>
				<? endif; ?>
			</select>
		</div>

        <!-- buttons -->
        <div class="button-box">
            <input type="submit" value="Сохранить" name="save">
            <input type="button" onclick="history.back();" value="Отменить">
        </div>
    </form>
</div>