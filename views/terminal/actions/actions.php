<?
	$number = 1;
?>
<div id="terminal-actions-wrp">
    <? if ($actions): ?>
        <? foreach ($actions as $action): ?>
            <div class="terminal-action-box" style="background:<?=$action->bgTerminalBox?>" onclick="show_box_operations(this);"
                 prod_name="<?=$action->product ? $action->product->name : ''?>"
                 state="<?=$action->state?>"
				 id_action="<?=$action->id?>"
				 action_name="<?=$action->name?>"
				 note="<?=$action->note?>"
			>
				<!-- order symbol --> 
                <span class="info-order">№<?=$number?> заказ: <?=$action->order ? $action->order->symbol : ''?></span>
                <!-- product name and symbol -->
                <span class="info-product">
                    <?=$action->product ? $action->product->symbol : ''?>
                    <br>
                    <?=$action->product ? $action->product->name : ''?> (<?=$action->qty?>шт.)
                </span>
                <!-- note -->
                <span class="action-note"><?=$action->note?></span>
                <!-- action name -->
                <span class="info-state"><?=$action->name?></span>
            </div>
            <? $number++; ?>
        <? endforeach; ?>
    <? else: ?>
        <h3>Операций нет</h3>
    <? endif; ?>
</div>
	

