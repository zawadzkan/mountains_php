<?php
session_start();
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

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Wyprawy</title>
    <link rel="stylesheet"  href="wyprawy.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-button-next, .swiper-button-prev {
            top: 25%;
        }

        .image {
            width: 700px;
            height: 500px;
            float: left;
            border-radius: 0%;
            margin: 15px;
        }
  
          
        #results {
            margin-top: 10px;
        }
          
  

    </style>
</head>

<body>
     <?php require_once "menu.php"; ?>
     <div id="results" data-url="<?php if (!empty($url)) echo $url ?>">
            <?php
            if (!empty($array)) {
            ?>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($array['value'] as $key => $item) {
                            echo '<div class="swiper-slide"><img class="image" src="' . $item["thumbnailUrl"] . '" alt=""/></div>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php
            }
            ?>
        </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>

