<?
	$number = 1;
?>
<div id="terminal-products-wrp">
	<? foreach ($products as $product): ?>
		<div class="terminal-product-box" style="background:<?=$product->bgTerminalProductBox?>" prod_name="<?=$product->name?>" id_order="<?=$order->id?>" id_prod="<?=$product->id?>" id_worker="<?=$worker->id?>" prod_state="<?=$product->stateWork?>">
			<div class="info-order">№<?=$number?> заказ: <?=$order->symbol?></div>
			<div class="info-product"><?=$product->symbol?> <?=$product->name?> (<?=$product->orderQtyAll?>шт.)</div>
			<div class="info-state"><?=$product->stateWorkConvert?></div>
		</div>
		<? $number++; ?>
	<? endforeach; ?>
</div>
	

