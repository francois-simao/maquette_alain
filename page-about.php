<?php
/*
Template Name: About
*/
?>

<?php if(is_page(19)) { get_header('about'); } else { get_header(); } ?>



<div class="container-tab">
    <div class="tab-about">
        <p><span class="divers">DIVERS<span></p>
        <p><span class="all">ALL<span></p>
        <p><span class="marvel">MARVEL<span></p>
        <p><span class="star_wars">STAR WARS<span></p>
    </div>
</div>



<section>
    <?php if (have_posts()): ?>
        <div class='boucle-about'>           
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

    <div class="button-explore-about"><button type="submit" >EXPLORE MORE</button>
    </div>
</section>













<?php if(is_page(19)) { get_footer('about'); } else { get_footer(); } ?>