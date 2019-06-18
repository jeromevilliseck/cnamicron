<?php
global $content; 										/*Tableau multidimentionnel du controleur*/
$vmenu = new VMenu(); 									/*Instanciation d'un Objet VMenu -> pour l'appel de la méthode showMenu*/
$vcontent = new $content['class'](); 					/*Instanciation d'une classe variable qui est la valeur de la clé class du tableau $content*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr"> 	<!--Syntaxe XHTML moins permissive que HTML5-->
<head>
    <meta http-equiv="Content-Type" 		content="text/html; charset=utf-8" />
    <meta name="viewport" 					content="width=device-width, initial-scale=1.0" />
    <meta name="description" 				content="Cnamicron : Langages de programmation" />
    <meta name="author" 					content="Jerome Villiseck" />

    <meta property="fb:app_id"             	content="571276129900940" /> 									<!--Propriétés pour partager sur facebook les pages dynamiquement-->
    <meta property="og:url"                	content=<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?> />
    <meta property="og:type"               	content="article" />
    <meta property="og:title"              	content="Cnamicron - <?=$content['title']?>" />
    <meta property="og:description"        	content="<?=$content['description']?>" />
    <meta property="og:image"              	content="<?=$content['thumbnail']?>" />
    <meta property="og:image:width" 		content="1200">
    <meta property="og:image:height" 		content="628">

    <!--Favicon-->
    <link href="../../public/favicon/favicon.ico" rel="icon" type="image/x-icon" />
	
	<link rel="stylesheet" href="../../public/css/css_api_others/prism/prism.css">									<!-- Style CSS permettant l'adaptabilité des tableaux au redimensionnement -->
	<link rel="stylesheet" href="../../public/css/css_api_others/wrapper_youtube/wrapper-youtube.css">				<!-- Style CSS permettant d'avoir des videos youtube responsive sur les pages -->
	<link rel="stylesheet" href="../../public/css/css_framework/pure-min.css"> 										<!-- Framework CSS Pure CSS by Yahoo https://purecss.io/ avec encodage pour protection-->
	<link rel="stylesheet" href="../../public/css/css_user/tables-responsive.css">									<!-- Style CSS permettant la coloration syntaxique de code source dans les pages web -->
	<link rel="stylesheet" href="../../public/css/css_user/buttonbacktotop.css">									<!-- Style CSS du button back to top en bas à gauche de la page -->
    <link rel="stylesheet" href="../../public/css/css_user/images.css">                                             <!-- Style CSS des images du site-->

   <!-- Hack internet explorer permettant de résoudre les problème d'affichage de ce navigateur-->
   <!--[if lte IE 8]>
   <link rel="stylesheet" href="css/css_framework/side-menu-old-ie.css">
   <![endif]-->
   <!--[if gt IE 8]><!-->
   <link rel="stylesheet" href="../../public/css/css_framework/side-menu.css">
   <!--<![endif]-->
   <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <![endif]-->

    <title><?=$content['title']?></title>
</head>

<body>																									<!--BLOCK_LEVEL_0-->

<button onclick="topFunction()" id="myBtn" title="Go to top"">&#8593;</button>											<!--button back to top-->
<script src="../../public/js/framework/purecss/root.js"></script>										<!--Script js central du framework-->																			<!--fichier js racine du framework css-->

  <div id="layout">																							<!--BLOCK_LEVEL_1-->
      <a href="#menu" id="menuLink" class="menu-link">																	<!--Menu de navigation avec évenement javascript qui déclenche l'affichage du conteneur nav-->
          <span></span>																									<!-- Hamburger icon : ne pas supprimer la balise span vide-->
      </a>

      <nav id="menu">																							<!--BLOCK_LEVEL_2-->
          <div class="pure-menu">																					<!--BLOCK_LEVEL_3-->
              <a class="pure-menu-heading" href="main.php?EX=home"><?=$content['logo']?></a>

              <ul class="pure-menu-list">																				<!--BLOCK_LEVEL_4-->														
                  <?php $vmenu->showMenu(16) ?>
              </ul>
          </div>
      </nav>

     <div id="main">																							<!--BLOCK_LEVEL_2-->

       <div class="header">																							<!--BLOCK_LEVEL_3-->
           <?php
           //TODO Factoriser le CSS
           if(isset($_SESSION['ID_USER'])){
               echo "<aside style='position: absolute; top: -1em;'>Connecté sous : ".$_SESSION['NOM'] . ' ' . $_SESSION['PRENOM']. ' | ' ."<a href='../../public/controllers/main.php?EX=deconnect'>Deconnexion</a></aside>";
           }
           ?>
           <h1><?=$content['title']?></h1>
           <h2><?=$content['description']?></h2>
       </div>

       <div class="content">																						<!--BLOCK_LEVEL_3-->
       <?php
       isset($content['text']) ? include($content['text']) : '';
       $vcontent->{$content['method']}($content['arg']);
       ?>
       </div>
     </div>

 </div>

<script src="../../public/js/api/malt.fr/hopwork.js"></script>                                  <!--Script js pour l'affichage de la vignette du profil malt-->
<script src="../../public/js/api/prism/prism.js"></script>										<!--Script js permettant la coloration syntaxique des exemples de code source-->
<script src="../../public/js/api/youtubedynamic/youtubedynamicloading.js"></script>				<!--Script js permettant d'éviter le préchargement des videos youtube au lancement d'une page youtubedynamic -->
<script src="../../public/js/api/latex/latexit.js"></script>
<script src="../../public/js/framework/purecss/ui.js"></script>									<!--Script js faisant fonctionner le menu hamburger (framework css fichier natif)-->
<script src="../../public/js/js_standard/buttonbacktotop.js"></script>							<!--Script js faisant fonctionner le button back to top-->
<script src="../../public/js/js_standard/collapsecontent.js"></script>							<!--Script js permettant l'affichage des contenus masqués-->

</body>
</html>
