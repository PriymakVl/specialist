<?
	$number = 1;
?>
<div id="terminal-actions-unplan-wrp">
    <? if ($order_actions): ?>
        <? foreach ($order_actions as $action): ?>
            <div class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>" onclick="to_work(this);"
                 prod_name="<?=$action->prod_name?>"
                 id_worker="<?=$worker->id?>"
                 state="<?=$action->state?>"
				 id_item="<?=$action->id?>"
			>
				 

                <span class="info-order">№<?=$number?> заказ: <?=$action->order->symbol?></span>
                <span class="info-product"><?=$action->prod_symbol?><br>
                    <?=$action->prod_name?> (<?=$action->qty?>шт.)
                </span>
                <span class="info-state"><?=$action->action_name?></span>
            </div>
            <? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <h3>Операций нет</h3>
    <? endif; ?>
</div>
	

