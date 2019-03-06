<?
	$number = 1;
?>
<div id="terminal-actions-unplan-wrp">
    <? if ($actions): ?>
        <? foreach ($actions as $action): ?>
            <div id="test" class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>" onclick="to_work(this);"
                 prod_name="<?=$action->prod_name?>"
                 state="<?=$action->state?>"
                 id_item="<?=$action->id?>"
                 action="unplan">

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
	
