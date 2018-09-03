
/////////////////////////////
APACHE DROITS RESTREINTS
/////////////////////////////


L'authentification peut être définie dans un conteneur Directory. Lorsque vous demandez une
authentification, une boite de dialogue (nom et mot de passe) apparaît aux utilisateurs qui souhaitent
explorer vos pages.


Pour mettre en place un accès restreint, il faut maîtriser le programme de création de comptes
htpasswd ainsi que les 4 directives suivantes
AuthType (1)
AuthUserFile (2)
AuthName (3)
Require (4)



AUTHTYPE (1)
= Cette directive sélectionne le type d'authentification pour un répertoire. Nous utiliserons le type Basic.
Pour fonctionner correctement, elle devra être accompagnée des directives AuthName et Require, et
des directives telles que AuthUserFile et AuthGroupFile.

[DIRECTIVE] AuthType [Type_a_choisir]
par defaut
[DIRECTIVE] AuthType Basic




AUTHUSERFILE (2)
= La directive AuthUserFile définit le nom du fichier texte dans lequel est enregistré une liste de noms
d'utilisateurs et des mots de passe qui leur sont associés dans le but d'une authentification d'accès.
nomFichier est le chemin d'accès absolu au fichier d'utilisateurs.

[DIRECTIVE] AuthUserFile [chemin_acces_absolu_nomFichier]

Chaque ligne de ce fichier spécifie un nom d'utilisateur suivi d'un deux-points, puis du mot de passe
sous sa forme encryptée. Le comportement en cas de multiples occurrences du même nom d'utilisateur
reste indéterminé.

Nota : dès que le fichier utilisateurs est de grande taille, cette méthode se révèle très peu performante ;
on préfèrera utiliser AuthDBMUserFile à la place.




AUTHNAME (3)
= Cette directive indique le nom du schéma d'autorisation pour un répertoire. Ce schéma sera donné au
client de sorte que l'utilisateur sache quel nom et quel mot de passe envoyer. Pour fonctionner
correctement, elle devra être accompagnée des directives AuthType et Require, et des directives telles
que AuthUserFile et AuthGroupFile.

[DIRECTIVE] AuthName [domaine-autorisé]
par defaut
[DIRECTIVE] AuthName zone-restreinte


REQUIRE (4)
= Cette directive définit les utilisateurs autorisés à accéder au répertoire.

[DIRECTIVE] Require user [utilisateur] [utilisateur]...
> Seuls les utilisateurs nommés (séparation par un caractère espace) peuvent accéder au répertoire.
[DIRECTIVE] Require group [nomGroupe] [nomGroupe]...
> Seuls les utilisateurs des groupes cités peuvent accéder au répertoire.
[DIRECTIVE] Require valid-user
> C'est cette syntaxe qui nous intéresse. Tout utilisateur reconnu (login + mot de passe valide) peut
accéder au répertoire.



EXEMPLE CONCRET DE MISE EN PLACE DE ZONE RESTREINTE

[httpd.conf]
DocumentRoot '/var/www' (double quotes)

<Directory '/var/www'> 	(double quotes)
	AllowOverride All
	Options Indexes
	# Allow open access:
	Require all granted
	IndexOptions ShowForbidden
</Directory>

[TERMINAL] 
mkdir /var/www/restreint

[httpd.conf]
<Directory '/var/www/restreint'> (le_dossier_a_proteger)
	Options none
	AuthType basic
	Authname zone-restreinte
	AuthUserFile /home/cnam/userslist
	Require valid-user
	Order allow,deny
	Allow from all
<Directory>

[TERMINAL]
htpasswd -c /home/cnam/userslist [nom_utilisateur_au_choix]
>puis entrer 2 fois le mot de passe voulu pour [nom_utilisateur_au_choix]




