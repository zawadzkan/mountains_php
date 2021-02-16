<?php
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q=mountains",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: bing-image-search1.p.rapidapi.com",
        "x-rapidapi-key: cbd44c5216msh24f03c568e688b1p11e43bjsn6f3a460ec7c5"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo $response;
}

$array = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>geogram</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="kursy.css" />
</head>
<body>

<div id="results" data-url="<?php if (!empty($url)) echo $url ?>">
    <?php
    if (!empty($array)) {
        foreach ($array['value'] as $key => $item) {
                       // echo $item["thumbnailUrl"] . "</br>";
            echo '<img class="image" src="' . $item["thumbnailUrl"] . '" alt=""/>';
        }
    }
    ?>
</div>
</body>
</html>