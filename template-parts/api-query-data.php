<?php
function get_stats_data () {
    $data = null;
    try {
        $url = "https://statdata.pgatour.com/players/51567/2020results.json";
        $will_stats = curl_init($url);

        curl_setopt($will_stats, CURLOPT_URL, $url);
        curl_setopt($will_stats, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($will_stats, CURLOPT_CONNECTTIMEOUT, 4);

        $json_response = curl_exec($will_stats);

        if (!$json_response) {
            echo curl_error("Data was not properly loaded");
        }
        curl_close($json_response);

        $response_data = json_decode($json_response, true);

        //    echo $response[0][0];
         $data = convert_data($response_data);
        // print_r($a);

    } catch (Exception $e) {
        // Change for production
        return 'Caught exception: ' . $e->getMessage() . "\n";
    }

    return $data;
}

function convert_data ($api_response) {
    $data_length = count($api_response["plrs"][0]["tours"][0]['trnDetails']);
//    $round_score_length = count($api_response["plrs"][0]["tours"][0]['trnDetails'][0]["scr"]["rounds"]);
    $tournament_data = $api_response["plrs"][0]["tours"][0];
    $score_avg = 0;


    // Format data to be sent to front-end
    $data = array(
        "date" => array(),
        "name" => array(),
        "place finished" => array(),
        "current year" => $api_response["plrs"][0]["currentYear"],
        "events" => $tournament_data["totals"]["evnts"],
        "rank" => $tournament_data["totals"]["webRnkReg"],
        "points" => $tournament_data["totals"]["webPtsReg"],
        "round score" => array(),
        "score avg" => null
    );

    // Filter needed data from api
    for ($i = 0; $i < $data_length; $i++) {
        $score_total = 0;
        $rounds_played = 4;

        array_push($data["date"], $tournament_data["trnDetails"][$i]["endDate"]);
        array_push($data["name"], $tournament_data["trnDetails"][$i]["trn"]["trnName"]);
        array_push($data["place finished"], $tournament_data["trnDetails"][$i]["finPos"]["value"]);

        if ($api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][0]) {
            $round_one = $api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][0]["rndScr"];
            $score_total += $round_one;
        } else {
            $round_one = "-";
        }

        if ($api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][1]) {
            $round_two = $api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][1]["rndScr"];
            $score_total += $round_two;
        } else {
            $round_two = "-";

        }

        if ($api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][2]) {
            $round_three = $api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][2]["rndScr"];
            $score_total += $round_three;
        } else {
            $rounds_played = 2; // set to 2 rounds for round avg
            $round_three = "-";
        }

        if ($api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][3]) {
            $round_four = $api_response["plrs"][0]["tours"][0]['trnDetails'][$i]["scr"]["rounds"][3]["rndScr"];
            $score_total += $round_four;
        } else {
            $round_four = "-";
        }

        $score_avg += $score_total / $rounds_played;

        array_push($data["round score"], [$round_one, $round_two, $round_three, $round_four]);
    }

    $data["score avg"] = round($score_avg / $tournament_data["totals"]["evnts"], 2);

    return $data;
}