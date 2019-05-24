<?php
	$number = 1;
?>
<li>
    <input type="radio" name="tabs" id="tab-2" checked>
    <label for="tab-2">Спецификация</label>
    <div class="tab-content">
		<h2><?=$product->name?></h2>
        <table width="900" id="product-categories">
            <? if ($product->specification): ?>
                <tr>
                    <th width="40">№</th>
                    <th width="200">Наименование</th>
                    <th>Содержание</th>
                </tr>
                <? foreach ($product->specification as $category): ?>
                    <tr>
                        <td>
							<?=$number?>
                        </td>
                        <td>
							<? if ($category->name): ?>
								<a href="/product?id_prod=<?=$category->id?>"><?=$category->name?></a>
							<? else: ?>
								<a href="/product?id_prod=<?=$category->id?>"><?=$category->symbol?></a>
							<? endif; ?>
						</td>
						<!-- content category -->
                        <td class="content-category">
							<? if (isset($category->specificationGroup['category'])): ?>
								<? foreach ($category->specificationGroup['category'] as $item): ?>
									<a href="/product?id_prod=<?=$item->id?>" class="category-links"><?=$item->name?$item->name:$item->symbol?></a>
								<? endforeach; ?>
							<? elseif (isset($category->specificationGroup['product'])): ?>
								<? foreach ($category->specificationGroup['product'] as $item): ?>
									<a href="/product?id_prod=<?=$item->id?>" class="category-links"><?=$item->name?$item->name:$item->symbol?></a>
								<? endforeach; ?>
							<? elseif (isset($category->specificationGroup['unit'])): ?>
								<? foreach ($category->specificationGroup['unit'] as $item): ?>
									<a href="/product?id_prod=<?=$item->id?>" class="category-links"><?=$item->name?$item->name:$item->symbol?></a>
								<? endforeach; ?>
							<? elseif (isset($category->specificationGroup['detail'])): ?>
								<? foreach ($category->specificationGroup['detail'] as $item): ?>
									<a href="/product?id_prod=<?=$item->id?>" class="category-links"><?=$item->symbol?></a>
								<? endforeach; ?>
							<? endif; ?>
						</td>
                    </tr>
					<? $number++; ?>
                <? endforeach; ?>
            <? else: ?>
                <tr>
                    <td>Нет содержимого</td>
                </tr>
            <? endif; ?>
        </table>
    </div>
</li>