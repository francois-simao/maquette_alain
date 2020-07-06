<!DOCTYPE html>
<html <?php language_attributes(); ?> >  
<head>
    <meta charset="<?php bloginfo('charset'); ?>">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="description" content="balise meta a modifier"/>

    <?php wp_head(); ?>   

</head>
<body>
    <header class="header_realisation">
<!-- DEBUT CODE POUR MENU BURGER -->
        <div class="menu-burger">
            <div class="toggle_btn">
                <span>
                </span>   
            </div>

            <?php wp_nav_menu(array(               
            'menu'            => 'top-menu',
            'theme_location'  => 'primary',    
            'depth'           =>  2,           
            'container'       =>  'div',
            'container_class' =>  'menu nav',
            )); ?>
        </div>
<!-- FIN CODE POUR MENU BURGER -->           
        <div class="image_header_about">
            <?php
            $image_id = get_field( 'image_header_realisation' ); // On récupère l'ID de l'image du champ ACF nommé image_header_about
	        if( $image_id ) {	
		    echo wp_get_attachment_image( $image_id, 'full' ); // on affiche l'image de la variable $image_id en taille full
            } ?>
        </div>

        <div class="social_network_realisation">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_instagram.png" height="16px" width="16px" alt="logo_instagram">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_facebook.jpg"  height="16px" width="16px" alt="logo_facebook">
        </div>

        <div class="barre_realisation">        
        </div>
        <h1>My realisations</h1>

    </header>