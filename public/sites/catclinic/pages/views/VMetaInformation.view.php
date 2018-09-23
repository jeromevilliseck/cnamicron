<?php
class VMetaInformation extends VGlobal{

    //Ajout du balisage meta pour l'identification des contenus qui varient selon les pages en cas de partage sur le net (social)
    public function showOgProperties($_image){ //Obligation de passer en paramètre l'argument de la clé $content['vign']

        $dynamicUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //URL de la page en cours affichée de manière dynamique
        $siteTitle = SITETITLE; //Affectation de variable de portée locale avec les constantes car les constantes ne sont pas utilisables en direct avec la syntaxe echo <<<HERE
        $description = DESCRIPTION;
        $favicon = SITEFAVICON;

        echo <<<HERE
        
        <meta property="og:type"          content="website" />
        <meta property="og:url"           content="$dynamicUrl" />

        <meta property="og:title"         content="$siteTitle" />
        <meta property="og:description"   content="$description" />
        <meta property="og:image"         content="$_image" /> <!--L'image doit avoir un chemin absolu et non relatif pour les balises meta-->

        <!--Favicon-->
        <link href="$favicon" rel="icon" type="image/x-icon" />
HERE;
        return;
    }
}