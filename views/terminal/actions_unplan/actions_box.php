<?
	$number = 1;
?>
<div id="terminal-actions-unplan-wrp">
    <? if ($actions): ?>
        <? foreach ($actions as $action): ?>
            <div id="test" class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>" onclick="show_box_operations(this);"
                 prod_name="<?=$action->prod_name?>"
                 state="<?=$action->state?>"
                 id_action="<?=$action->id?>"
                 type_action="unplan">

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
	

