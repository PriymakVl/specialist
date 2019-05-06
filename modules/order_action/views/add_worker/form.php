<div id="form-add-worker-wrp">
    <form action="/order_action/add_worker?id_action=<?=$action->id?>&type_order=<?=$this->get->type_order?>" method="post">
		
		<!-- workers -->
		<div class="form-box">
			<label>Рабочие:</label>
			<select name="id_worker">
				<option value="">Не выбран</option>
				<? if ($workers): ?>
					<? foreach ($workers as $worker): ?>
						<option value="<?=$worker->id?>" <?if($worker->id == $action->id_worker) echo 'selected';?>><?=$worker->title?></option>
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