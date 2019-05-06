<!-- css files -->
<link rel="stylesheet" href="/web/css/total/form.css">


<div id="content">
	<? if ($action->id_worker): ?>
		<h2>Операция закреплена за: <span class="green"><?=$action->worker->title?></span></h2>
	<? else: ?>
		<h2>Операция не закреплена за рабочим</h2>
	<? endif; ?>
    <!-- add worker action menu -->
    <? include_once('form.php'); ?>

</div><!-- id content -->



