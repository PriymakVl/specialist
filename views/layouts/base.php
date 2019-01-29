<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <link rel="stylesheet" href="/web/css/total/reset.css">
    <link rel="stylesheet" href="/web/css/total/sidebar.css">
    <link rel="stylesheet" href="/web/css/total/table.css">
    <link rel="stylesheet" href="/web/css/total/tabs.css">
    <link rel="stylesheet" href="/web/css/total/template.css">
    <link rel="stylesheet" href="/web/css/total/main_menu.css">
    <link rel="stylesheet" href="/web/css/total/menu_sidebar.css">
    <link rel="stylesheet" href="/web/css/total/jquery-ui.css">
    <script src="/web/js/jquery-3.3.1.min.js"></script>
    <script src="/web/js/jquery-ui.js"></script>
</head>
<body>
    <div id="container">
        <!-- main menu -->
        <? include_once('./views/total/main_menu.php'); ?>

        <!-- content -->
        <div id="content-wrp">
            <? include_once($content) ;?>
        </div>

        <!-- footer -->
        <? include_once('./views/total/footer.php'); ?>
    </div>
    <div id="fade" style="display: none;" class="black-overlay"></div>
</body>
</html>