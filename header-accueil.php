<!DOCTYPE html>
<html <?php language_attributes(); ?> >  <!-- récupère le langage de l'interface wordpress dans l'onglet "réglages" -> "général"-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">  <!-- permet de définir l’encodage du site. Par défaut c’est UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- viewport à la taille initiale (scale=1)-->
    <meta name="description" content="balise meta a modifier"/>
    <!-- <title><?php #wp_title(); ?></title> --> <!-- ajout du titre administrable mais c'est une méthode 2 A CONFIRMER si ca marche. La
    méthode 1 est gérée automatiquement via une fonctionnalité ajoutée dans le fichier function.php-->
    <!-- <link href="<?php #bloginfo('stylesheet_url'); ?>" rel="stylesheet"> --> <!--ajout de la feuille css -> autre methode que wp_enqueue
    mais du coup ca n'appelle pas tous les script interne à wordpress comme avec wp_enqueue-->
    <?php wp_head(); ?>   <!-- appel du fichier style.css déclaré dans function.php dans la fonction appel_des_scripts et du fichier js -->

</head>
<body>
    <header>
<!-- DEBUT CODE POUR MENU BURGER -->
        <div class="menu-burger">
            <div class="toggle_btn">
                <span>
                </span>   
            </div>

            <!--<div class="menu nav">
                <a href="/">ACCUEIL</a>-->     <!-- le slash symbolise la racine -->
            <!--<a href="#">REALISATION</a>
                <a href="#">ABOUT</a>
            </div>-->

            <?php wp_nav_menu(array(                /*appel d'un menu */
            'menu'            => 'top-menu',
            'theme_location'  => 'primary',    /*appel du menu de navigation dont l'identifiant (id) est "primary" dans function.php*/
            'depth'           =>  2,           /*niveau de profondeur -> menu, sous-menu ect ...*/
            'container'       =>  'div',
            'container_class' =>  'menu nav',
            // 'container_id'    =>  'navbar',
            // 'menu_class'      =>  'navbar-nav',  /*class css nommée "navbar-nav", fonctionne si on a un menu 'ul' -> ne s'utilise pas dans ce cas*/
            )); ?>
        </div>
<!-- FIN CODE POUR MENU BURGER -->

        <div class="carre">
        <img class="hm" src="<?php echo get_template_directory_uri(); ?>/images/helmet.png" alt="Logo">
        </div>
    
<!-- DEBUT CODE POUR SLIDER -->
        <div class="slider">
            <?php if (have_posts()): ?>
            <div class="slides">           
                <?php
                $query = new WP_query(array('post_type' => 'post', 'category_name' => 'slider', 'posts_per_page' => 4, 'order'=> 'ASC', 'orderby' => 'date' ));
                while($query->have_posts()):$query->the_post(); global $post;
                ?>
                <div class="slide">
                    <?php the_post_thumbnail( array( 490, 800 ) ); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>    
        </div>

        <div class="slideshow">
            <div class="slideshow_list">
                <div class="slideshow1">01</div>
                <div class="slideshow1">02</div>
                <div class="slideshow1">03</div>
                <div class="slideshow1">04</div>
            </div>
            <div class="trait"><span class="slide-trait"></span></div>
        </div>
<!-- FIN CODE POUR SLIDER -->

        <div class="social_network">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_instagram.png" height="16px" width="16px" alt="logo_instagram">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_facebook.jpg"  height="16px" width="16px" alt="logo_facebook">
        </div>

        <div class="rotation">
            <p>0<span class="rotation-barre">2</span></p>
        </div>

        <div class="kylo">
            <p>Kylo Re<span class="n">n</span> Set</p>
        </div>
        
        <button type="submit" class="button">SEE THE PROJECT</button>
        <button type="submit" class="play"><img src="<?php echo get_template_directory_uri(); ?>/images/play.png" alt="play"></button>

    </header>
