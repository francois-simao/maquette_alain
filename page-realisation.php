<?php
/*
Template Name: Réalisation
*/
?>

<?php if(is_page(22)) { get_header('realisation'); } else { get_header(); } ?>


<div class="container-tab">
    <div class="tab-realisation">
        <p><span class="divers">DIVERS<span></p>
        <p><span class="all">ALL<span></p>
        <p><span class="marvel">MARVEL<span></p>
        <p><span class="star_wars">STAR WARS<span></p>
    </div>
</div>

    <?php if (have_posts()): ?>
        <div class='boucle-realisation'>           
            <?php
                $query = new WP_query(array('post_type' => 'post', 'category_name' => 'accueil', 'posts_per_page' => 8, 'order'=> 'ASC', 'orderby' => 'date' ));
                while($query->have_posts()):$query->the_post(); global $post;

            ?>
            <div class="mise_en_page_boucle">
                <?php the_post_thumbnail( array( 490, 420 ) ); ?></a>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
            
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>    
    <?php wp_reset_postdata(); ?> 

    </div>




<?php if(is_page(22)) { get_footer('realisation'); } else { get_footer(); } ?>