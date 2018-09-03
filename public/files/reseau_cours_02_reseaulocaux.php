
/////////////////////////////
RESEAUX LOCAUX
/////////////////////////////

LAN : Réseau local d'entreprise reliant des machines à distance max de centaines de mètres
	CABLAGE paire téléphonique, d'un câble coaxial, ou une de la Fibre optique.
	METHODE D'ACCES AU RESEAU topologie (étoile, anneau, bus 802.3)


		SOUS COUCHE MAC : Medium Access Control (COUCHE LIAISON)
			Gère les temps de parole
				D'identifier chaque carte réseaux de chaque station par une adresse physique.
				- De définir toutes les trames émises afin qu'elles comportent l'adresse de l'émetteur et du récepteur.
		
			topologie de réseaux en bus avec une gestion des collisions
			PRINCIPE > diffusion_ecoute_synchronisationauformatdudestinataire_lectureinfosdestinataire_sicorrespondenvoi_sinonignore
		
			GESTION DES COLLISIONS
				A et B parlent en même TEMPS > STOP
				ON ATTENDS que vous arretiez. J'informe les machines concernées de la collision. Votre message n'a pas été transmis.
				L'un de vous peut reparler, mais pas en même temps.


		ETHERNET (COUCHE PHYSIQUE)
		
		10Base 5 = 10Mb/s, bande de base, segments de 500mètres.
		10Base 2 = 10Mb/s, bande de base, segments de 200mètres.
		10base T = 10Mb/s, bande de base, paire torsadée.
		100Base T = 100Mb/s, bande de base, paire torsadée.
		1000Base T = 1Gb/s, bande de base, paire torsadée.






PROTOCOLES ASSOCIES AU RESEAUX LOCAUX (COUCHES 7 3 4 + TOPOLOGIE + TRANSMISSION DU SIGNAL + MEDIA)

	TCP/IP
	C'est un réseau en toile d’araignée qui permet la communication entre deux points A et B même si certain maillon de la chaîne sont défaillant.
		DATAGRAMME IP = format de la trame
		PROTOCOLE UDP = protocole de communication avec connexion mais sans accusé de réception. Il est non fiable car il n'y a aucun moyen de savoir si les données ont bien été émises.
		PROTOCOLE TCP = est un protocole fiable qui utilise un procédé d'accusé de réception avec un contrôle de Flux de donnée.

		L'adressage réseau doit permettre de définir un adressage indépendant de l'adressage physique.
		TCP adressage Statique ou dynamique (DHCP).
			adressage Attribuée à l'interface.
			adressage Multiple sur une même interface.
			adressage Multiple pour plusieurs réseaux IP sur le même réseau physique.

		ROUTAGE STATIQUE
			gestion exhaustive par l'administrateur des tables de routage par des
			commandes manuelles (ajout ou retrait de routes).
		ROUTAGE DYNAMIQUE
			met à jour dynamiquement les tables de
			routage par des échanges entre routeur et en utilisant différents types de protocoles d'échange de
			données.





INTERCONNEXION DES RESEAUX LOCAUX

		REPETEUR (2 PORTS) = AMPLIFICATION DE SIGNAL
			équipement électronique servant à dupliquer et à réadapter un signal numérique pour étendre la distance maximale entre deux nœuds d'un réseau.
			Il effectue une régénération du signal car le signal subit une atténuation et une distorsion.
		HUBS (ETOILE)
			répéteur multiports
			4 max sinon mauvaise gestion des collisions
		REPETEURS EMPILABLES
			Ils permettent d'accroître le nombre de ports disponibles sans modifier le réseau grâce à un cable spécial (BUS)
		REPETEURS 100MB/S
			régénération du signal, gestion des collisions, et isolation des ports défectueux + JABBER (pour paire torsadée et FO)
		SWITCH = Interconnecte deux réseaux physiques différents
			permet de dépasser les limites des hubs


		PONT = Interconnecte deux réseaux physiques différents
			Le pont filtre les trames. Il permet de dépasser la limite des 4 hubs sur un tronçon de réseau car il élimine les informations de colision au delà de lui même.
			Il met à jour une table d'adresses associées aux ports.
			Les tables sont mises à jour au fur et à mesure des connexions des stations sur le réseau.
			Pour une adresse inconnue le pont réalise la retransmission sur autres ports.

		VLAN
			création de réseaux locaux logiques indépendants du ou des réseaux physiques. permet de créer un ensemble logique isolé pour améliorer la sécurité. Le seul moyen pour communiquer entre des machines appartenant à des VLAN différents est alors de passer par un routeur.

		ROUTEUR
			= Cartographie du réseau
			Il travaille sur les adresses logiques et non physiques comme le pont. Il utilise des multi-Protocoles (IP,
			TCP/IP, mais pas NETBEUI) ainsi que des multi-interfaces (Ethernet)

		FIREWALL
			Filtrage des adresses (accès aux machines).
			Filtrages des ports (accès aux services).
			Translation d'adresses (de port aussi).
			Notion de zone démilitarisé (DMZ).

Des mécanismes de conversion des adresses IP en adresses physiques ADRESSAGE IP != ADRESSE PHYSIQUE MAC

		PROTOCOLE ARP
			On associe l'adresse IP logique et l'adresse physique (MAC) de la carte.
			met en oeuvre une table de correspondance adresse IP/adresse MAC qui est mise à jour au moment des besoins.

		ADRESSE IP
		1octet.1octet.1octet.1octet
		2^8.2^8.2^8.2^8

		MAsque de sous réseau
		255 > l'octet désigne le réseau = la rue
		0 > l'octet désigne l'hote = le numero de la machine sur le réseau = la maison
		
		Cette répartition ci-dessus s'appelle la classe d'adresse
		La classe A. Le 1er octet désigne le réseau les trois suivants l'hôte.
		La classe B. les 2 premiers octets désignent le réseau les deux suivants l'hôte.
		La classe C. les trois premiers octets désignent le réseau, le dernier l'hôte.

		En fait l'adresse IP est attribuée à une interface réseau utilisée par une machine. Ainsi une
		machine (c'est le cas des passerelles) peuvent avoir plusieurs interfaces et donc plusieurs adresses IP.

		VALEURS PARTICULIERES SUR LE PREMIER OCTET
		Valeur 0 : Valeur d'acheminement par défaut.
		Valeur 127 : Boucle locale.
		Valeur > 223 : réservée.

		VALEURS PARTICULIERES SUR LA PARTIE HOTE
		La valeur 0 indique le réseau
		La valeur 255 : c'est le broadcast

		BROADCAST
		L'ensemble des bits de la partie HOTE positionnés à 1 indique l'adresse de diffusion. 1111111 = 255
		Cette adresse (encore appelée broadcast) permet de joindre l'ensemble des stations connectées au réseau.
		un message envoyée à l'adresse 195.83.252.[255 est transmis simultanément l'ensemble des stations connectées au réseau 195.83.252.[






CONCEPTION DUN PLAN DADRESSAGE

		DEFINITION description de(s) adresse(s) IP et masque(s) affecté au(x) réseau(x) d'une entreprise.

		TYPES
			ADRESSAGE OFFICIEL
			l'utilisation pour un réseau de l'adresse publique fournit par le NIC.
			ADRESSAGE PRIVATIF
			l'utilisation pour un réseau des adresses publiques existantes sur Internet.
			ADRESSAGE PRIVE RFC 1918
			l'utilisation pour un réseau des plages d'adresses comprises dans les classes A,B,C réservées. Elles sont non routables sur l'Internet.

		
		PARAMETRAGE PLAN ADRESSAGE SOUS LINUX

			CONFIGURATION ADRESSE IP ET MASQUE La configuration définit « l'adresse » du poste et celle du réseau. Par défaut le masque est celui de la classe.

			Activation de l'interface locale (loopback) puis vérification
			# ifconfig lo 127.0.0.1
			# ifconfig lo
			# ping 127.0.0.1

			Configuration de l'interface ethernet puis vérification
			# ifconfig eth0 192.168.2.20
			# ifconfig eth0
			# ping 192.168.2.20

			Ajout d'un alias Un alias permet de faire répondre sur le réseau une interface avec plusieurs adresses IP.
			# ifconfig eth0 :1 192.168.2.21
			Configuration générale de l'interface :
			#ifconfig <interface> [Inet] <@ip> [netmask <masque>] [broadcast <@broadcast>]
			Configuration générale de l'interface : EXEMPLE
			#ifconfig eth0 inet 192.168.2.1 netmask 255.255.255.0 broadcast 192.268.2.255



			PARAMETRAGE DES ROUTES Il permet la communication inter-réseau.

				Une route précise :
				L'adresse de destination (hôte ou un réseau).
				L'adresse de la passerelle (routeur) pour atteindre cette destination.

			Ajout route
			route add {-host|-net} [netmask masque] [gw passerelle] [metric Métrique]
			Retrait route
			route del {-host|-net} Cible [gw passerelle] [metric Métrique]

			Pour la configuration de la route par défaut on effectue les opération suivantes
			Ajout
			# route add -net 0.0.0.0 gw 192.168.2.45
			Vérification des routes Elle affiche les routes définies sur la station.
			# netstat -rn
					Nota : la colonne 'Flags' (drapeau) présente l'état de l'interface :
					U : UP -> Actif.
					D : Dynamic -> interface en routage dynamique.
					G : Gateway -> interface passerelle.



			RESOLUTION DE NOMS 	permet l'utilisation des noms au lieu des adresses IP (alias).
			RESOLUTION LOCALE
			# cat /etc/hosts
			RESOLUTION DISTANTE précise le domaine, l'ordre de recherche des serveurs DNS, et l'ordre de recherche des domaines.
			# cat etc/resolv.conf

					Hosts et DNS peuvent être utilisés simultanément.
					On a la possibilité de préciser si la résolution se fait en recherchant dans le fichier hosts puis dans
					le DNS ou dans le DNS, puis dans le fichier hosts.
					# cat /etc/host.conf
					hosts=local,bind

			Les fichiers systèmes importants pour le démarrage du réseau :
			/etc/rc.d/init.d/network


SOCKET
Une socket est définie par :
Son domaine qui spécifie le format des adresses et les protocoles supportés.
Son type qui définit les propriétés de la communication.
Le protocole de transport. TCP UDP
			















QUESTIONS REPONSES

1/ Le modèle réseau découpées en couche permet une répartition des tâches :

Vrai : on délègue à chaque section du modèle en couche type TCP/IP un partie du travail à faire pour transiter les
information de A vers B. Les couches basses sont proches du matériel, les couches hautes sont proches de l'espace
utilisateur.


2/ Chaque couche du modèle réseau communique par empilement/dépliement avec les couches
inférieures :

Vrai: les données des couches basses emmétrices recoivent les informations des couches hautes emmétrices et
communiques avec les couches respectives sur la cible. De haut en bas les couches gérent des données de plus en plus
unitaires.


3/ La couche « réseau » permet le routage des informations sur les médias de communication :

Vrai : elle permet de gérer les congestions, les différences de médias, et les erreurs de communications.


4/ L'adresse MAC est un concept développé par Apple pour faire communiquer 2 ordinateurs :

Faux : c'est l'adresse physique du périphérique réseaux. Elle est unique sur le réseaux mondial.


5/ Un réseau en étoile est le plus efficace pour faire communiquer de nombreux ordinateurs :

Faux : C'est le moins cher, mais pas le plus rapide car il y a de nombreux problèmes de congestion, de collision, et
d'erreurs de communications. Un réseau en anneau est bien plus efficace, mais il coûte plus cher.


6/ Un WLAN est un réseau ethernet local :

Faux : c'est un réseau sans fils local (WIFI). C'est le VLAN le réseau ethernet local.


7/ Sur un réseau local ethernet on doit limiter le nombre de répéteur à 4 éléments :

Vrai : sinon on multiplie le nombre de collisions sur tout le réseaux. Il y aura plus de bruit que de signal utile. Pour
étendre un réseau local à plus de 4 répéteurs, il faut utiliser des ponts filtrants.


8/ Le réseau ethernet utilise une liaison série bidirectionnelle haute vitesse :

Vrai : c'est de la paire différentielle torsadée utilisée pour sérialisé les données en emission et en réception.


9/ La catégorie du câble ethernet définie la vitesse de communication sur le réseau :

Vrai. Plus la catégorie et haute plus la vitesse de communication et la distance entre 2 répéteurs sont élevées.


10/ Le routage dynamique définie en dur le chemin à prendre entre les sous réseaux :

Faux : le routage est dynamique. Si un élément est défaillant, on est capable de rebrousser chemin et d'utiliser une autre
route pour faire cheminer les informations.


11/ Un pare feu permet de se protéger des erreurs de communications :

Faux : il protège un réseau local des intrusions ou des attaques provenant de l'extérieur.


12/ TCP/IP est une version simplifié du modèle OSI :

Vrai : certaines couches du modèle OSI on été factorisées pour permet des implémentations plus faciles et rapides.


13/ UDP est un protocole IP sans gestion de communication :

Vrai : les données sont envoyées sans contrôle de flux et d'erreur. Il est beaucoup plus rapide que TCP mais il est aussi
moins fiable.


14/ Une Socket est un terme désignant un conteneur pour l'envoie de données par TCP/IP :

Vrai : ce conteneur encapsule avec les données, des informations sur l'émetteur, le destinataire et diverses méta-données
telle que une estampille temporelle.


15/ 2 numéros de port sont nécessaires pour définir une socket réseau :

Vrai : le numéro de port de l'émetteur et le numéro de port du destinataire, en plus de leurs adresses IP respectives.


16/ Sur un VLAN on utilise toujours des adresses IPV6 :

Faux : uniquement sur les WAN (réseau mondial internet). Sur les VLAN, IPV4 est amplement suffisant.


17/ Une adresse IPV4 est caractérisée par 4 octets :

Vrai : cela permet 232 combinaisons possibles avec certaines plages d'adresses réservés tel que pour le masquage ou le
broadcast.


18/ Une adresse IPV4 est divisée en 2 parties distinctes :

Vrai : une partie pour définir l'adresse statique du réseau (la partie haute), et une pour définir les adresses des machines
sur le réseau (partie basse).


19/ Les adresses IPV4 sont réparties 2 classes :

Faux : Il y a 3 classes de bases A, B, et C, une classe D pour le multicast, et une classe E réservée. La classe C est la
plus utilisée pour les VLAN.


20/ Le « localhost » correspond toujours à l'adresse IPV4 127.0.0.1 :

Vrai : c'est la boucle locale qui permet d'utiliser la couche réseau pour des communications inter-processus sur la
machine.

