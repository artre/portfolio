<?php
    $db = new PDO('mysql:host=devground.cointechs.com;dbname=newsAgg', 'webadmin', 'w3bSQL@75');
    $postContent  = json_decode(file_get_contents("php://input"));
    $videoLast     = $postContent->last;
    $videoLimit    = $postContent->limit;
    $videoCategory = $postContent->cat;

    function getVideoFeed($db, $videoLast, $videoLimit) {
        $query = $db->prepare("SELECT * FROM newsVideos 
                               ORDER BY videoDate 
                               DESC LIMIT :videoLast, :videoLimit");

        $query->bindValue(':videoLast', $videoLast, PDO::PARAM_INT);
        $query->bindValue(':videoLimit', $videoLimit, PDO::PARAM_INT);

        try {
            $query->execute();
            return $query->fetchAll();
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    $videoFeed = getVideoFeed($db, $videoLast, $videoLimit);
    echo json_encode($videoFeed);
?>