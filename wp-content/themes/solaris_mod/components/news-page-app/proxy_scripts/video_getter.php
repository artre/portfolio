<?php
    header('Access-Control-Allow-Origin: *');
    $postContent  = json_decode(file_get_contents("php://input"));
    $videoURL   = $postContent->url;

    echo getArticleContent($videoURL);
    //echo $videoURL;

    function getArticleContent($url) {
        //return file_get_contents($url);
        // Get cURL resource
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => 1
        ));

        // Send the request & save response to $response
        $response = curl_exec($curl);

        // Close cURL resource
        curl_close($curl);

        // Return response
        return $response;
    }
?>