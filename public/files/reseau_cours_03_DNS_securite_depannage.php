
/////////////////////////////
DNS SECURITE RESEAU DEPANNAGE RESEAU
/////////////////////////////


LA RESOLUTION DE NOM - DNS

NIC > Gestion noms de domaine niveau mondial
AFNIC > Gestion noms de domaine en france

Interrogation client serveur immense BDD

Le navigateur demande la traduction du nom www.insee.fr en adresse IP auprès du serveur DNS local :
c'est la résolution de nom. Le DNS local interroge éventuellement d'autres serveurs de nom.

Le serveur de nom retourne l'adresse IP au navigateur (194.254.38.80) puis ce dernier se connecte au
serveur (httpd) comme si l'adresse IP avait été spécifiée directement dans l'URL du navigateur.

Chaque nœud est identifié (indexé) par un nom.
La profondeur est limitée à 127 niveaux.

	-specifique
/
com
cisco
admin
etc
	+specifique

Un nom absolu est appelé Full Qualified Domain Name. Les nœuds ou feuilles d'un même parent
doivent être uniques.	


Un domaine est un sous-arbre de l'espace nom de domaine.
Un nom de domaine est la séquence de noms depuis le nœud jusqu'à la racine

DELEGATION
L'organisation responsable du domaine fr délègue la gestion de domaines dans le domaine fr à d'autres
organisations (ex : insee, gov). L'organisation responsable du domaine gov délègue à des
administrations la gestion de sous-domaines (ex : équipement, éducation, intérieur).
	>Attention, il est possible de créer des sous-domaines sans pour autant déléguer.


domaines de niveau supérieur ou Top Level Domain (TLD).
	com organisations commerciales : cisco.com
	edu organisations universitaires : mit.edu, berkeley.edu
	gov organisations gouvernementales : nsf.gov, nasa.gov
	mil organisations militaires : army.mil
	net organisations réseau Internet : worldnet.net
	org organisations non commerciales : eff.org


RESOLUTION DE NOM
Elle consiste à obtenir l'adresse IP à partir du nom. Dans chaque zone, il existe des serveurs de noms
qui ont autorité sur celle-ci. Un serveur de nom qui a autorité sur cette zone connaît l'ensemble des
correspondances Nom/adresse IP pour cette zone.

RESOLUTION INVERSE
Nota : sous LINUX les commande whois adresse IP ou nslookup adresse IP permettent de connaître
l'alias internet d'un domaine.
Les machines sont reliées entre elles dans un même domaine et non par adressage.


INTEROGATION RECURSIVE
L'interrogation récursive oblige le serveur à fournir une réponse (négative ou positive) et le client de
base utilise ce type de requête.

INTEROGATION ITERATIVE
L'interrogation itérative oblige le serveur à répondre du mieux qu'il peut avec ce qu'il sait. S'il ne
connaît pas la réponse, il fournit des informations susceptibles d'aider le demandeur dans sa recherche.

MEMOIRE CACHE DNS
mécanisme qui améliore les performances du DNS. Un serveur qui a reçu une requête
récursive effectue un grand nombre d'interrogations. Il apprend et mémorise l'adresse des serveurs
ayant autorité sur une zone et l'adresse IP des hôtes recherchés.


ARCHITECTURE LOGICIELLE DNS
	RESOLVER C'est un ensemble de routines logicielles (librairie) qui interroge les serveurs dE noms.
	SERVEURS DE NOM gère les données d'un segment dans l'espace nom de domaine. Il exécutE Un processus particulier répondant aux questions de conversion nom / adresse IP.
	ENREGISTREMENTS DE RESSOURCES les données associées au nom sont contenues dans des enregistrements de ressources (Resource Records ou RR).


	SERVEUR DE NOM
		SERVEUR DE NOM PRIMAIRE  il gère la base de données de la zone dont il a l'autorité administrative.
		SERVEUR DE NOM SECONDAIRE à l'instar du serveur primaire, il a l'autorité sur la zone etobtient les données de la zone via un autre serveur (primaire ou secondaire) de nom qui a l'autorité sur cette zone.
		SERVEUR CACHE Il n'a autorité sur aucun domaine et met en œuvre la seule fonction de cache.

	SERVEURS RACINE
		Les serveurs racine connaissent les serveurs de nom ayant autorité sur tous les TLD. Ils connaissent au
		moins les serveurs de noms pouvant résoudre le premier niveau



LES RESEAUX ET LA SECURITE


		3 SERVICES
			CONFIDENTIALITE > seules les personnes autorisées peuvent prendre connaissance des donnees
			INTEGRITE > seules les personnes autorisées peuvent modifier les données échangées.
			AUTHENTIFICATION > d'un tiers vise à s'assurer de l'identité de celui-ci.


	CHIFFREMENT > coder un message en clair en un message indéchiffrable.
		A CLE SECRETE > même clé partagée par l'émetteur et le récepteur. les échanges des clés doit se faire préalablement de façon sécurisée.
		A CLE PUBLIQUE > cryptage avec ma clée privée. le message vient forcément de moi il n'y a que moi qui peut chiffrer (non-répudiation). le message ne peut être modifié sans décryptage (intégrité)
							destinataire décrypte avec ma clé publique.

	FONCTION DE HACHAGE
		Les fonctions de hachage sont utilisées pour apposer un sceau  	au message (scellement) et pour signer un message.


	GESTION DES CLES SECRETES (CREATION, DISTRIBUTION INITIALE, GESTION)
		> gestion manuelle des clés.
		> modèle de distribution centralisé qui s'appuie sur un tiers appelé Centre de Distribution des clés ou KDC (Key Distribution Center) qui distribue les clés de sessions

	ETRE SUR DE L'IDENTITE D4UN PROPRIETAIRE DUNE CLE PUBLIQUE
		> Contact facial
		> Concept de certificat

	CONCEPT DES CERTIFICATS
		Le problème est ramené à la connaissance des clés publiques de tiers certificateur (moins nombreux
		que l'ensemble des clés publiques). Le certificateur va délivrer un certificat tel que un message signé
		avec sa clé privée.

		1. Déchiffrement du certificat, et obtention alors la clé publique de A (PA).
		2. Utilisation de cette clé pour déchiffrer le cryptogramme.
		3. Authentification de A s'il retrouve la même clé publique dans le cryptogramme.

		Les navigateurs Internet du marché sont livrés avec la connaissance intégrée des clés publiques d'une
		dizaine d'organismes certificateurs.


sécurisation des couches Applicatives
>protocole PGP (Pretty Good Privacy)
>protocole S-HTTP

sécurisation de la couche Transport
>SSL (Secure Socket Layer).
	CONNEXION DU CLIENT AU SERVEUR
	REPONSE DU SERVEUR AVEC SON CERTIFICAT
	NEGOCIATION ET ECHANGES DE CLES

>SSH
	mécanismes de sécurité pour :
	Les connexions à distance.
	Le transfert de fichiers.
	La re-direction des ports TCP.



DEPANNAGE DE RESEAUX COMMANDES

	# ifconfig eth0
		fournit la configuration de base IP de l'hôte et permet de vérifier l'état d'une interface.
		Détermination de l'état de l'interface.
		Détermination de l'adresse IP.
		Détermination d'un masque de sous-réseau.

	#arp -a
		permet la conversion des adresses IP en adresses Ethernet.
		Elle est à utiliser pour mettre en évidence une entrée erronée ou inattendue  dans la table ARP.
		Arp -a affiche l'ensemble des entrées de la table ARP.
		Arp -d adr-ip détruit l'entrée d'adresse ip spécifiée dans la table ARP.
		Arp -s adr-ip adr-Eth permet l'ajout manuel d'une entrée dans la table

	#ping
		permet de tester la présence sur le réseau d'une machine ou de mesurer les temps de réponse pour
		cette machine. La réponse à un ping d'une machine distante indique que le problème est aux niveaux
		des couches applicatives a l'inverse d'une réponse en erreur qui indique que le problème est aux
		niveaux des couches inférieures ou sur les équipements distants.

	Mauvaise adresse IP ou hôte inconnu :
		Problème de résolution DNS.
		Le nom n'existe pas.
		Le serveur de nom est en panne. Le ping de l'adresse IP du DNS permet de trancher dans la
		plupart des cas.

	Aucune réponse ou request time out :
		Mauvaise configuration de la station locale ou distante.
		Une route est tombée.
		La machine distante est en panne.
		L'exécution de 'netstat' ou 'traceroute' doit permettre de trancher.

	Les délais :
		Exemple : Reply from 200.13.11.38: bytes=32 time<10ms TTL=32.
		Le champ time permet d'apprécier le délai.
		L'echo <10ms est normalement celui qu'on doit trouver sur un réseau local. Des temps plus
		long >100ms traduisent des problèmes sur le réseau local.

	# netstat -rn
		De vérifier si l'adresse de destination correspond à une route.
		De vérifier la présence éventuelle d'une route par défaut.
		De vérifier la présence de routes dynamiques (UGD).
		De tester la connectivité de la passerelle.

	# nslookup s1.insee.fr
		La vérification de la résolution de nom.
		D'identifier la localisation les serveurs de nom d'un domaine.
		Le listage de l'ensemble des RR d'un domaine.

	# dig www.insee.fr
		Meme fonctionnalité que NSLOOKUP	





QUESTIONS REPONSES


1/ Le masque IP permet de cacher des hôtes sur un réseau :

Faux : il permet de faire des sous réseaux locaux avec des plages d'adresses hôtes bien définies. La partie réseaux des
adresses IP sera ajustée en fonction du nombre d'hôtes disponibles.


2/ Le découpage d'un VLAN en sous réseaux permet une isolation en section :

Vrai: on isole judicieusement les sections d'un réseau avec des masques de sous réseaux pour confiner les mêmes
adresses IP d'un groupe de travail par exemple. Il permet aussi de localiser plus facilement des machines défaillantes sur
un grand VLAN.


3/ Le modèle client/serveur permet la mise en place facile de sites marchants :

Faux : Ce concept générique est utiliser dans les réseaux pour établir des règles de connections, de dialogues, et
d'échanges entre une machine client et un serveur distant. Le serveur Apache et le navigateur Firefox fonctionnent sur
ce modèle.


4/ Dans le modèle client /serveur, le serveur attend en boucle des connections sur un port dédié :

Vrai : a chaque nouvelle tentative de connection d'un client réseau, il analyse et falide la connection et délègue le reste
du traitement à un processus fils. Ensuite il attend de nouvelles connections.


5/ Dans le modèle client /serveur, un service est un processus de traitement d'une requête cliente :

Vrai: c'est le résultat de l'analyse et de la validation du processus parent appelé « serveur ».


6/ Un numéro de port IP peut être supérieur à 1024 :

Vrai : de 1 à 1024 les numéro sont normalisés. Au dessus de 1024, il sont disponibles pour toute utilisation. LA limite
des numéros de ports est 65535.


7/ Le fichier « /etc/services » liste les principales urls des sites marchand sur Internet :

Faux : Le fichier listes les numéro de ports des services réseaux disponibles sur la machine.


8/ L'interface RPC permet l'exécution à la volée des services en fonction des requêtes sur le réseau :

Vrai : par ce principe, les serveurs ne tournent pas constamment et il sont démarrés à la demande pour éviter de
surcharger la mémoire centrale. Ce principe est utilisé sur les périphériques embarqués qui n'ont pas beaucoup de
mémoire. Sur les gros serveurs, les services tournent constament en mémoire centrale.


9/ Un DNS permet de vérifier si une adresse IP est valide sur Internet :

Faux. Le DNS est un annuaire entre les noms de machines et les adresse IPs.


10/ Le DNS est une base de données centralisée et mondiale :

Vrai : C'est une base de données principale localisée aux Etat Unis et copiée/synchronisée localement dans tous les pays
du globe.


11/ Un serveur DNS délégué s'occupe d'une portion du réseau Internet :

Vrai: il pourra résoudre les noms des machines du sous réseau dont il a la charge. Pour tous les autres noms, il déléguera
la résolution aux serveurs de la portion supérieure du réseau.


12/ Le nommage des hôtes dans les DNS est sensible à la case :

Faux : il est insensible à la case. Il est découpé par des nœuds, séparé par un point et peut avoir 63 caractères maximum.
Il peut y avoir 127 nœuds au maximum pour un hôte.


13/ Nom dans un DNS est séparé en 2 parties

Vrai : le nom de l'hôte, et la nom du réseau à qui il appartient.


14/ « .com » est un nom de domaine référencé dans les DNS primaires :

Vrai : ce nom de domaine représente un ensemble de sous-domaines identifiés à but commercial.


15/ Si les DNS secondaires d'un pays disparaissent, l'Internet dans ce pays n'est plus disponible :

Vrai : bien qu'il y ai de la redondance et des caches, ce genre d'incident coupe un pays du réseau Internet. Il n'y a plus de
résolution local des noms d'hôtes pour naviguer sur le reste du monde.


16/ La commande « nslookup » permet de connaître la configuration réseau de votre machine :

Faux : c'est « ifconfig ». « nslookup » permet de vérifier que la résolution de noms est bien active et que les DNS sont
bien configurés pour naviguer sur Internet.



17/ Le fichier « /etc/hosts » permet la résolution de nom en local :

Vrai : ce fichier liste en dur la correspondance entre les adresses IP et les noms de machine locales.


18/ L'identification est la règle unique pour naviguer en toute sécurité sur les réseaux :

Faux : Les régles de base sont : Confidentialité de l'utilisateur, Intégrité des données de l'utilisateur, et Authentification
de l'utilisateur.


19/ SSL est un protocole réseau pour encrypter les données sur Internet :

Vrai : il encode les sockets IP afin que le contenu ne puisse pas être lu par un tier.


20/ La commande « ping » permet de vérifier la présence d'un ordinateur sur le réseau :

Vrai : si le protocole IGMP n'est pas filtré par un pare-feu, la machine répondra sur le réseau par son adresse IP.
