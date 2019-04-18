<!-- css files -->
<link rel="stylesheet" href="/web/css/terminal/style.css">
<link rel="stylesheet" href="/web/css/terminal/operations_box.css">
<link rel="stylesheet" href="/web/css/terminal/filters_box.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div id="content">

	
	<div id="terminal-wrp">
		<!-- terminal info -->
		<div class="terminal-info">
            <?=$worker->title?>
            <a href="/main/logout" class="exit-link">Выход</a>
        </div>
		
		<!-- filters action -->
		<? include_once('filters.php'); ?>
		
		<!-- actions box -->
			<? include_once('actions.php'); ?>

		<!-- operations box -->
		<? include_once('operations.php'); ?>
	</div>
</div><!-- id content -->

<!-- js files -->
<script src="/web/js/terminal/function_operations.js"></script>
<script src="/web/js/terminal/filters.js"></script>
<script src="/web/js/get_value_from_request.js"></script>

