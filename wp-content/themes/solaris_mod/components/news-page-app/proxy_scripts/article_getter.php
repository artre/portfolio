<?php
    header('Access-Control-Allow-Origin: *');
    $postContent  = json_decode(file_get_contents("php://input"));
    $articleURL   = $postContent->url;

    echo getArticleContent($articleURL);

    function getArticleContent($url) {
        return file_get_contents($url);
        // // Get cURL resource
        // $curl = curl_init();

        // // Set cURL options
        // curl_setopt_array($curl, array(
        //     CURLOPT_RETURNTRANSFER => 1,
        //     CURLOPT_URL => $url,
        //     CURLOPT_USERAGENT => 'Scratch my balls'
        // ));

        // // Send the request & save response to $response
        // $response = curl_exec($curl);

        // // Close cURL resource
        // curl_close($curl);

        // // Return response
        // return $response;
    }

?>
