
/////////////////////////////
APACHE CONFIGURATION DE BASE
/////////////////////////////


les fichiers de configuration sont analysés par
Apache au moment du démarrage, lignes après lignes.

Un caractère # en début de ligne du fichier httpd.conf signifie que la ligne doit être considérée
comme un commentaire. Cette ligne est alors ignorée.

Chaque ligne du fichier httpd.conf qui ne commence pas par le caractère # est considérée comme une
instruction à suivre. Le premier mot d'une ligne non commentée par # s'appelle une DIRECTIVE.

Les directives placées dans le fichier httpd.conf s'appliquent généralement à l'ensemble du
fonctionnement du serveur sauf si elles sont encadrées par des directives conteneurs.


le mot [DIRECTIVE] n'est pas à inclure dans le fichier de configuration d'apache pour les
directives ci-dessous.






---DIRECTIVES PRINCIPALES----


SERVERTYPE (pas utilisé dans la config de base)
= définit comment le serveur est exécuté par le système d'exploitation.


[DIRECTIVE] ServerType inetd (déconseillé)
ou
[DIRECTIVE] ServerType standalone





SERVERROOT
= définit le répertoire dans lequel se situe le serveur. Typiquement, ce répertoire
contiendra les sous-répertoires conf/ et logs/. Les chemins d'accès relatifs pour d'autres fichiers de
configuration seront considérés relativement à ce répertoire.


[DIRECTIVE] ServerRoot [dossier]
par defaut
[DIRECTIVE] ServerRoot '/etc/httpd' (double quotes a mettre)





PORT
= Cette directive indique un numéro de port. C'est un nombre compris entre 0 et 65535; certains numéros
de ports (surtout en dessous de 1024) sont réservés pour des protocoles spécifiques. Une liste des ports
prédéfinis est consultable dans le fichier /etc/services; le port standard assigné au protocole http est le
port 80.


[DIRECTIVE] Listen [numero_de_port_a_choisir]
par defaut
[DIRECTIVE] Listen 80





SERVERADMIN
= définit l'adresse e-mail que le serveur inclut dans tout message d'erreur
retourné au client.
Il est déconseillé d'utiliser un compte administrateur (root) comme adresse email.


[DIRECTIVE] ServerAdmin [adresse_mail_a_communiquer]
par defaut
[DIRECTIVE] ServerAdmin root@localhost





SERVERNAME
= nom de domaine entièrement qualifié
C'est le nom du serveur web. Exemple : www.serveur.com.


[DIRECTIVE] ServerName [Nom_de_domaine]:[Numero_de_port]
par defaut
[DIRECTIVE] ServerName www.example.com:80





DOCUMENTROOT
= définit le répertoire racine à partir duquel httpd va distribuer les fichiers. Sauf si le
répertoire est pointé par une directive telle que Alias, le serveur ajoute le chemin relatif mentionnée
dans l'URL présentée à cette racine pour établir le chemin complet jusqu'au document.


[DIRECTIVE] DocumentRoot 'chemin_absolu_du_repertoire_ou_sont_les_pages' (double quotes)
par defaut
[DIRECTIVE] DocumentRoot '/var/www' (double quotes)


Exemple
DocumentRoot /home/web
Un accès à http://www.serveur.com/index.html se réfère au document /home/web/index.html.
(!) un bogue existe pour cette directive mod_dir, laquelle fonctionne mal lorsque
DocumentRoot est donnée avec un '/' final (c-à-d. 'DocumentRoot /usr/web/'). Il vaut mieux éviter
cette écriture.
(!) Il est recommandé de toujours écrire un <Directory [chemin_absolu_du_repertoire_ou_sont_les_pages]>
qui correspond au même chemin que le document root.





DIRECTORYINDEX
= Avec cette directive, vous déclarez les fichiers qui sont susceptibles d'être affichés lorsqu'un client
demande à accéder à un répertoire sans préciser le nom de la page.
(!) Si aucun fichier correspondant n'est placé il y aura forbidden d'affiché si options indexes n'est pas spécifié


<IfModule dir_module>
	[DIRECTIVE] DirectoryIndex [page1_daterrissage.html] [page2_daterrissage_si_pasdepage1.html] ....
	ou par default
	[DIRECTIVE] DirectoryIndex index.html
</IfModule>






---CONTENEURS---

Attention, toutes les directives d'Apache ci-dessus ne supportent pas forcément le placement dans un
conteneur.


Il existe d'ailleurs pour chaque directive d'Apache une notion de contexte. Le contexte signifie
l'endroit où l'on peut placer (et où va s'exprimer) la directive. Par exemple :

Directive : ServerName
Contexte : configuration serveur, hôte virtuel

Signifie que la directive ServerName qui a été vue lors de la séance précédente se place au niveau
global (configuration serveur) ou pour un serveur virtuel (cette notion sera abordée plus tard). On ne
peut donc pas placer ServerName dans le conteneur qui suivent.




DIRECTORY
= Il désigne un répertoire (directory) sur le disque local. Il va limiter
l'effet des directives qu'il contient à ce répertoire ainsi que tous ses sous-répertoires sauf si, un autre
conteneur avec d'autres directives est défini pour un sous-répertoire.


<Directory [chemin absolu désignant le répertoire]>
...
</Directory>

dans ...
on peut mettre des options


SYNTAXE DES DIRECTIVES DE CONTENEUR

Options [nom_de_loption]
>[nom_de_loption] disponibles :
All > toutes les options sont autorisées, sauf Multiviews. A utiliser avec beaucoup de précautions.
ExecCGI > vous autorisez l'exécution de scripts CGI (Perl, Bash, C, C++ ...).
FollowSymLinks > vous autorisez les clients URL à suivre les liens symboliques. Ne se combine pas avec Options Indexes.
SymlinksIfOwnerMatch > le lien symbolique n'est suivi que si l'UID cible est identique à l'UID lien. Cette option est annulée par un FollowSymLinks ou All.
Includes > vous autorisez les inclusions côté serveur (SSI : Server Side Include). Les SSI sont un
	langage de programmation fait pour être interprété par un serveur HTTP. Les SSI facilitent la
	maintenance des sites web en permettant de conserver dans un seul fichier les parties de page web qui
	se retrouvent à l'identique dans toutes les pages du site. Il s'agit souvent de l'en-tête et du pied de page,
	qui contiennent des informations comme le nom du site, les coordonnées de son auteur, etc.
	Si la SSI est exécutable, elle nécessite un ExecCGI et un AddHandler (pour reconnaître son extension).
IncludesNOEXEC > les includes sans exécutions possibles. Plus sécurisant que la précédente. Désactivée par Includes ou All.
Indexes > Indexes autorise un listing répertoire s'il n'existe pas de fichier de type index spécifié par la directive serveur DirectoryIndex. 
	Indexes peut être contrôlée plus finement par IndexesOptions.
Multiviews > sert à gérer les sites multilingues.
None > désactive toutes les options.




AllowOverride [surcharge] [surcharge]
= AllowOverride permet de déléguer la gestion des propriétés du répertoire aux concepteurs de pages
web (avec des fichiers .htaccess). Il sera étudié ultérieurement.
>par defaut
AllowOverride All
>si on ne veut pas que les concepteurs de pages ai des droits d'administration
AllowOverride None




Allow [hote] [hote] ...
= Cette directive permet d'autoriser l'accès au répertoire en fonction de critères comme le nom de la
machine cliente, son adresse IP, son adresse réseau, le nom du navigateur utilisé, ...
>par defaut
Allow from all
>exemples de syntaxe
Allow 192.168.10.0 / 255.255.255.0
Allow 192.168.10.0/24
Allow 192.168.10.




Deny [hote] [hote] ...
= Cette directive permet d'interdire l'accès au répertoire en fonction de critères comme le nom de la
machine cliente, son adresse IP, son adresse réseau, le nom du navigateur utilisé, ...
>par defaut
(rien)




Order [allow],[deny]
= Cette directive permet de sélectionner l'ordre dans lequel les règles Allow Deny seront traitées.
Si vous choisissez l'ordre deny,allow par défaut tout est refusé. La règle allow sera examinée la
première et deny (si elle existe) ensuite.
(!)SYNTAXE pas d'espace avant après la virgule séparant les deux termes.
>par defaut
Order allow,deny






--- ALIAS ---


Alias /icons /home/icons
= Signifie que sur votre serveur web, l'URL http://localhost/icons/ désigne le répertoire /home/icons sur
le disque.

La directive Alias permet de donner de la souplesse au système en désignant par un nom, accessible
via une URL, un répertoire du disque local situé en dehors de la racine des documents.

La directive Alias n'est pas un conteneur.



