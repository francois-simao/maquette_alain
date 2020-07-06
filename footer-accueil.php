        <footer>

            <div class="images-footer">
                <div class="footer_left">
                    <?php if(is_active_sidebar('footer_left')): ?> <!--on vérifie si la sidebar qui possède l'identifiant 'widgetized-footer' est active-->
                    <?php dynamic_sidebar('footer_left'); ?> <!-- si la sidebar 'widgetized-footer' est active, on appelle la fonction 
                    'widgetized-footer' -->
                    <?php else: ?>
                    <p>revois ta fonction :) </p>
                    <?php endif; ?>
                    <h1><span class="what">What</span> ABOUT ME ...</h1>
                    <p>Hello my name is Alain and I am a French designer.</br>
                        I am passionate about Pepakura, cinema and video games. Let me show you my achievements</p>
                </div>

                <div class="footer_right">
                    <?php if (have_posts()): ?>
                    <div class="slides_footer">           
                        <?php
                        $query = new WP_query(array('post_type' => 'post', 'category_name' => 'footer_right', 'posts_per_page' => 4, 'order'=> 'ASC', 'orderby' => 'date' ));
                        while($query->have_posts()):$query->the_post(); global $post;
                        ?>
                        <div class="slide_footer">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>    
                </div>
            </div>

            <div class="container_newletter">
                <div class="newletter">
                    <p>SIGN UP OUR NEWLETTER</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_enveloppe.jpg" height="16px" width="16px" alt="logo_instagram">
                </div>
            </div>

            <div class="container_social_icons_footer">
                <div class="social_icons_footer">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_facebook.jpg"  height="16px" width="16px" alt="logo_facebook">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_instagram.png" height="16px" width="16px" alt="logo_instagram">  
                </div>
            </div>

               







        </footer>
        <!-- <script src="<?php #echo esc_url(get_template_directory_uri()); ?> /adressedenotrefichier.js"></script> --> <!-- appel d'un script,
        autre methode que wp_enqueue-->
        <?php wp_footer(); ?>
    </body>
</html>