<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    $data = json_decode(file_get_contents("https://storiesig.info/api/ig/userInfoByUsername/" .$username));
    $datara = $data->result->user;
    $param_ID = $datara->pk_id;
    $bio = $datara->biography;
    $fullname = $datara->full_name;
    $followercount = $datara->follower_count;
    $followingcount = $datara->following_count;

    // DATA
    $profile_pic = $datara->hd_profile_pic_url_info->url;

    $url = $profile_pic; // Replace with the actual image URL
    $filename = "profilepic.jpg"; // Choose a filename for the downloaded image

    $imageData = file_get_contents($url);

    if ($imageData !== false) {
        // Save the image to your server
        $filePath = "images/" . $filename; // Change "images/" to your desired directory
        if (file_put_contents($filePath, $imageData)) {
            echo "Image downloaded and saved as $filename.";
        } else {
            echo "Failed to save the image.";
        }
    } else {
        echo "Failed to download the image.";
    }

    // END DATA



    $userID = $param_ID;
    $settings = [];

    if (file_exists('settings.json')) {
        $settings = json_decode(file_get_contents('settings.json'), true);
    }

    $settings['ID'] = $userID;
    $settings['USERNAME'] = $username;
    $settings['IMG'] = $filename;
    $settings['BIO'] = $bio;
    $settings['FULLNAME'] = $fullname;
    $settings['FOLLOWERS'] = $followercount;
    $settings['FOLLOWING'] = $followingcount;

    file_put_contents('settings.json', json_encode($settings));

    // Redirect the user to the account setup page with parameters in the URL
    header("Location: process.html?userID=$userID&username=$username");
    exit();
}

?>
