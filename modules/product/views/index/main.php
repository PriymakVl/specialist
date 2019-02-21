<?php

require_once ('./modules/product/models/product.php');

?>

<!-- css files -->
<link rel="stylesheet" href="/modules/product/css/index.css">

<div id="content">

    <!-- active box info -->
	<? if ($id_active == $product->id): ?>
		<div class="message success-message">Активный</div>
    <? endif; ?>

    <div id="product-index-wrp">
        <ul class="tabs">

            <!-- order  info -->
            <? include_once('info.php'); ?>

            <!-- content -->
			<? if ($product->typeViewSpecification == 'category'): ?>
				<? include_once('specification_category.php'); ?>
			<? elseif ($product->specification): ?>
				<? include_once('specification_product.php'); ?>
			<? endif; ?>

            <!-- actions -->
            <? if ($product->actions) include_once('actions.php'); ?>

        </ul>
    </div>

    <!-- order menu -->
    <? include_once('menu.php'); ?>

</div><!-- id content -->

<!-- js files -->
<script src="/modules/product/js/specif_activate.js"></script>
<script src="/modules/product/js/add_to_order.js"></script>

