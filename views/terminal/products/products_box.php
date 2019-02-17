<?
	$number = 1;
?>
<div id="terminal-products-wrp">
    <? if ($products): ?>
        <? foreach ($products as $product): ?>
            <div class="terminal-product-box" style="background:<?=$product->bgTerminalProductBox?>"
                 prod_name="<?=$product->name?>"
                 id_order="<?=$product->order->id?>"
                 id_prod="<?=$product->id?>"
                 id_worker="<?=$worker->id?>"
                 state_work="<?=$product->stateWork?>">

                <div class="info-order">№<?=$number?> заказ: <?=$product->order->symbol?></div>
                <div class="info-product"><?=$product->symbol?><br>
                    <?=$product->name?> (<?=$product->orderQtyAll?>шт.)
                </div>
                <div class="info-state"><?=$product->stateWorkConvert?></div>
            </div>
            <? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <h3>Деталей нет</h3>
    <? endif; ?>
</div>
	

