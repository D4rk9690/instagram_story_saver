<?php
const localDate = new Date();

// Calculate the time difference between local time and Brussels time in minutes
const brusselsTimeOffset = 60;  // Brussels is UTC+1 during standard time

// Calculate the Brussels time using the time difference
const brusselsTime = new Date(localDate.getTime() + brusselsTimeOffset * 60 * 1000);

console.log('Current time in Brussels:', brusselsTime);
$json = file_get_contents("https://instasupersave.com/api/ig/stories/" .$_GET['userID']);

$data = json_decode($json, true);

$videoUrls = [];

foreach ($data['result'] as $entry) {
    if (isset($entry['video_versions'])) {
        foreach ($entry['video_versions'] as $video) {
            $videoUrls[] = $video['url'];
        }
    }
}

$baseDownloadPath = 'downloaded_stories/';
$currentDate = date('d-m-y');
$downloadPath = $baseDownloadPath . $currentDate . '/';

if (!is_dir($downloadPath)) {
    mkdir($downloadPath, 0777, true);
}

$downloadedStories = [];

if (file_exists('downloaded_stories.json')) {
    $downloadedStories = json_decode(file_get_contents('downloaded_stories.json'), true);
}

$logFile = 'download_log.txt';

$downloadLog = "Download Log - " . date('Y-m-d H:i:s') . "\n\n";

foreach ($videoUrls as $index => $videoUrl) {
    $videoFileName = $downloadPath . 'video_' . ($index + 1) . '.mp4';

    if (!in_array($videoUrl, $downloadedStories)) {
        $videoData = file_get_contents($videoUrl);

        if ($videoData !== false) {
            file_put_contents($videoFileName, $videoData);
            echo 'Downloaded: ' . $videoFileName . PHP_EOL;
            $downloadedStories[] = $videoUrl;
            $downloadLog .= "Downloaded: " . $videoFileName . "\n";
        } else {
            echo 'Failed to download: ' . $videoFileName . PHP_EOL;
            $downloadLog .= "Failed to download: " . $videoFileName . "\n";
        }
    } else {
        echo 'Already downloaded: ' . $videoFileName . PHP_EOL;
        $downloadLog .= "Already downloaded: " . $videoFileName . "\n";
    }
}

file_put_contents('downloaded_stories.json', json_encode($downloadedStories));

file_put_contents($logFile, $downloadLog, FILE_APPEND);

echo 'All videos downloaded and saved.';