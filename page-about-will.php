<?php
    get_header();
?>

<div class="container page-body">
    <h1 class="pt-5"><?php the_title(); ?></h1>
    <?php
        if ( have_posts() ) {
            while( have_posts() ) {
                the_post();

                the_content();
            }
        }
    ?>
</div>

<?php
    get_footer();
?>
