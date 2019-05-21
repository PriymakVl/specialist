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
							<? if ($category->specification): ?>
								<? foreach ($category->specification as $item): ?>
										<a href="/product?id_prod=<?=$item->id?>" class="category-links">
											<? if ($this->get->id_prod == ID_CATEGORY_CYLINDER): ?>
												<?=$item->name?$item->name:$item->symbol?>
											<? else: ?>
												<?=$item->name.': '.$item->symbol?><!-- for press category -->
											<? endif; ?>
										</a>
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