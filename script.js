jQuery(document).ready(function($){

// on utilise le signe "$" pour utiliser jquery mais comme dans wordpress il y a d'autres librairies qui utilisent ce signe, toutes les lignes
// de code en jquery devront être taper entre ces accolades afin de ne pas créer de conflit, c'est une norme wordpress
// $("a").css('color', "red");  /*ligne de déboguage*/

});


//fonction pour menu burger
var btn = document.querySelector('.toggle_btn');
var nav = document.querySelector('.nav');

btn.addEventListener("click",change);

function change(){
    nav.classList.toggle('nav_open');
}