<?php
    // Get data from api
    $golf_data = get_stats_data();
?>

<div class="row text-center">
    <div class="col-12 col-md-6 col-lg-3 pt-3">
        <div class="card border-red">
            <div class="card-header border-red">Tour Rank</div>
            <div class="card-body"><?php echo $golf_data["rank"]; ?></div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 pt-3">
        <div class="card border-red">
            <div class="card-header border-red">Official Points</div>
            <div class="card-body"><?php echo $golf_data["points"]; ?></div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 pt-3">
        <div class="card border-red">
            <div class="card-header border-red">Scoring Average</div>
            <div class="card-body"><?php echo $golf_data["score avg"]; ?></div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 pt-3">
        <div class="card border-red">
            <div class="card-header border-red">Events Played in <?php echo $golf_data["current year"]; ?></div>
            <div class="card-body"><?php echo $golf_data["events"]; ?></div>
        </div>
    </div>
</div>