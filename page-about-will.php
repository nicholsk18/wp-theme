<?php
    get_header();
?>

<div class="container">
    <h1><?php the_title(); ?></h1>
    <?php
        if ( have_posts() ) {
            while( have_posts() ) {
                the_post();
                
                get_template_part( 'template-parts/content', 'page');
            }
        }
    ?>
</div>

<?php
    get_footer();
?>
