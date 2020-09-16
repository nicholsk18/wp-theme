<?php
get_header();

get_template_part( 'template-parts/api', 'query-data' );
$golf_data = get_stats_data();
?>

<div class="page-body">
    <div class="home__banner py-5">

    </div>

    <div class="container py-5 text-center">
        <a href="https://www.shoalcreekclub.com/">
            <img class="shoal-creek-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/shoal-creek.png" alt="Shoal Creek" target="_blank">
        </a>

        <p>Season Stats</p>
        <?php get_template_part( 'template-parts/content', 'stats'); ?>

        <div class="row pt-5">
            <div class="col-3 m-auto">
                <a href="https://www.titleist.com/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/titleist.png" alt="Titleist" target="_blank">
                </a>
            </div>
            <div class="col-3 m-auto">
                <a href="https://www.footjoy.com/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/footjoy.png" alt="FootJoy" target="_blank">
                </a>
            </div>
            <div class="col-3 m-auto">
                <a href="https://us.puma.com/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/puma.png" alt="Puma" target="_blank">
                </a>
            </div>
            <div class="col-3 m-auto">
                <a href="https://www.testoril.com/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sponsors/testoril.png" alt="Testoril" target="_blank">
                </a>
            </div>
        </div>
    </div>

    <!-- twitter insta feed -->
    <div class="container py-5">
        <?php
        if ( have_posts() ) {
            while( have_posts() ) {
                the_post();
                the_content();
            }
        }
        ?>
    </div>
</div>

<?php
    get_footer();
?>
