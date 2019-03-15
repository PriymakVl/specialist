<?php
	$number = 1;
?>
<li>
    <input type="radio" name="tabs" id="tab-2">
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
                        <td class="content-category">
							<? foreach ($category->specification as $item): ?>
								<a href="/product?id_prod=<?=$item->id?>" class="category-links"><?=$item->name?$item->name:$item->symbol?></a>
							<? endforeach; ?>
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