<?
	$number = 1;
?>
<div id="terminal-actions-wrp">
    <? if ($prod_actions): ?>
        <? foreach ($prod_actions as $action): ?>
            <div class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>"
                 prod_name="<?=$action->product->name?>"
                 id_order="<?=$action->id_order?>"
                 id_prod="<?=$action->id_prod?>"
                 id_worker="<?=$worker->id?>"
                 state="<?=$action->state?>"
				 id_action="<?=$action->id_action?>">
				 

                <div class="info-order">№<?=$number?> заказ: <?=$action->order->symbol?></div>
                <div class="info-product"><?=$action->product->symbol?><br>
                    <?=$action->product->name?> (<?=$action->qty?>шт.)
                </div>
                <div class="info-state"><?=$action->action->name?></div>
            </div>
            <? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <h3>Операций нет</h3>
    <? endif; ?>
</div>
	

