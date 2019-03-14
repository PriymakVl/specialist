<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Спецификация</label>
    <div class="tab-content">
		<h2><?=$product->name?>: <span class="green"><?=$product->symbol?></span></h2>
        <table width="900">
			<tr>
				<th width="40">№</th>
				<th width="200">Обозначение</th>
				<th width="340">Наименование</th>
				<th width="100">Колич-во</th>
				<th width="100">Трудоем-ть</th>
				<th>Примечание</th>
			</tr>
					
			<!-- group unit -->
			<? if ($product->specificationGroup['unit']) include 'group_unit.php'; ?>
			<!-- group detail -->
			<? if ($product->specificationGroup['detail']) include 'group_detail.php'; ?>
			<!-- group standard -->
			<? if ($product->specificationGroup['standard']) include 'group_standard.php'; ?>
			<!-- group other -->
			<? if ($product->specificationGroup['other']) include 'group_other.php'; ?>
			
        </table>
    </div>
</li>