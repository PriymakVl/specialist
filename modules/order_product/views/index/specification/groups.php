<?php
	$tab_2 = false;
	if (!$this->get->tab || $this->get->tab == 2) $tab_2 = true;
?>
<li>
    <input type="radio" name="tabs" id="tab-2" <? if ($tab_2) echo 'checked'; ?>>
    <label for="tab-2">Спецификация</label>
    <div class="tab-content">
		<h2>
			<span>Заказ: </span><a href="/order?id_order=<?=$product->order->id?>" style="margin-right: 20px; color:green;"><?=$product->order->symbol?></a>
			<?=$product->name?>: <span class="green"><?=$product->symbol?></span>
		</h2>
        <table width="900">
			<tr>
				<th width="40">№</th>
				<th width="200">Обозначение</th>
				<th width="340">Наименование</th>
				<th width="100">Колич-во</th>
				<th width="100">Трудоем-ть</th>
				<th>Примечание</th>
			</tr>
			
			<!-- group product -->
			<? if (isset($product->specificationGroup['product'])) include 'group_product.php'; ?>			
			<!-- group unit -->
			<? if (isset($product->specificationGroup['unit'])) include 'group_unit.php'; ?>
			<!-- group detail -->
			<? if (isset($product->specificationGroup['detail'])) include 'group_detail.php'; ?>
			<!-- group standard -->
			<? //if (isset($product->specificationGroup['standard'])) include 'group_standard.php'; ?>
			<!-- group other -->
			<? //if (isset($product->specificationGroup['other'])) include 'group_other.php'; ?>
			
        </table>
    </div>
</li>