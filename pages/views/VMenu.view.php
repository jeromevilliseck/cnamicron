<?php

class VMenu extends VGlobal
{
    public $algo, $html, $java, $cpp, $sql, $console, $git, $sourcecode, $vim;

    public function showMenu($_iconsSized)
    {

        $this->algo = ConfigVectors::showAlgorithmLogo($_iconsSized, $_iconsSized);
        $this->html = ConfigVectors::showHtmlLogo($_iconsSized, $_iconsSized);
        $this->java = ConfigVectors::showJavaLogo($_iconsSized, $_iconsSized);
        $this->cpp = ConfigVectors::showCppLogo($_iconsSized, $_iconsSized);
        $this->sql = ConfigVectors::showSqlLogo($_iconsSized, $_iconsSized);
        $this->console = ConfigVectors::showConsoleLogo($_iconsSized, $_iconsSized);
        $this->git = ConfigVectors::showGitLogo($_iconsSized, $_iconsSized);
        $this->sourcecode = ConfigVectors::showSourcecodeLogo($_iconsSized, $_iconsSized);
        $this->vim = ConfigVectors::showVimLogo($_iconsSized, $_iconsSized);

        echo <<<HERE
    <li class="pure-menu-item"><a href="main.php?EX=algo" class="pure-menu-link">$this->algo Algorithmique</a></li>
    <li class="pure-menu-item"><a id="displayJavaSeMenu" href="javascript:togglejavasemenu();" style="display:block;">$this->java JAVA SE</a></li>
        <ol id="toggleJavaSeMenu" style="display: none;">
        <li class="pure-menu-item"><a href="main.php?EX=java" class="pure-menu-link"> Procédural</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=javaoo" class="pure-menu-link"> Orienté Objet</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=javadesign" class="pure-menu-link"> Design Patterns</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=javafx" class="pure-menu-link"> FX (Swing)</a></li>
        </ol>
        
    <li class="pure-menu-item"><a id="displayJavaEeMenu" href="javascript:togglejavaeemenu();" style="display:block;">$this->java JAVA EE</a></li>
        <ol id="toggleJavaEeMenu" style="display: none;">
        <li class="pure-menu-item"><a href="main.php?EX=javajeebase" class="pure-menu-link"> Bases architecture</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> Inversion Contrôle</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> Servlet, JSP, MVC</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> ORM JPA Hibernate</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> Spring MVC</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> EJB</a></li>
        <li class="pure-menu-item"><a href="main.php?EX=" class="pure-menu-link"> Spring Boot & Cloud</a></li>
        </ol>    
        
    <li class="pure-menu-item"><a id="displayCppMenu" href="javascript:togglecppmenu();" style="display:block;">$this->cpp C++</a></li>
    <ol id="toggleCppMenu" style="display: none;">
    <li class="pure-menu-item"><a href="main.php?EX=cpp" class="pure-menu-link"> Procédural</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=cppoo" class="pure-menu-link"> Orienté Objet</a></li>
    </ol>

    <li class="pure-menu-item"><a href="main.php?EX=sql" class="pure-menu-link">$this->sql SQL</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=network" class="pure-menu-link">$this->console Réseau</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=git" class="pure-menu-link">$this->git Git</a></li>
    <li class="pure-menu-item"><a href="main.php?EX=vim" class="pure-menu-link">$this->vim VIM</a></li>
    
    <li class="pure-menu-item"><a href="mailto:jerome.villiseck@gmail.com" class="pure-menu-link">$this->sourcecode Contact</a></li>

HERE;
        return;
    }
}
