<?php
session_start(); ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Wyprawy</title>
    <link rel="stylesheet"  href="main.css" />
</head>

<body>

    <?php require_once "menu.php"; ?>


    <?php

        $key = "AIzaSyA1t0VAp92of5e8TnHAMo-dLw1LV_dCIMk";
        $base_url = "https://www.googleapis.com/youtube/v3/";
        $channelId = "UChFr0plZ7_23KlTMFEKlMlA";
        $maxResult = 10;

        $API_URL = $base_url . "search?order=date&part=snippet&channelId=".$channelId."&maxResult=".$maxResult."&key=".$key;

        $videos = json_decode( file_get_contents( $API_URL ) );

        include "YTConnect.php";
        $db = new YTConnect();
        $conn = $db->connect();


        $stmt = $conn->prepare("SELECT * FROM videos WHERE video_type = 1");
        $stmt->execute();
        $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='row'>";
        foreach($videos as $video){
            echo '<iframe width="360" height="215" src="https://www.youtube.com/embed/'.$video['video_id'].'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            echo "</div>";
            echo "<p>wybierz kurs</p>";
        }



        foreach($videos->items as $video) {

            $sql = "INSERT INTO `videos` (`id`, `video_type`, `video_id`, `title`, `thumbnail_url`, `published_at`) VALUES (NULL, 1, :vid, :title, :turl, :pdate)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":vid", $video->id->videoId);
        $stmt->bindParam(":title", $video->snippet->title);
        $stmt->bindParam(":turl", $video->snippet->thumbnails->high->url);
        $stmt->bindParam(":pdate", $video->snippet->published_at);

        $stmt->execute();
        }

    ?>

</body>
</html>

