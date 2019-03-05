<?
	$number = 1;
?>
<div id="terminal-actions-wrp">
    <? if ($order_actions): ?>
        <? foreach ($order_actions as $action): ?>
            <div class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>" onclick="to_work(this);"
                 prod_name="<?=$action->product->name?>"
                 id_worker="<?=$worker->id?>"
                 state="<?=$action->state?>"
				 id_item="<?=$action->id?>"
				 id_action="<?=$action->id_action?>"
			>
				 

                <span class="info-order">№<?=$number?> заказ: <?=$action->order->symbol?></span>
                <span class="info-product"><?=$action->product->symbol?><br>
                    <?=$action->product->name?> (<?=$action->qty?>шт.)
                </span>
                <span class="info-state"><?=$action->action->name?></span>
            </div>
            <? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <h3>Операций нет</h3>
    <? endif; ?>
</div>
	

