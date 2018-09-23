//Constante de debuggage
var DEBUG_AJAX = false;

//getXhr -> création d'un objet de connexion
function getXhr() {
    var xhr;
    if (window.XMLHttpRequest) // Firefox et autres
    {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) // Internet Explorer
    {
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP"); // IE version > 5
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else // XMLHttpRequest non supporté par le navigateur
    {
        alert("Votre navigateur ne supporte pas les objets XMLHttpRequest !");
        xhr = false;
    }
    return xhr;
} // getXhr ()

//changeContent -> modification du contenu d'un élément
function changeContent(id, url, param, callback) {
    // Récupère l'élément cible dont l'identifiant vaut id
    var c = document.getElementById(id);
    // Met une image animée afin de montrer le chargement en cours du contenu
    c.innerHTML = '<img src="../Img/loading.gif" alt="Chargement" />';
    //Récupère la connexion au serveur http
    var xhr = getXhr();
    // Ouvre la connexion en mode asynchrone avec le serveur http avec comme adresse url
    xhr.open('POST', url, true);
    // Envoie des entêtes pour l'encodage
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //Envoie les paramètres param (même vide)
    xhr.send(param);
    // Exécution en mode asynchrone de la fonction anonyme dès que l'on obtient une réponse du serveur http
    xhr.onreadystatechange = function() {
        // Test si le serveur a tout reçu (200) et que le serveur ait fini (4)
        if (xhr.status == 200 && xhr.readyState == 4) {
            // Modifie l'élément ayant pour identificateur id suivant le programme url
            c.innerHTML = xhr.responseText;

            // Debuggage
            if (DEBUG_AJAX) alert(xhr.responseText);

            //Test s'il y a une callback
            if (callback != null) {
                // Exécution du script contenu dans la callback
                window.eval(callback);
            }

            // Si on a du javascript dans le nouveau contenu
            // on identifie les scripts et on force l'éxécution avec eval()
            var allscript = c.getElementsByTagName('script');
            for (var i = 0; i < allscript.length; ++i) {
                // Exécution du script
                window.eval(allscript[i].text);
            }
        }
    };
    return;
} // changeContent(id, url, param, callback)

//actionForm() -> soumission d'un formulaire
function actionForm(url, frm)
{
    // Récupère la connexion au serveur http
    var xhr = getXhr ();

    //Ouvre la connexion synchrone avec le serveur http avec comme adresse url
    xhr.open('POST', url, false);

    // Récupère les données du formulaire sous la forme clef/valeur
    var data = new FormData(frm);

    // Envoie des données du formulaire
    xhr.send(data);

    // Debuggage
    if (DEBUG_AJAX) alert(xhr.responseText);

    //La réponse  au format json devient un objet javascript
    return JSON.parse(xhr.responseText);

} // actionForm(url, frm)

//actionParam -> déclenche un programme CGI avec ses paramètres
function actionParam(url, param)
{
    // Récupère la connexion au serveur http
    var xhr = getXhr ();
    //Ouvre la connexion en mode synchrone avec le serveur http avec l'adresse url
    xhr.open('POST', url, false);
    // Envoie des entêtes pour l'encodage
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    //Envoie les paramètres param
    xhr.send(param);
    // Debuggage
    if (DEBUG_AJAX) alert(xhr.responseText);
    // La réponse au format json devient un objet javascript
    return JSON.parse(xhr.responseText);
} // actionParam(url, param)



