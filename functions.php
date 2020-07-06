<?php

function appel_des_scripts() {
  /*wp_enqueue_style('initialisation_boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');*/ /*initialisation
  de boostrap en copiant la ligne de CSS sur le site boostrap et en la collant dans le chemin de la fonction wp_enqueue_style*/
  wp_enqueue_style( 'style', get_stylesheet_uri() );   /*appel du fichier css "style"*/
  wp_enqueue_script( 'script', get_template_directory_uri() . '/script.js', array ('jquery'), null, true); /*appel du fichier js "script", 
  get_template_directory_ury signifie que le dossier se situe dans notre thème wordpress suivi du chemin du sous dossier, on
  déclare 'jquery' comme dépendance car c'est une fonction native de wordpress qui en plus de charger notre fichier js va charger la librairie
  jquery, "true" veut dire oui on veut que le fichier soit lu dans le footer donc ne pas oublier d'appeler le footer dans page.php avec 
  <?php wp_footer(); ?> */
}
add_action( 'wp_enqueue_scripts', 'appel_des_scripts' );   /*appel de la fonction "appel_des_script"*/



/*AJOUT D UNE ZONE QUI RECOIT DES COMMANDES POUR AJOUTER DES NOUVELLES FONCTIONNALITES A NOTRE THEME*/
function ajout_fonctionnalites(){
  add_theme_support('post-thumbnails');  /*ajout de la fonctionnalité image à la une dans l'onglet "article" de l'interface wordpress*/
  remove_action('wp_head', 'wp_generator'); /*supprime le générateur qui affiche le numéro de version de worpress dans la balise <head>
  afin de ne pas donner d'indication aux hacker*/
  remove_filter('the content', 'wptexturize'); /*modifie les guillemets à la francaise afin qu'on ait bien "" au lieu de << quand on affiche
  le contenu d'un article  -> ne fonctionne pas avec le paramètre the_excerpt qui affiche uniquement le début d'un article*/
  add_theme_support('title-tag'); /*récupère le titre de l'interface worpress dans l'onglet "réglages" -> "général" -> "titre du site"*/
  register_nav_menus(array('primary' => 'principal')); /*activation de la fonction memu dans l'interface de worpress, ('primary: identifiant
  du menu qui nous servira à l'appeler où l'on veut, 'principal':libellé du menu tel qu'on le verra apparaître dans l'interface wp-admin dans
  la gestion des menus). Si on désire plusieurs menus on peut mettre une virgule après 'principal' et en ajouter un autre à la suite*/
}
add_action('after_setup_theme', 'ajout_fonctionnalites');


/*ACTIVATION DE LA FONCTION WIDGET */
function initialisation_widgets() {      /*déclaration de la fonction appelée "initialisation_widgets" */
    register_sidebar( array(
        'name'          => 'footer widget zone left',  /*nom affiché dans le tableau de bord de wordpress dans la zone des widgets*/
        'description'   => 'widgets affichés dans le footer', /* description facultative qui sera affichée dans notre zone déclarée dans le tableau de bord de wordpress dans la zone des widgets*/
        'id'            => 'footer_left', /* identifiant qui va caractériser cette zone de widget dans notre code quand on va la déclarer dans notre template*/
        'before_widget' => '', /* code html qui va encadrer chacun de nos widgets AVANT et on peut y ajouter une classe et/ou un id*/
        'after_widget'  => '', /* code html qui va encadrer chacun de nos widgets APRES, donc ferme la balise (</div>, </li> etc…)*/
        'before_title'  => '<h1>', /* code html qui va encadrer chacun des titres de nos widgets AVANT et on peut y ajouter une classe et/ou un id*/
        'after_title'   => '</h1>', /* code html qui va encadrer chacun des titres de nos widgets APRES, donc ferme la balise du titre (</h2>, </h3>, </h4> etc…)*/
    ) );
}
add_action( 'widgets_init', 'initialisation_widgets' );  /* ajout de la fonction native "widgets_init" que l'on pourra dorénavant retrouver
dans l'interface de wordpress sous le nom "widgets", appelle de la fonction "initialisation_widgets" */