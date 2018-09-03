
/////////////////////////////
RESEAU COURS
/////////////////////////////

MODELE OSI
	COUCHES
Couche 7	Applicative	C'est à ce niveau que sont les logiciels: navigateur, logiciel d'email, FTP, chat...
Couche 6	Présentation	Elle est en charge de la représentation des données (de telle sorte qu'elle soit indépendante du type de microprocesseur ou du système d'exploitation par exemple) et - éventuellement - du chiffrement.
Couche 5	Session	En charge d'établir et maintenir des sessions (c'est à dire débuter le dialogue entre 2 machines: vérifier que l'autre machine est prête à communiquer, s'identifier, etc.)
Couche 4	Transport	En charge de la liaison d'un bout à l'autre. S'occupe de la fragmentation des données en petits paquets et vérifie éventuellement qu'elles ont été transmises correctement.
Couche 3	Réseau	En charge du transport, de l'adressage et du routage des paquets.
Couche 2	Liaison de données	En charge d'encoder (ou moduler) les données pour qu'elles soient transportables par la couche physique, et fournit également la détection d'erreur de transmission et la synchronisation.
Couche 1	Physique	C'est le support de transmissions lui-même: un fil de cuivre, une fibre optique, les ondes hertziennes...

ANALOGIE OSI(MNÉMOTECHNIQUE)

> 7 utilisation_ordinateur 
> 6 emballage_packetage_donnée 
> 5 pret_a_parler_et_ecouter?
> 4 couper_emballage_petits_paquets
> 3 livraison_petits_paquets_+_choix_de_route
> 2 adapte_forme_packetage_a_la_route_+_detection_qui_quand_comment
> 1 la_route



PROTOCOLE
>Ensembles de règles d'échanges pour communiquer > Défini à travers des modèles (TCP/IP, OSI...) >>> Realise un SERVICE
SERVICE
>description abstraite de fonctionnalités à l'aide de primitives (commandes ou événements) telles que demande de connexion ou réception de données.
INTERFACE
>Moyen concret d'utiliser le service = point d'accès au service (ensemble de fonctions de bibliothèque ou appel système)

SERVICE ACCES POINT
>code hexadécimal sur 2 octets contenu dans les trames Ethernet, entre les champs d'adresse MAC et le datagramme.
ex: 0x0800 : IPv4  0x86DD : IPv6  0x0806 : ARP  0x8035 : RARP...



FONCTION DE LA COUCHE 7 APPLICATIVE
	>Transfert de fichiers
		NFS (système de fichier réseau) partager des données principalement entre systèmes de type UNIX
		FTP partage de fichiers sur un réseau TCP/IP. 
		FTPS variante de FTP avec SSL (maintenant appelé TLS)
	>Communiquer à distance
		Telnet communiquer avec un serveur distant en échangeant des lignes de texte et en recevant des réponses également sous forme de texte. Texte échangé en clair (danger), désormais on utilise SSH
	>L'Exécution de commandes à distance :
		Remote Command
	>Messagerie Electronique
		SMTP transférer le courrier électronique (courriel) vers les serveurs de messagerie électronique.
		POP télécharge les messages et les retire du serveur. Les e-mails ne seront plus disponibles, ni par webmail ni par un programme de messagerie. NE PAS UTILISER
		IMAP permet à plusieurs clients d'accéder à la même boîte aux lettres tout en conservant les e-mails disponibles sur le serveur pour un accès ultérieur par le biais du webmail.
	>Annuaire
		DNS service permettant de traduire un nom de domaine en informations de plusieurs types qui y sont associées, notamment en adresses IP de la machine portant ce nom.
		LDAP protocole permettant l'interrogation et la modification des services d'annuaire. Ce protocole repose sur TCP/IP.

FONCTION DE LA COUCHE 6 PRESENTATION
		ASN1-8824 Langage de représentation des données
		>Une notation formelle.
		>La structuration de l'information est différente du langage de programmation.
		>Spécification des données indépendamment des langages informatiques et de leur représentation physique.
		>Conçu pour toutes sorte d'applications communicantes.

FONCTION DE LA COUCHE 5 SESSION
		Ouverture d'une communication
		Communication (échange de données)
		Fermeture de connexion
		Synchronisation structurer la communication entre l'émetteur et le récepteur en jalonnant la communication avec des points de synchronisation.

FONCTION DE LA COUCHE 4 TRANSPORT
		l'acheminement de bout en bout de l'information entre l'émetteur et le récepteur.
		PROTOCOLE UDP Protocole de communication sans connexion. Il est non fiable car il n'y a pas de moyen de savoir si les données ont bien été émises.
		PROTOCOLE TCP Il fonctionne en mode connecté. // La fiabilité : utilisation d'accusé de réception. // La gestion du contrôle de flux.

FONCTION DE LA COUCHE 3 RESEAU
		déterminer le chemin optimal qui même de l'émetteur au récepteur. Il y a deux modes possibles :
		Le mode connecté. = circuit virtuel chemin unique
		Le mode non connecté. = datagrammes (paquets) plein de routes
		
		Routage = choix de la route
		RIP (protocole) = algorithme de détermination des routes décentralisé + communique la métrique
		OSPF (protocole) = attribue un coût à chaque liaison (appelée lien dans le jargon OSPF) afin de privilégier l'élection de certaines routes.

		Conversion des adresses logiques en adresse physique	pourquoi Problème du changement d'adresse physique d'une machine.

FONCTION DE LA COUCHE 2 LIAISON
		Elle permet la transmission correcte bits à bits de l'information. Elle est responsable de l'acheminement
		sans erreur de blocs d'info sur le support de transmission (média). Elle offre des mécanismes de
		détection et de correction des erreurs.

		SOUS COUCHE MAC : gérer les accès au réseau. Elle identifie qui émet, comment et quand. Cette fonction
		est nécessaire pour définir des critères pour accorder les temps de parole.

FONCTION DE LA COUCHE 1 PHYSIQUE
		connexion physique d'un équipement sur le réseau ainsi qu'à la
		constitution des signaux électriques. Elle définit :
			La connectique tel que le raccordement de l'équipement sur le média.
			La forme des signaux et le codage utilisé.
			Le média lui-même.

		TOPOLOGIE + TRANSMISSION DU SIGNAL + MEDIA


		2 TYPE de liaisons au niveau des cables possibles
		LIAISONS PARRALELLES
		les bits d'un même caractère sont transmis en même temps sur plusieurs fils différents.
		La liaison parallèle est plus rapide, plus chère, plus encombrante (plus de fils), et très mauvaise sur de longues distance

		LIAISONS SERIE
		Sur une liaison série, ils sont transmis les uns à la suite des autres. utilisée pour les distances longues


		transmission synchrone ou asynchrone de données (utilisation de l'horloge)
		ASYNCHRONE      START 010010101001001 STOP
			Les signaux sont transmis n'importe quand.
			Pas d'horloge entre la source et la destination.
			Les bits Start et Stop encadrent le caractère transmis.
		
		SYNCHRONE		BATTEMENT 0 BATTEMENT 1 BATTEMENT 1 BATTEMENT 0...
			Un fil particulier transporte le signal d'horloge.
			Les bits des différents caractères sont transmis directement les uns à la suite des autres à chaque période d'horloge.


		3 MODES de liaisons
		Mode simplex :
			La transmission ne peut se faire que de A vers B.
			Exemple : radio, télévision.
		Mode semi-duplex :
			La transmission peut se faire dans les deux sens, mais pas simultanément.
			Exemple : CB, talkie-walkie.
		Mode Duplex intégral :
			La transmission se fait dans les deux sens simultanément.
			Exemple : le téléphone.


		TOPOLOGIE
			BUS		x--,---'--,-x
			ETOILE	*
			ANNEAU	O
