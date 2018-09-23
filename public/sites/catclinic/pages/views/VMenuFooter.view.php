<?php
class VMenuFooter extends VGlobal{

    private $siteTitle; //Nom du site
    private $siteIcon; //Icone de la barre de navigation
    private $siteDescription; //Description du site
    private $yearActive; //Année en cours

    public function showMenu() {
        $this->siteTitle = SITETITLE;
        $this->siteIcon = SITELOGO;
        $this->siteDescription = SITEDESCRIPTION;
        $this->yearActive = date('Y');

        $class0 = isset($_SESSION['ADMIN_SITE']) ? 'style="color: red;"' : ''; //variable contenant des propriétés css s'intégrant dans la balise pour colorer les liens en rouge quand le mode admin est activé
        $class1 = 'style="color: purple;"';

        $deconnectLink = '';
        $usersManagement = '';

        if (isset($_SESSION['ADMIN_SITE']))
        {
            $usersManagement = '<li><a '.$class1.' href="../controllers/index.php?EX=usem">Gestion Utilisateurs</a></li>';
            $deconnectLink = '<li><a '.$class0.' href="../controllers/index.php?EX=deco">Deconnexion</a></li>';
        }

        echo <<<HERE
        <header class="title-bar" data-responsive-toggle="monmenu"><!--BLOCK LEVEL 2 START-->
            <button class="menu-icon" type="button" data-toggle></button><!--INLINE BLOCK LEVEL 3 START/END-->
            <div class="title-bar-title"><a href="../../public/controllers/index.php?EX=home"> $this->siteTitle </a></div><!--BLOCK LEVEL 3 START/END-->
        </header><!--BLOCK LEVEL 2 END-->
        <nav class="top-bar" id="monmenu"><!--BLOCK LEVEL 2 START-->
            <div class="top-bar-left"><!--BLOCK LEVEL 3 START-->
                <ul class="dropdown menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown"><!--BLOCK LEVEL 4 START-->
                    <div class="menu-logo padding-left-logo">$this->siteIcon</div><!--BLOCK LEVEL 5 START/END-->
                    <li class="menu-text show-for-medium"> $this->siteTitle </li><!--CHILD BLOCK LEVEL 5 START/END-->
                    <li><!--CHILD BLOCK LEVEL 5 START-->
                        <a href="#">Clinique</a><!--INLINE-->
                        <ul class="menu vertical"><!--BLOCK LEVEL 6 START-->
                            <li><button id="button_homeReturn" class="menu-text">Accueil</button></li>
                            <li><a href="../../public/controllers/index.php?EX=team">Equipe</a></li>
                            <li><a href="../../public/controllers/index.php?EX=spec" $class0>Spécialités</a></li>
                        </ul><!--BLOCK LEVEL 6 END-->
                    </li><!--CHILD BLOCK LEVEL 5 END-->
                    <li>
                        <a href="#">Conseils</a>
                        <ul class="menu vertical">
                            <li><a href="../../public/controllers/index.php?EX=advi#1">Vaccination</a></li>
                            <li><a href="../../public/controllers/index.php?EX=advi#2">A la maison</a></li>
                            <li><a href="../../public/controllers/index.php?EX=advi#3">Médicaments</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Accès</a>
                        <ul class="menu vertical">
                            <li><button id="button_adress" class="menu-text">Adresse</button></li>
                            <li><a href="../../public/controllers/index.php?EX=hour">Horaires</a></li>
                            <li><button id="button_contact" class="menu-text">Contact</a></li>
                            <li><button id="button_appo" class="menu-text" $class1>Prise de rdv</button></li>
                        </ul>
                    </li>
                    $usersManagement
                    $deconnectLink
                </ul><!--BLOCK LEVEL 4 END-->
            </div><!--BLOCK LEVEL 3 END-->
        </nav><!--BLOCK LEVEL 2 END-->
HERE;
        return;
    } //showHeader()


    public function showFooter(){
        $class1 = 'style="color: purple;"';
        echo <<<HERE
        <h4>$this->siteTitle - $this->siteDescription</h4>
        <p>Téléphone : <a href="tel:(+33)421230660">04421230660</a> - Mail : <a href="mailto:catclinic@gmail.com">catclinic@gmail.com</a> - <a href="../controllers/index.php?EX=foco" $class1>Administration</a> - $this->yearActive</p>
HERE;
        return;
    } //showFooter()
} // Vheader