<?php
    get_header();

    get_template_part( 'template-parts/api', 'query-data' );
    $golf_data = get_stats_data();
?>
<div class="banner tournament__banner">
    <div class="container py-5">
        <h1 class="banner__title"><?php the_title(); ?></h1>
        <hr />
        <p class="banner__sub-title">&quot;The most important shot in Golf is the next one&quot;</p>
    </div>
</div>

<div class="container py-5 text-center">
    <p>Season Stats</p>
    <?php get_template_part( 'template-parts/content', 'stats'); ?>
</div>

<div class="section-light-white py-5">
    <div class="container text-center">
        <h3 class="sub-title">2020 Korn Ferry Tour Stats</h3>

        <?php
            for ($i = $golf_data["events"]-1; $i >= 0; $i--) {
        ?>
        <div class="stats-box my-4">
            <div class="row">
                <div class="col-xs-12 col-md-2 my-auto">
                    <p class="my-0 stats-date"><?php echo $golf_data["date"][$i]; ?></p>
                </div>
                <div class="col-xs-6 col-md-4 my-auto">
                    <p class="my-0 stats-name"><?php echo $golf_data["name"][$i]; ?></p>
                </div>
                <div class="col-xs-6 col-md-4">
                    <table class="mx-auto my-3 stats-rounds">
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
                    <p class="m-0 stats-place"><?php echo $golf_data["place finished"][$i]; ?></p>
                </div>

            </div>
        </div>

        <?php } ?>

        <button href="" class="btn btn-success">View more</button>
    </div>
</div>

<div class="upcomming-events py-5">
    <div class="container">
        <h3>2020 Upcomming Events</h3>

        <div class="u-events-box">
            <div class="row">
                <div class="col-4">
                    <p>Date</p>
                </div>
                <div class="col-4">
                    <p>Place/TurnName</p>
                </div>
                <div class="col-4">
                    <p>Place</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>
