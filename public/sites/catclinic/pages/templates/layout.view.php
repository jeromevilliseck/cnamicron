<?php
global $content; //Variables globales contenant le contenu et les données meta

$vmenu_footer = new VMenuFooter(); //Instanciation de la classe contenant le menu

$vmeta_information = new VMetaInformation(); //Instanciation de la classe contenant les informations meta supplementaires
$vcontent = new $content['class'](); //Instanciation d'une classe variable selon la valeur de la clé du tableau associatif $content du controleur
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php $vmeta_information->showOgProperties($content['vign']); ?>
  <title><?=$content['title']?></title>
<link rel="stylesheet" href="../../public/css/app.css">
<link rel="stylesheet" type="text/css" href="../../public/api/dataTables/datatables.min.css"/>
</head>

<body class="flex-container flex-dir-column">                                           <!--BLOCK LEVEL 0 START-->
    <div class="content">                                                               <!--BLOCK LEVEL 1 START-->

        <?php $vmenu_footer->showMenu(); ?>

        <aside class="padding-aside sticky-card">                                       <!--BLOCK LEVEL 2 START-->
            <?=$content['aside']?>
        </aside>

        <main class="padding-main" id="content">                                                     <!-- BLOCK LEVEL 2 START-->
            <?php $vcontent->{$content['method']}($content['arg']); ?>
        </main>                                                                         <!-- BLOCK LEVEL 2 END-->

    </div>                                                                              <!-- BLOCK LEVEL 1 END-->

    <footer class="body-footer">                                                        <!-- BLOCK LEVEL 1 START-->
        <?php $vmenu_footer->showFooter(); ?>
    </footer>                                                                           <!-- BLOCK LEVEL 1 END-->

    <!--Framework Javascript Scripts-->
    <script src="../../public/js/framework/jquery.js"></script>
    <script src="../../public/js/framework/what-input.js"></script>
    <script src="../../public/js/framework/foundation.js"></script>
    <script src="../../public/js/framework/app.js"></script>

    <!--User Javascript Scripts-->
    <script src="../../public/js/user_js_standard/caroussel.js"></script>
    <!--User Listeners Script-->
    <script src="../../public/js/user_js_listeners/init.js"></script>
    <!--User Ajax Script-->
    <script src="../../public/js/user_ajax/ajax.js"></script>

    <!--External API Scripts-->
    <script type="text/javascript" src="../../public/api/dataTables/datatables.min.js"></script>
    <script src="../../public/js/api/dataTables/dataTables.js"></script>
</body><!-- BLOCK LEVEL 0 END-->
</html>






