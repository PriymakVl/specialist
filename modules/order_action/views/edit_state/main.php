<?php

?>

<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">
<link rel="stylesheet" href="/modules/product/css/form_action.css">

<div id="content">

	<!-- message -->
    <? include_once('./views/total/message.php'); ?>

	<!-- form state -->
    <? if ($this->get->ids) include_once('form_group.php'); ?>
    <? if ($this->get->id_action) include_once('form.php'); ?>

</div><!-- id content -->

<!-- js files -->


