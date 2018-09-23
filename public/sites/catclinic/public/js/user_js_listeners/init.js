//Fonction de déclenchement des listeners standard
function Listener(elem, event, fnct) {
    if (elem) {
        if (elem.addEventListener) {
            elem.addEventListener(event, fnct, false);
        } else { //IE
            elem.attachEvent('on' + event, fnct);
        }
        // Si l'événement est un click on change le curseur de souris
        if ('click' == event) {
            elem.style.cursor = 'pointer';
        }
    }
    return;
}

//caroussel FUNCTIONS START (homepage)
var picture  = document.getElementById('photo'); //Instancier par l'id
Listener(picture, 'mouseover', diaporama); //Ecouter

var image_visible = 'homePageCaroussel01.jpg';

function diaporama(){
    changeImage();
    return;
}

function changeImage(){
    var images = Array('homePageCaroussel01.jpg', 'homePageCaroussel02.jpg', 'homePageCaroussel03.jpg', 'homePageCaroussel04.jpg');
    var nb_images = images.length; //4
    var picture  = document.getElementById('photo');
    var description = document.getElementById('descript');

    //Boucle sur les images
    for (var i = 0; i < nb_images; ++i){
        if (images[i] == image_visible){
            //Condition ternaire qui reafecte image_visible avec l'image suivante
            image_visible = (images[i+1] != undefined) ? images[i+1] : images[0];

            picture.setAttribute('title', image_visible);

            if(image_visible == images[0]){
                picture.setAttribute('alt', 'photo montrant un chat');
                description.innerHTML = 'Prendre soin de ses petits compagnons';
            } else if(image_visible == images[1]){
                picture.setAttribute('alt', 'photo montrant un papillon');
                description.innerHTML = 'Un espace de sérénité';
            } else if(image_visible == images[2]){
                picture.setAttribute('alt', 'photo montrant un tigre');
                description.innerHTML = 'Nos amis les félins';
            } else if(image_visible == images[3]){
                picture.setAttribute('alt', 'photo montrant bada la mascotte de catclinic');
                description.innerHTML = '...and bada is in the place';
            }

            picture.setAttribute('src', '../img/' + image_visible);

            break;
        }
    }

    //Timer du changement d'image
    setTimeout(changeImage, 16000);

    return;
}
//Caroussel FUNCTIONS END



//Menu ajax FUNCTIONS START
//Ecouteurs sur les éléments button
//TODO attention ne placer des écouteurs que sur les liens qui vont aller chercher une page html -> a discuter à l'oral
//TODO supprimer le shadowing sur la manipulation des objets en version supérieure (refactoring)
var click_button_homeReturn = document.getElementById('button_homeReturn');
Listener(click_button_homeReturn, 'click', viewHomeReturn)

var click_button_adress = document.getElementById('button_adress');
Listener(click_button_adress, 'click', viewAdress)

var click_button_appointement = document.getElementById('button_appo');
Listener(click_button_appointement, 'click', viewAppointment)

var click_button_contact = document.getElementById('button_contact');
Listener(click_button_contact, 'click', viewFormContact)


function viewHomeReturn()
{
    changeContent('content', '../../public/controllers/index.php', 'EX=homeReturn');
    return;

} // viewSelect()

function viewAdress()
{
    changeContent('content', '../../public/controllers/index.php', 'EX=adre');
    return;

} // viewInput()

function viewAppointment()
{
    changeContent('content', '../../public/controllers/index.php', 'EX=rdva');
    return;

} // viewRadio()

function viewFormContact()
{
    changeContent('content', '../../public/controllers/index.php', 'EX=forc');
    return;

} // viewContact()