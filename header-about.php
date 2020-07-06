<!DOCTYPE html>
<html <?php language_attributes(); ?> >  
<head>
    <meta charset="<?php bloginfo('charset'); ?>">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="description" content="balise meta a modifier"/>
    <link href="//db.onlinewebfonts.com/c/7af32ec3d600b58e6091d4d42ef19545?family=French+Script+MT" rel="stylesheet" type="text/css"/>
   
    <?php wp_head(); ?> 

</head>
<body>
    <header class="header_about">
        <div class="header_about_left">
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
                $image_id = get_field( 'image_header_about' ); // On récupère l'ID de l'image du champ ACF nommé image_header_about
	            if( $image_id ) {	
		        echo wp_get_attachment_image( $image_id, 'full' ); // on affiche l'image de la variable $image_id en taille full
                } ?>
            </div>
            <button type="submit" class="button"><a href="<?php echo get_field('lien_de_contact'); ?>" target="blank" class="lien_contact">CONTACT ME</a></button>
            <button type="submit" class="contact"><img src="<?php echo get_template_directory_uri(); ?>/images/contact.png" alt="contact"></button>
        </div>

        <div class="header_about_right">
            <span class="h">H</span>
            <h1>ello my name is Alain and I am a French designer</h1>
            <div><?php the_field( 'header_about_presentation' ); ?>
            </div>
            <div class="square_dream">
            <p><?php the_field( 'dream' ); ?></p>
            </div>
        </div>
        
        <div class="square">
        </div>
    </header>