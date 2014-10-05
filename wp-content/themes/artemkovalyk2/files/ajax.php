<?php
/**
 * Created by PhpStorm.
 * User: ARTEM
 * Date: 20.07.14
 * Time: 13:46
 */
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>SUCCESS: " .$email." is valid</p>";
    } else {
        echo "<p>ERROR: ".$email." is not valid!</p>"
    }
?>