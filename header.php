<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154033556-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-154033556-2');
    </script>

    <?php
        wp_head()
    ?>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <?php
                // if(function_exists('the_custom_logo')) {
                //     $custom_logo_id = get_theme_mod('custom_logo');
                //     $logo = wp_get_attachment_image_src($custom_logo_id);
                // }
            ?>
            <!-- <img src="<?php echo $logo[0] ?>" alt=""> -->

            <a class="navbar-brand" href="/">
                <!-- For dynamic site title -->
                <!-- <?php // echo get_bloginfo('name'); ?> -->
                WC
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="" class="navbar-nav ml-auto">%3$s</ul>'
                        )
                    );
                ?>

            </div>
        </div>
    </nav>