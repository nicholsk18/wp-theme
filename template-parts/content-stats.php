<?php
    // Get data from api
    $golf_data = get_stats_data();
?>

<div class="row text-center">
    <div class="col-sm col-md-3">
        <div class="card">
            <div class="card-header">Tour Rank</div>
            <div class="card-body"><?php echo $golf_data["rank"]; ?></div>
        </div>
    </div>

    <div class="col-sm col-md-3">
        <div class="card">
            <div class="card-header">Official Points</div>
            <div class="card-body"><?php echo $golf_data["points"]; ?></div>
        </div>
    </div>

    <div class="col-sm col-md-3">
        <div class="card">
            <div class="card-header">Scoring Average</div>
            <div class="card-body"><?php echo $golf_data["score avg"]; ?></div>
        </div>
    </div>

    <div class="col-sm col-md-3">
        <div class="card">
            <div class="card-header">Events Played in <?php echo $golf_data["current year"]; ?></div>
            <div class="card-body"><?php echo $golf_data["events"]; ?></div>
        </div>
    </div>
</div>