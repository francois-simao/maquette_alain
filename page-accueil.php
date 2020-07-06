<?php
/*
Template Name: Accueil
*/
?>

<?php if(is_page(17)) { get_header('accueil'); } else { get_header(); } ?> <!--cette page, dont le numéro est 17 dans l'URL
de l'interface wordpress, appelle le header du fichier header-accueil.php -> on n'écrit pas le header mais juste le "accueil"-->
<?php #get_template_part('header','accueil') ?> <!-- appelle du fichier header-accueil.php. Ideal quand on a un seul header -->



<div class="container-tab">
    <div class="tab">
        <p><span class="divers">DIVERS<span></p>
        <p><span class="all">ALL<span></p>
        <p><span class="marvel">MARVEL<span></p>
        <p><span class="star_wars">STAR WARS<span></p>
    </div>
</div>





<!-- ////////// CETTE BOUCLE EST JUSTE MAIS ELLE AFFICHE LES PAGES CAR ON SE TROUVE DANS LE FICHIER PAGE.PHP ET ON A DEFINI UNE PAGE STATIQUE
COMME ACCUEIL DANS L'ONGLET "REGLAGE" -> "LECTURE". ELLE AFFICHERAIT LES ARTICLES QUE SI ON L'AVAIT MISE DANS LE FIHCIER INDEX.PHP
ET QU'ON AVAIT DEFINI "LES DERNIERS ARTICLES" EN PAGE D'ACCUEIL DANS L'ONGLET "REGLAGE" -> "LECTURE" ////////// -->
<!-- <?php if (have_posts()):     /*condition -> si il y a un post*/
    while(have_posts()):
        the_post();              /*invoque l'itération de l'article en cours*/
        the_title(); echo'<br>';           /*affiche le titre de l'article en cours*/
        the_content();           /*affiche le contenu de l'article*/
        the_date();             /*affiche la date de l'article*/
    endwhile;
    else:
    echo'y a pas de résultat';
endif;  /*fin de la condition*/
//die();       /*pour tester notre code, stoppe toutes fonctions*/
?> -->



<!-- ////////// BOUCLE TROUVEE SUR UN FORUM ET UN PEU ADAPTEE QUI AFFICHE LES ARTICLES SUR UN FICHIER PAGE.PHP QUE L'ON A DEFINI COMME PAGE
STATIQUE EN PAGE D'ACCUEIL DANS L'ONGLET "REGLAGE" -> "LECTURE"-->
<!-- <ul class="actus">
                   <?php
                   $args = array( 'numberposts' => 8, 'category_name' => 'accueil', 'order'=> 'DESC', 'orderby' => 'date' );
                   $postslist = get_posts( $args );
                   foreach ($postslist as $post) :  setup_postdata($post); ?>
 
                       <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                           <p><?php the_excerpt();?></p></li>
                   <?php endforeach;
                   wp_reset_query();?>
               </ul> -->


<!-- //////// MA BOUCLE PERSONNALISE /////-->
<section>
    <?php if (have_posts()): ?>
        <div class='boucle'>           <!--on peut lire -> SI J AI DES POSTS, j'ouvre ma div "boucle"-->
            <?php
                $query = new WP_query(array('post_type' => 'post', 'category_name' => 'accueil', 'posts_per_page' => 8, 'order'=> 'ASC', 'orderby' => 'date' ));  /*cela récupèrera
                tous les articles donc la catégorie est "accueil" et affichera les 8 derniers*/
                while($query->have_posts()):$query->the_post(); global $post;

            ?>
            <div class="mise_en_page_boucle">
                <!--<a href="<?php the_permalink(); ?>">  --><?php the_post_thumbnail( array( 490, 420 ) ); ?></a> <!--affiche l'image mit en
                avant, fonctionnalité ajoutée dans function.php, le paramètre entre parenthèse sert à définir la taille que l'on souhaite
                affichée / le code the_permalink permet de rendre les images clicquables et génère automatiquement le lien qui nous renvoie
                sur la page de l'article en question, idéal lorsque l'on affiche un extrait de l'article sur la page principale -->
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>  <!--affiche les titres en h2 / le code the_permalink
                permet de rendre les titres clicquables et génère automatiquement le lien qui nous renvoie sur la page de l'article en
                question, idéal lorsque l'on affiche un extrait de l'article sur la page principale-->
                <!-- <p>publié le <?php echo the_time(get_option('date_format')); ?> à <?php echo the_time(get_option('time_format')); ?>,--><!--
                affiche la date et l'heure au format défini dans l'interface de wordpress, onglet "réglage" -> "général"--> <!--dans la
                catégorie <?php the_category(','); ?> </p> --> <!-- affiche la catégorie de l'article. Si l'article possède plusieurs catégories,
                on peut les afficher en mettant (',') comme dans l'exemple, sinon laisser les parenthèses vides -->
                <!--<?php the_content(); ?> -->     <!--si on veut un extrait de l'article au lieu du contenu, on met the_excerpt à la place
                de the_content. Ceci affichera uniquement le CONTENU TEXTUEL SANS la mise en forme italique, gras ect ... -->
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>    
    <?php wp_reset_postdata(); ?> <!--On réinitialise à la requête principale (important)-->

    <div class="button-explore">
        <button type="submit" ><a href="<?php echo get_field('lien_de_contact'); ?>" target="blank" class="lien_contact">EXPLORE MORE</a></button>
    </div>
</section>



<?php if(is_page(17)) { get_footer('accueil'); } else { get_footer(); } ?>