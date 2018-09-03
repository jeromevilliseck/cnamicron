
/////////////////////////////
GENERALITES HTTP
/////////////////////////////


CONNEXIONS SIMULTANEES
[SOCKET] 192.168.1.10:1031 fenetre firefox 1	<>	194.51.207.49:80 (site)
[SOCKET] 192.168.1.10:1047 fenetre firefox 2 <>	194.51.207.49:80 (site)

Lorsque vous consultez un serveur web sans préciser de numéro de port, vous aboutissez sur le port n°80.


CONNEXIONS LOCALES
[SOCKET] 127.0.0.1:1031	fenetre firefox <>	127.0.0.1:80 (Apache)

127.0.0.1 s'appelle adresse de boucle locale (ou localhost). Si vous utilisez cette
adresse, TCP/IP ne passe plus les informations aux périphériques réseau mais reste au niveau local.

Démarrez le serveur web Apache (service httpd).
#systemctl start httpd

Voir les connexions tcp en cours
#netstat –anpt 1

http://127.0.0.1:80 le serveur web apache est à l'écoute sur le port 80
http://127.0.0.1:600 ne fonctionnera pas.

Plus d'informations sur les processus à l'origine de l'ouverture des ports
#nmap -sTU 127.0.0.1

Liste complète des correspondances entre numéros de ports et services
#cat /etc/services

PROTOCOLE HTTP
Syntaxe pour l'utilisation de telnet
[type de requête] [désignation de la page sur le serveur] [type de protocole] [options]

exemple :
GET / HTTP/1.0
	>On telecharge ici la page racine du serveur (/) et on utilise la version 1 du protocole http
	Le serveur web revoie alors le contenu sous format html de la page d'accueil des documents

TELNET
	>en localhost : #telnet 127.0.0.1 80
	>en reseau : #telnet [nom_domaine] ou [adresse_ip]

