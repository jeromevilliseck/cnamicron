<?php

class VMenu extends VGlobal
{
  public $algo, $html, $php, $java, $cpp, $js, $sql, $console, $fmk, $dos, $git, $hammer, $phone, $sourcecode, $ruby, $python, $csharp, $clangage, $objectivec, $godot, $unity, $management, $graphic, $shell, $architecture, $maths, $swift, $ide, $project, $vim, $sass, $docker, $english;

  public function showMenu($_iconsSized)
  {

      $this->algo = ConfigVectors::showAlgorithmLogo($_iconsSized, $_iconsSized);
      $this->html = ConfigVectors::showHtmlLogo($_iconsSized, $_iconsSized);
      $this->php = ConfigVectors::showPhpLogo($_iconsSized, $_iconsSized);
      $this->java = ConfigVectors::showJavaLogo($_iconsSized, $_iconsSized);
      $this->cpp =  ConfigVectors::showCppLogo($_iconsSized, $_iconsSized);
      $this->js =  ConfigVectors::showJsLogo($_iconsSized, $_iconsSized);
      $this->sql =  ConfigVectors::showSqlLogo($_iconsSized, $_iconsSized);
      $this->console =  ConfigVectors::showConsoleLogo($_iconsSized, $_iconsSized);
      $this->dos =  ConfigVectors::showDosLogo($_iconsSized, $_iconsSized);
      $this->fmk =  ConfigVectors::showFmkLogo($_iconsSized, $_iconsSized);
      $this->git =  ConfigVectors::showGitLogo($_iconsSized, $_iconsSized);
      $this->hammer =  ConfigVectors::showHammerLogo($_iconsSized, $_iconsSized);
      $this->phone =  ConfigVectors::showPhoneLogo($_iconsSized, $_iconsSized);
      $this->sourcecode =  ConfigVectors::showSourcecodeLogo($_iconsSized, $_iconsSized);

      $this->vim = ConfigVectors::showVimLogo($_iconsSized, $_iconsSized);
      $this->sass = ConfigVectors::showSassLogo($_iconsSized, $_iconsSized);
      $this->docker = ConfigVectors::showDockerLogo($_iconsSized, $_iconsSized);

      $this->swift = ConfigVectors::showSwiftLogo($_iconsSized, $_iconsSized);
      $this->ruby = ConfigVectors::showRubyLogo($_iconsSized, $_iconsSized);
      $this->python = ConfigVectors::showPythonLogo($_iconsSized, $_iconsSized);
      $this->csharp = ConfigVectors::showCsharpLogo($_iconsSized, $_iconsSized);
      $this->clangage = ConfigVectors::showCLogo($_iconsSized, $_iconsSized);
      $this->objectivec = ConfigVectors::showObjectivecLogo($_iconsSized, $_iconsSized);
      $this->godot = ConfigVectors::showGodotLogo($_iconsSized, $_iconsSized);
      $this->unity = ConfigVectors::showUnityLogo($_iconsSized, $_iconsSized);
      $this->management = ConfigVectors::showManagementLogo($_iconsSized, $_iconsSized);
      $this->graphic = ConfigVectors::showGraphicLogo($_iconsSized, $_iconsSized);
      $this->shell = ConfigVectors::showShellLogo($_iconsSized, $_iconsSized);
      $this->architecture = ConfigVectors::showArchitectureLogo($_iconsSized, $_iconsSized);
      $this->maths = ConfigVectors::showMathsLogo($_iconsSized, $_iconsSized);
      $this->ide = ConfigVectors::showIdeLogo($_iconsSized, $_iconsSized);
      $this->project = ConfigVectors::showProjectLogo($_iconsSized, $_iconsSized);
      $this->english = ConfigVectors::showEnglishLogo($_iconsSized, $_iconsSized);

    echo <<<HERE
    <li class="pure-menu-item"><a href="main.php?EX=algo" class="pure-menu-link">$this->algo Algorithmique</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=htmlcss" class="pure-menu-link">$this->html HTML et CSS</a></li>

    <li class="pure-menu-item"><a id="displayPhpMenu" href="javascript:togglephpmenu();" style="display:block;">$this->php PHP</a></li>
    <ol id="togglePhpMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=php" class="pure-menu-link"> Procédural</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpmvc" class="pure-menu-link"> MVC</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpbdd" class="pure-menu-link"> BDD</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpss" class="pure-menu-link"> Sécurité</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpint" class="pure-menu-link"> Intég. continue</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpoo" class="pure-menu-link"> OO Avancé</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=phpdeb" class="pure-menu-link"> Debogage</a></li>
    </ol>

    <li class="pure-menu-item"><a id="displayJavaMenu" href="javascript:togglejavamenu();" style="display:block;">$this->java JAVA</a></li>
    <ol id="toggleJavaMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=java" class="pure-menu-link"> Procédural</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javaoo" class="pure-menu-link"> Orienté Objet</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javadesign" class="pure-menu-link"> Design Patterns</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javafx" class="pure-menu-link"> FX (Swing)</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javaspring" class="pure-menu-link"> Spring Boot</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javajsp" class="pure-menu-link"> JSP & Servlets</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javajsf" class="pure-menu-link"> JSF</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javahiborm" class="pure-menu-link"> Hibernate, ORM</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javajdbc" class="pure-menu-link"> JDBC & Tomcat</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javaejb" class="pure-menu-link"> EJB</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=javajboss" class="pure-menu-link"> JBOSS & Wildfly</a></li>
    </ol>

    <li class="pure-menu-item"><a id="displayCppMenu" href="javascript:togglecppmenu();" style="display:block;">$this->cpp C++</a></li>
    <ol id="toggleCppMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=cpp" class="pure-menu-link"> Procédural</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cppoo" class="pure-menu-link"> Orienté Objet</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cppqt" class="pure-menu-link"> Qt</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cppstl" class="pure-menu-link"> STL, Boost</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cpptf" class="pure-menu-link"> TreeFrog</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cppts" class="pure-menu-link"> Tesseract</a></li>
    </ol>

    <li class="pure-menu-item"><a id="displayJsMenu" href="javascript:togglejsmenu();" style="display:block;">$this->js Javascript</a></li>
    <ol id="toggleJsMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=jsc" class="pure-menu-link"> Standard</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=jslst" class="pure-menu-link"> Listeners</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=jsajx" class="pure-menu-link"> AJAX</a></li>
    </ol>


    <li class="pure-menu-item"><a href="main.php?EX=sql" class="pure-menu-link">$this->sql SQL Avancé</a></li>

    <li class="pure-menu-item"><a id="displayOtherMenu" href="javascript:toggleothermenu();" style="display:block;">$this->sourcecode Autres langages</a></li>
    <ol id="toggleOtherMenu" style="display: none;"> <!--POSSIBILITE DE METTRE SPAN plutot que ul ou ol pour eviter de la marge-->
    <li class="pure-menu-item"><a href="main.php?EX=ruby" class="pure-menu-link">$this->ruby Ruby</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=python" class="pure-menu-link">$this->python Python</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=csharp" class="pure-menu-link">$this->csharp C#</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=swift" class="pure-menu-link">$this->swift Swift</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=clangage" class="pure-menu-link">$this->clangage C</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=objc" class="pure-menu-link">$this->objectivec Objective-C</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=godot" class="pure-menu-link">$this->godot Godot</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=unity" class="pure-menu-link">$this->unity Unity</a></li>
    </ol>


    <li class="pure-menu-item"><a href="main.php?EX=network" class="pure-menu-link">$this->console Réseau</a></li>
    <li class="pure-menu-item"><a id="displayGitMenu" href="javascript:togglegitmenu();" style="display:block;">$this->git Versionning</a></li>
    <ol id="toggleGitMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=gitfast" class="pure-menu-link"> Guide rapide</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=versioncontrol" class="pure-menu-link"> Avancé</a></li>
    </ol>

    <li class="pure-menu-item"><a id="displaySystemMenu" href="javascript:togglesystemmenu();" style="display:block;">$this->dos System</a></li>
    <ol id="toggleSystemMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=archi" class="pure-menu-link"> Architecture</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=climo" class="pure-menu-link"> CLI Multi-OS</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=micro" class="pure-menu-link"> Microcontroleurs</a></li>
    </ol>

    <li class="pure-menu-item"><a href="main.php?EX=frameworks" class="pure-menu-link">$this->fmk Frameworks</a></li>
    
    <li class="pure-menu-item"><a id="displayToolsMenu" href="javascript:toggletoolsmenu();" style="display:block;">$this->hammer Boite à outils</a></li>
    <ol id="toggleToolsMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=ide" class="pure-menu-link">$this->ide IDE</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=maths" class="pure-menu-link">$this->maths Maths</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=gp" class="pure-menu-link">$this->management Management</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=project" class="pure-menu-link">$this->project Gest. Projet</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=grafic" class="pure-menu-link">$this->graphic Graphisme</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=vim" class="pure-menu-link">$this->vim VIM</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=sass" class="pure-menu-link">$this->sass SASS / LESS</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=docker" class="pure-menu-link">$this->docker Docker</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=shell" class="pure-menu-link">$this->shell Scripts Shell</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=english" class="pure-menu-link">$this->english Anglais</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=admin" class="pure-menu-link">Connection</a></li>
    </ol>
    
    <li class="pure-menu-item"><a href="tel:+(33)6.79.86.48.04" class="pure-menu-link">$this->phone Contact</a></li>




    <!-- <li class="pure-menu-item"><a href="main.php?EX=tests" class="pure-menu-link"><span style="color:white;">&#9679;</span> Tests</a></li>

    <li class="pure-menu-item" class="menu-item-divided pure-menu-selected" style="padding-bottom:1em;"></li>

    <li class="pure-menu-item" style="text-align:center;"><img src="../img/icons/cnammini.png" /></li>
    <li class="pure-menu-item" style="text-align:center;"><img src="../img/icons/epflmini.png" /></li>

    <li class="pure-menu-item" class="menu-item-divided pure-menu-selected" style="padding-bottom:1em;"></li> -->

    <!-- Script de traduction google
    <div id="google_translate_element" style="padding-left:1em;padding-top:2em;"></div><script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'fr', includedLanguages: 'en,es,fr', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT}, 'google_translate_element');
    }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    -->
HERE;
    return;

  }

}
