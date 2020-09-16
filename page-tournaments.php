<?php
    get_header();

    get_template_part( 'template-parts/api', 'query-data' );
    $golf_data = get_stats_data();
?>
<div class="page-body">
    <div class="banner tournament__banner">
        <div class="container py-5">
            <h1 class="tournament__title"><?php the_title(); ?></h1>
            <hr />
            <p class="text-center text-white">&quot;The most important shot in Golf is the next one&quot;</p>
        </div>
    </div>

    <div class="container py-5 text-center">
        <p>Season Stats</p>
        <?php get_template_part( 'template-parts/content', 'stats'); ?>
    </div>

    <div class="section-split py-5">
        <div class="container text-center">
            <h3 class="tournament__stats-title">2020 Korn Ferry Tour Stats</h3>

            <div id="schedule">
                <?php
                for ($i = $golf_data["events"]-1; $i >= 0; $i--) {
                    ?>
                    <div class="calendar-box my-4">
                        <div class="row py-0 py-md-4">
                            <div class="col-xs-12 col-md-2 my-auto">
                                <p class="my-0 stats-date"><?php echo $golf_data["date"][$i]; ?></p>
                            </div>
                            <div class="col-xs-6 col-md-4 my-auto">
                                <p class="my-0 stats-name"><?php echo $golf_data["name"][$i]; ?></p>
                            </div>

                            <div class="col-xs-6 col-md-4">
                                <table class="mx-auto calendar__round-scores">
                                    <tr class="border-bottom">
                                        <th colspan="4">Round Score</th>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="p-1">R1</th>
                                        <th class="p-1">R2</th>
                                        <th class="p-1">R3</th>
                                        <th class="p-1">R4</th>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><?php echo $golf_data["round score"][$i][0]; ?></td>
                                        <td class="p-2"><?php echo $golf_data["round score"][$i][1]; ?></td>
                                        <td class="p-2"><?php echo $golf_data["round score"][$i][2]; ?></td>
                                        <td class="p-2"><?php echo $golf_data["round score"][$i][3]; ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-xs-12 col-md-2 my-auto">
                                <?php
                                //                                $bg_btn_color = ($golf_data["place finished"][$i] == "CUT") ? "bg-red" : "bg-green";
                                ?>
                                <p class="calendar__final-position"><?php echo $golf_data["place finished"][$i]; ?></p>
                            </div>

                        </div>
                    </div>

                <?php } ?>
            </div>

            <button href="#" class="btn btn-green mt-4" id="view-more">View More</button>
        </div>
    </div>

    <div class="container text-center py-5">
        <h3 class="tournament__stats-title">2020 Upcomming Events</h3>

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
