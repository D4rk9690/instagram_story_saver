<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $userID = $_POST['userID'];

    $settings = [];

    if (file_exists('settings.json')) {
        $settings = json_decode(file_get_contents('settings.json'), true);
    }

    $settings['ID'] = $userID;
    $settings['USERNAME'] = $username;

    file_put_contents('settings.json', json_encode($settings));

    // Redirect the user to the account setup page with parameters in the URL
    header("Location: process.html?userID=$userID&username=$username");
    exit();
}

?>
