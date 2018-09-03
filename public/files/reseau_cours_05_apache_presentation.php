
/////////////////////////////
PRESENTATION APACHE
/////////////////////////////


MODULES APACHE LISTE PRINCIPALE

Noyau (core)	Fonctionnalités de base d'Apache. C'est le module principal.
mod_access	Contrôle d'accès basé sur le nom du client ou son adresse IP.
mod_actions	Exécution de scripts CGI en fonction du type de média ou de la requête.
mod_alias	Association de différentes parties du système de fichier de l'hôte dans l'arborescence des documents, et redirection des URL.
mod_asis	envoyer le document sans ajouter la plupart des en-têtes HTTP habituels.
mod_auth_core	module principal gérant l'authentification.
mod_auth_anon	Sous module d'authentification permettant l'accès aux utilisateurs anonymes à des zones authentifiées.
mod_auth_db	permettant l'authentification des utilisateurs à partir d'une base du type Berkeley.
mod_auth_dbm	permettant l'authentification des utilisateurs à partir d'un fichier DBM
mod_auth_digest	permettant l'authentification des utilisateurs à partir d'un fichier MD5,
mod_autoindex gère automatiquement des index de répertoires d'une manière similaire à la commande Linux « ls »,
mod_cern_meta	Support des méta-fichiers d'en-tête HTTP
mod_cgi	Appel des scripts CGI
mod_dir Permet la redirection des adresses se terminant par un répertoire sans slash de fin et la mise à disposition des fichiers index de répertoire,
mod_env	Passage de variables d'environnement aux scripts CGI
mod_expires	Génération des en-têtes HTTP Expires et Cache-Control en fonction de critères spécifiés par l'utilisateur.
etc etc ...




CHARGER UN MODULE

Pour être chargé, un module doit être appelé successivement par DEUX directives à placer dans le fichier httpd.conf environ ligne 200 :

LoadModule
Ex: LoadModule cgi_module modules/mod_cgi.so
AddModule
Ex: AddModule mod_cgi.c

On notera que l'emplacement des modules est noté en chemin relatif (ex : modules/mod_cgi.so). On
doit compléter ce chemin avec la valeur de serverrroot. par defaut ce chemin est /etc/httpd


MODULES APACHE NON STANDARD IMPORTANTS

mod_php	Permet d'exécuter des fichiers PHP.
mod_perl	Permet de développer des modules Apache entièrement en Perl, et d'exécuter des scripts Perl en ne démarrant qu'une seule fois l'interpréteur Perl intégré.
mod_bandwith	Permet d'activer une limitation de la bande passante côté serveur ou par connexion, basée sur le répertoire, la taille des fichiers ou l'adresse IP ou le domaine de l'internaute.
mod_frontpage	Active les extensions Frontpage.




RECHERCHER UN MODULE APACHE

module [nom recherché] apache
> taper cette requete dans un moteur de recherche.



COMMANDES APACHE [apache a comme nom de service httpd]

which httpd
> localise l'emplacement de l'executable apache dans le système de fichiers
httpd -l
> affiche les modules compilés chargés sur l'installation apache actuelle
httpd -d [chemin_absolu]
> spécifie le repertoire choisi qui pointera sur l'executable (appelé Serverroot)
> par defaut ce chemin est /etc/httpd
httpd -f [chemin_absolu_fichier_de_configuration_httpd.conf]
> spécifie sur quel fichier pointe la configuration du service httpd (apache)
httpd -D [Parametre]    ///    ex: httpd -DHAVE_PHP
> Définit un paramètre qui sera utilisé ensuite par le conteneur <IfDefine>...</IfDefine> pour exécuter
conditionnellement certaines directives.
httpd -t
> Teste la syntaxe des fichiers de configuration




COMMANDES SYSTEMD [l'interface utilisateur de cette commande est systemctl]

systemctl start httpd
> Demarre serveur apache
systemctl restart httpd
> Redemarre serveur apache
systemctl status httpd
> Donne le status du serveur apache

netstat -ant
> affiche la liste des ports ouverts

(!)
a = tous les processus
n = port ouverts désignés par des numéros
t = uniquement tcp affiché)

(!) chaque modification du fichier de configuration
necessite de redemmarer le serveur apache




COMMANDES DE SAUVERGARDE CONFIGURATION APACHE
cp -r /etc/httpd/conf /etc/httpd/conf_bck
> Copie récursivement tout le contenu du dossier de configuration

cat /etc/httpd/conf/httpd.conf | grep [chaine_de_caracteres_recherchee]
> Va afficher toutes les lignes contenant la chaine de caractères recherchee
> Utiliser avec include permet de voir toutes les lignes qui incluent un autre fichier pour des options de configuration

DISTRIBUTION FEDORA > totalité des directives dans httpd.conf
DISTRIBUTION MAGEIA > conf/httpd.conf + common/httpd.conf




LANCER KATE EN ROOT SUR MAGEIA

su -
<mot de passe root>
kate



ALLER VITE DANS L'ADMINISTRATION DU SERVICE APACHE

1.LANCER TERMINAL
2.CREER 4 ONGLETS
3.ONGLET 1 COMMANDE		/usr/sbin/httpd -t
>affichera l'analyse syntaxique du fichier de configuration d'Apache
4.ONGLET 1 COMMANDE		systemctl restart httpd
>relancera en tant que root le service Apache
5.ONGLET 1 COMMANDE		tail -f /etc/httpd/log/access_log
>affichera en tant que root le fichier journal d'Apache concernant les connections au serveur Web
6.ONGLET 1 COMMANDE		tail -f /etc/httpd/log/error_log
>affichera en tant que root le fichier journal d'Apache concernant les erreurs du serveur Web






QUESTIONS REPONSES

1/ Un dialogue Client/Serveur peut s'effectuer conjointement avec les protocoles TCP et UDP :

Vrai. 2 sockets peuvent être ouverte en même temps, une en UPD, une autre en TCP. C'est le cas de FTP qui passe
les commandes entre le client et le serveur en TCP, et transfert les grosses quantités de données en UDP. Ce dernier
est beaucoup plus rapide que TCP.


2/ Un client http connecté à un serveur va ouvrir une socket avec le même numéro de port de bout en bout :

Faux. Côté serveur le port 80 est utilisé par défaut. Côté client, c'est un numéro de port > 1024.


3/ Un navigateur Web peut ouvrir 2 sockets en même temps vers le même serveur Web :

Vrai. C'est le cas lorsque 2 onglets de Firefox sont ouverts en même temps vers 2 pages différentes mais hébergées
sur le même site Web.


4/ On peut faire dialoguer un navigateur Web et un serveur Apache sur la même machine via la boucle locale :

Vrai. C'est d'ailleur la méthode de test en local la plus commune avant un déploiement sur un serveur distant.


5/ La commande « netstat » permet d'afficher l'état des sockets ouvertes sur le réseau :

Vrai. Cette commande permet de distinguer les connections établies en TCP ou en UDP. Elle peut aussi afficher les
tables de routage pour chaque interface réseau.


6/ La commande « nmap » permet de lister les ordinateurs connectés au réseau local :

Faux. Cette commande permet d'identifier à distance les ports réseau ouverts sur un serveur et d'en déduire les
services actifs sur la machine.


7/ Le protocole « http » est une suite de commandes textes envoyées en clair vers un serveur Web :

Vrai. C'est le rôle d'un navigateur Web de pouvoir dialogue avec un serveur Web via ce protocole. On peut aussi
simuler un dialogue avec le serveur Web en utilisant la commande telnet.


8/ Apache est un serveur Web modulaire qui peut être personnalisé en fonction du besoin et des ressources système :

Vrai. On dispose de plus de 200 modules installables et indépendant, comme le support des CGI, de l'authentification,
du SSL, l'internationalisation, la gestion des hôtes virtuels, etc...


9/ L'exécutable correspondant au service Apache est « httpd » :

Vrai. Plus particulièrement, il est installé dans « /usr/sbin/httpd ». On l'utilise directement en ligne de commande avec
l'option « -t » pour tester la syntaxe des fichiers de configuration.


10/ Pour redémarrer un serveur Web Apache, il faut utiliser le contrôleur de service « systemctl » avec l'option « status» :

Faux. C'est option « restart » qu'il faut utiliser. Celle ci ré-initialise le serveur même s'il est déjà opérationnel. Cette
option force à recharger la configuration. L'option « status » affiche unique l'état en cours du serveur.


11/ Le fichier de configuration principal de Apache est « /etc/httpd/conf/httpd.conf » :

Vrai. C'est le point d'entrée de la configuration. D'autres fichiers sont inclus dans la paramétrage tel que les serveurs
virtuels et les options liées à SSL. Ce fichier est uniquement modifiable en « root ».


12/ Les fichiers journaux d'Apache sont disponibles dans « /var/log/httpd/ » :

Vrai. 2 fichiers texte sont à connaître : « access_log » pour avoir les traces des connections distantes et « error_log »
pour connaître les erreurs lors de la consultation des pages.


13/ Les conteneurs dans le fichier de configuration d'Apache permet de regrouper des commandes systèmes :

Faux. Les conteneurs regroupent des « Directives » dédiées aux options d'exportation de dossiers par le serveur.


14/ Le contexte d'utilisation des conteneurs est uniquement limité à la configuration globale du serveur :

Faux. Les contextes sont multiples. Il y a bien évidemment la configuration globale du serveur, mais aussi les serveurs
virtuels, et les configurations locales dédiées aux utilisateurs via les fichiers « .htaccess ».


15/ La directive « Port » permet de spécifier le numéro de port à utiliser avec la socket de connexion au serveur :

Vrai. C'est le port réseau qui écoute lorsque le serveur est en attente d'une connexion extérieure. Par défaut sa valeur
est 80..


16/ La directive « ServerRoot » indique le répertoire racine du système où est stocké toute la configuration du serveur :

Vrai. Ce dossier contient le fichier de configuration principal, les extensions sous forme de modules, les configuration
supplémentaires liés à SSL ou au serveurs virtuels, etc...


17/ La directive « DirectoryIndex » permet l'indexation des fichiers à exporter dans une base de données afin
d'améliorer les performances du serveur :

Faux. Cette directive permet d'indiquer quels sont les types de fichiers à ouvrir dans un dossier exporté lorsque l'url
utilisée le navigateur ne le précise pas. Exemple, le fichier « index.html » pour l'url « http://localhost/~cnam/pub/ ».


18/ Le conteneur « Directory » permet de personnaliser l'exportation d'un dossier par le serveur Web via le protocole
WebDav :

Faux. WebDav est un protocole qui exporte sur le Web les fichiers d'un dossier en lecture et en écriture. Le conteneur
« Directory » encapsule les options d'exportation d'un dossier contenant un site Internet (en lecture seule).


19/ La directive « AllowOveride » autorise l'écriture dans les fichiers exportés par un serveur Web :

Faux. Cette directive délègue la maintenance des sites Web aux utilisateurs, sans passer par l'administrateur du
serveur. On utilise pour se faire un fichier « .htaccess » pour la personnalisation des paramètres.


20/ La directive « alias » permet de faire un raccourci sur un dossier du système qui pourra être utilisé n'importe où
dans le fichier de configuration :

Vrai. Cela permet d'alléger le code utilisé dans le fichier de configuration d'Apache pour faciliter la maintenance et la
relecture.

