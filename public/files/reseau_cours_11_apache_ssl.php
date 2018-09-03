
/////////////////////////////
APACHE ET SSL
/////////////////////////////


Le protocole HTTP n'est pas conçu pour apporter une quelconque sécurité. Les échanges
d'informations se font en clair dans les paquets qui circulent sur le réseau.

La solution pour le traitement de ce type d'échange est le recours au chiffrement des transactions.

Le module d'Apache permettant d'obtenir ce résultat s'appelle mod_ssl.




LE CHIFFREMENT ASYMETRIQUE A DEUX CLEFS

	Tout repose sur l'existence d'algorithmes de cryptage à deux clefs. Une clef est simplement un fichier
	comportant une suite d'octets. Voici un exemple de clef
	
	Nous appellerons une de ces deux clefs, clef A et l'autre clef B.
	
	Le principe est le suivant, un message en clair est crypté à l'aide de l'algorithme et l'une des deux clefs.
	Prenons l'exemple d'un cryptage à l'aide de la clef A.
	
	IMPORTANT
	En possession de la clef A et du message codé avec cette clef A, il est impossible dans un temps
	raisonnable de revenir au message en clair d'origine.
	Le décodage du message ne peut se faire qu'avec la deuxième clef (ici, la clef B).
	
	
	Ce processus fonctionne aussi dans l'autre sens. Si on code avec la clef B, on ne peut décoder qu'avec
	la clef A.
	
	Ce mécanisme nous donne une solution pour traiter les problèmes de confidentialité. Si un client se
	connecte à un serveur web utilisant SSL, celui-ci lui renvoie une des deux clefs.
	Cette clef, envoyée sur le réseau est appelée clef publique car n'importe quel poste placé sur le
	réseau peut l'intercepter.
	
	Le serveur web ne diffuse pas la deuxième clef. Pour cette raison, elle sera baptisée Clef privée.
	Pour la suite des échanges, le client utilise la clef publique pour crypter les données envoyées au
	serveur.
	
	Si une tierce partie intercepte un message envoyé par le client, il ne pourra pas le décrypter car seul le
	serveur dispose de la clef privée.




LES CERTIFICATS ELECTRONIQUES

	Est on certain de l'identité et de la confiance que l'on doit attribuer au serveur web sécurisé par SSL ?
	Le certificat est une réponse à cette question. Il est censé attester de l'identité de celui qui émet la clef
	publique. Un certificat doit donc être émis par un serveur qui souhaite être crédible.

	En fait, par le principe de la signature d'un tiers, on reporte le problème de la confiance sur ce tiers. ou
	émetteurs de certificats (Certificate Authority, CA en anglais).

	Pour résumer, si vous vous connectez sur un site SSL dont le certificat est signé par l'un des
	organismes déclaré sur votre navigateur Internet, vous n'aurez pas d'alerte de sécurité car le site sera
	crédité d'un certain niveau de confiance.

		La procédure à suivre est la suivante : on génère la paire de clefs puis on s'adresse à l'organisme
		certificateur en lui envoyant les documents listés ci-dessous.

			- une demande,
			- la clef publique,
			- les justificatifs demandés (tel que l'inscription au registre du commerce, la preuve de la
			possession du nom de domaine...),
			- le forfait à payer (comptez 200€ par an au minimum).



EN PRATIQUE

1. Sur votre distribution Linux, OpenSSL est probablement déjà installé. Vérifier aussi que le paquetage
apache-mod_ssl est bien présent. Sinon
[TERMINAL] [commande_installation_selon_la_distribution] openssl

2. Puis contrôle du fichier /etc/httpd/conf/module.d/00_base.conf
la ligne suivante ne doit pas être commentée (#)
LoadModule ssl_module modules/mod_ssl.so

3. Contrôler les clés et certificats
Les clefs et certificats sont dans le répertoire /etc/ssl/certs.

4. Activer SSL dans httpd.conf avec SSLEngine (dans le conteneur du Directory ou pointe documentroot)
[DIRECTIVE] SSLEngine on




