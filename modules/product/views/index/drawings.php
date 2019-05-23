<?
	$number = 1;
?>
<li>
    <input type="radio" name="tabs" id="tab-5" <? if ($this->get->tab == 5 && $product->drawings) echo 'checked'; ?>>
    <label for="tab-5">Чертежи</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
			<tr>
				<th width="40">№</th>
				<th width="200">Файл чертежа</th>
				<th width="150">Добавлен</th>
				<th>Примечание</th>
				<th width="150">Управление</th>
			</tr>
			<? foreach($product->drawings as $dwg): ?>
				<tr>
					<td><?=$number?></td>
					<td>
						<a href="/web/drawings/<?=$dwg->filename?>" target="_blank"><?=$product->symbol?></a>
					</td>
					<td><?=date('d.m.y', $dwg->date_add)?></td>
					<td><?=$dwg->note?></td>
					<td class="action-control-box">
						<a href="/drawing/edit_note?id_dwg=<?=$dwg->id?>&id_prod=<?=$product->id?>">Редактировать</a><br>
						<a href="#" class="delete-dwg" id_dwg="<?=$dwg->id?>" id_prod="<?=$product->id?>">Удалить</a>
					</td>
				</tr>
				<? $number++; ?>
			<? endforeach; ?>
        </table>
    </div>
</li>