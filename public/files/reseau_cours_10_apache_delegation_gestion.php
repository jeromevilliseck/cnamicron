
/////////////////////////////
APACHE DELEGATION GESTION
/////////////////////////////


Vous avez pour l'instant l'habitude de centraliser la gestion d'Apache dans un (ou plusieurs) fichiers
comme httpd.conf.

Ces fichiers ne sont accessibles qu'à l'administrateur système. Pour des raisons évidentes de sécurité, on
ne doit pas autoriser un concepteur de pages à les modifier.

Il est malgré tout possible de donner un peu de souplesse à ce système à l'aide de délégations. L'idée est
d'autoriser les concepteurs de pages à agir sur certaines caractéristiques du serveur au moyen de fichiers
placés au même niveau que les pages html.



CREER UNE DELEGATION


LES FICHIERS DE CONFIGURATION : .htaccess




ACCESSFILENAME
= Lorsqu'il retourne un document au client, le serveur cherche le premier fichier de contrôle d'accès
existant dans cette liste dans chacun des répertoires inscrit dans le chemin d'accès menant au document,
pour déterminer si l'accès est autorisé dans chacun de ces répertoires.


[DIRECTIVE]AccessFileName .acl
> Avant d'exporter le document /usr/local/web/index.html, le serveur lira les fichiers
/.acl,
/usr/.acl,
/usr/local/.acl
/usr/local/web/.acl
...à la recherche de directives DANS CES FICHIERS, sauf si celles-ci ont été désactivées comme on le verra plus loin.





ALLOWOVERRIDE [All|None|type de directive]
= Une délégation se crée dans un répertoire (donc dans un conteneur Directory) précis à l'aide de la
directive AllowOverride.

	Lorsque le serveur trouve un fichier .htaccess (comme spécifié par AccessFileName) il doit savoir
	quelles sont les directives déclarées dans ce fichier qui peuvent outrepasser les droits fixés par des
	directives précédentes.
	
		Si la directive est définie à None, les fichiers .htaccess sont ignorés. Dans ce cas, le serveur n'essaie
		même pas de lire les fichiers .htaccess.
	
		Si la directive est définie à All toutes les directives possibles dans le contexte .htaccess sont autorisées
		dans les fichiers .htaccess.


Attention : par défaut tout est activé. Il est vivement conseillé de protéger votre serveur en
désactivant les délégations comme dans l'exemple suivant :


<Directory />
...
AllowOverride None
...
</Directory>



EXEMPLE CONCRET

L'administrateur du serveur a donc défini dans httpd.conf la directive :

<Directory />
Options None
AllowOverride Options
Order allow,deny
Allow from all
</Directory>

Dans le répertoire /home/concept, le concepteur de pages devra placer un fichier nommé .htaccess
contenant la directive Options avec les arguments souhaités. Par exemple :

Options Indexes




LA GESTION DES ERREURS


ERRORDOCUMENT
= personnaliser les pages produites par Apache lorsqu'une erreur
est rencontrée. Par exemple, la célèbre erreur 404 qui se produit lorsqu'un lien envoie vers une page
absente.

[DIRECTIVE] ErrorDocument [code_derreur] [message_a_faire_passer_ou_lien_URL]
exemple
ErrorDocument 500 http://foo.example.com/cgi-bin/tester
ErrorDocument 404 /
ErrorDocument 401 /subscription_info.html
ErrorDocument 403 'Sorry can't allow you access today' (double quotes)

