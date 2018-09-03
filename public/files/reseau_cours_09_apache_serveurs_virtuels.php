
/////////////////////////////
SERVEURS VIRTUELS
/////////////////////////////


Vous pouvez, sur une seule machine, héberger plusieurs sites différents qui seront vu de l'extérieur
comme des serveurs web distincts. Pourtant, un seul processus Apache est lancé au départ. C'est le
concept de serveur virtuel.


Il existe trois méthodes de sélection :

- Par adresse IP. La machine dispose de plusieurs adresses IP et suivant l'adresse utilisée, on accède au
serveur web choisi.

- Par port. Les serveurs web virtuels écoutent sur des ports différents.

- Par nom. Si le navigateur supporte le protocole HTTP1.1 (ce qui est le cas de tous les navigateurs
actuels) c'est le nom du serveur qui sert pour la sélection.





HERBGEMENTS MULTIPLES BASES SUR IP OU PORTS DIFFERENTS




1. DEFINIR UNE ADRESSE IP SUPPLEMENTAIRE (ALIAS) POUR LA MACHINE
ifconfig lo:0 192.168.30.1
	>lo:0 est l'alias numero 0
	>lo est une interface logicielle
	>192.168.30.1

ifconfig
	>fais apparaitre la nouvelle adresse ip

ifconfig lo:0 down
	>desactive l'alias numero 0
	
	(!)Lors de la mise sous tension de la machine cela supprime les alias.
	Pour les conserver suivre ce lien:
	https://www.linuxtricks.fr/wiki/mageia-systemd-restaurer-la-fonctionnalite-rc-local

ping 127.0.0.1 
	>(test de votre adresse ip de bouclage).
ping 192.168.30.1 
	>(test de votre alias ip).




2.MODIFIER LE FICHIER /etc/hosts
Dans le fichier /etc/hosts ajoutez la ligne
192.168.30.1 web2

Toujours dans ce même fichier, ajoutez le nom web3 à la fin de la ligne 127.0.0.1
127.0.0.1 web3

	Nota : Ne supprimez jamais ce qui était défini par défaut dans la ligne 127.0.0.1 (localhost....)
	vous risquez de bloquer certains services de Linux. Pensez aussi à ajouter une ligne vide à la fin
	de votre fichier /etc/hosts.

Un test avec la commande ping sur web2 et web3 doit être concluant.





3.CONFIGURATION D'APACHE VIA httpd.conf

VIRTUALHOST (Directive de type conteneur)
<VirtualHost adresse[:port]> 
...
</VirtualHost>

>On définit un serveur virtuel pour les requêtes destinées à l'adresse 192.168.10.3

<VirtualHost 192.168.10.3>
ServerAdmin webmaster@w2
DocumentRoot /home/www2			>>>(racine des documents dans /home/www2)
ServerName w2				>>>(le serveur s'appelle w2)
ErrorLog logs/w2-error_log		>>>(les fichiers journaux sont w2-error_log)
CustomLog logs/w2-access_log common			>>>(w2-access_log)
</VirtualHost>



<VirtualHost 192.168.20.5:8000>
...
</VirtualHost>
On définit un serveur virtuel pour les requêtes destinées à l'adresse 192.168.20.5 sur le port 8000


Si vous souhaitez qu'Apache se mette à l'écoute sur une certaine adresse à un autre port, vous devez le
déclarer avec la directive Listen. Cette directive devra être utilisée dans le cas d'un serveur virtuel à
l'écoute d'un port différent de celui déclaré par la directive port (80 par défaut).
[DIRECTIVE_A_IMBRIQUER_DANS_CONTENEUR_Virtualhost]Listen [adresseIp:]numéroPort

		Si vous souhaitez qu'Apache se mette à l'écoute d'un port particulier sur toutes les interfaces, ne
		précisez pas d'adresse IP à la suite de Listen comme indiqué ci-dessous :
		listen 8080

		Si vous souhaitez qu'Apache se mette à l'écoute sur un port particulier à une certaine adresse IP,
		précisez la comme indiqué ci-dessous :
		listen 192.168.50.22:8000




HEBERGEMENTS MULTIPLES BASES SUR DES NOMS DIFFERENTS



1. CONFIGURATION D'APACHE httpd.conf VIA DIRECTIVE SERVERALIAS

SERVERALIAS (Directive de type conteneur)
= Si un des noms déclarés avec la directive ServerAlias apparaît dans la requête http, le serveur virtuel en
question répondra à la requête du client.

[DIRECTIVE]ServerAlias nomserveur [nomserveur]


2. EXEMPLE CONCRET

	1. dans le fichier /etc/hosts
		doit se terminer par le nom (précédé d'un espace) virtuweb.
	
	
	2.Pour le fichier de configuration du serveur virtuel httpd.conf:
	Listen 127.0.0.1:8080
	
	<VirtualHost 127.0.0.1:8080>
	ServerAdmin webmaster@virtuweb
	DocumentRoot /home/virtuweb
	ServerName virtuweb
	ServerAlias monserveurvirtuel
	ErrorLog logs/virtuweb-error_log
	CustomLog logs/virtuweb-access_log common
	
	<Directory />
	Options Indexes
	Order allow,deny
	Allow from all
	Satisfy any
	</Directory>
	
	</VirtualHost>
	
	
	3. On pensera à créer le dossier logs dans /home/virtuweb et on vérifiera les droits d'accès aux dossiers et
	aux fichiers.
	
	
	4.Utilisation
	L' URL à utiliser est la suivante :
	http://127.0.0.1:80 80/ ou http://virtuweb:8080 ou http:// monserveurvirtuel:8080

