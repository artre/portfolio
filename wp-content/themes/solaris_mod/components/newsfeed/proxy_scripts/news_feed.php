<?php

$db = new PDO('mysql:host=localhost;dbname=newsagg', 'root', '');
$postContent  = json_decode(file_get_contents("php://input"));
$newsLast     = $postContent->last;
$newsLimit    = $postContent->limit;

function getNewsFeed($db, $newsLast, $newsLimit) {
    $query = $db->prepare("SELECT * FROM newsarticles ORDER BY articleTimestamp DESC LIMIT :newsLast, :newsLimit");

    $query->bindValue(':newsLast', $newsLast, PDO::PARAM_INT);
    $query->bindValue(':newsLimit', $newsLimit, PDO::PARAM_INT);

    try {
        $query->execute();
        return $query->fetchAll();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$newsFeed = getNewsFeed($db, $newsLast, $newsLimit);
echo json_encode($newsFeed);
?>