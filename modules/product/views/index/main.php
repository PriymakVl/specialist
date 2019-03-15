<?php

require_once ('./modules/product/models/product.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/product/css/index.css">

<div id="content">

    <!-- active box info -->
	<? if ($id_active == $product->id): ?>
		<div class="message message-success">Активный</div>
    <? endif; ?>

    <div id="product-index-wrp">
        <ul class="tabs">
		
			<!-- message -->
			<? include './views/total/message.php'; ?>

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- content -->
			<? if ($product->typeViewSpecification == 'category'): ?>
				<? include_once('specification/category.php'); ?>
			<? elseif ($product->specificationGroup): ?>
				<? include_once('specification/groups.php'); ?>
			<? //elseif ($product->specification): ?>
				<? //include_once('specification/product.php'); ?>
			<? endif; ?>

            <!-- actions -->
            <? if ($product->actions) include_once('actions.php'); ?>
			
			<!-- statistics -->
			<? if ($product->statistics) include_once('statistics.php'); ?>
			
			<!-- drawings -->
			<? if ($product->drawings) include_once('drawings.php'); ?>
        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/product/js/add_to_order.js"></script>
<script src="/modules/product/js/delete_action.js"></script>

