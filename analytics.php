<?php
// Function to send a tracking request to Google Analytics
function trackPageView($trackingId, $clientId, $documentPath) {
    $data = array(
        'v'   => '1',               // Protocol version
        'tid' => $trackingId,       // Tracking ID
        'cid' => $clientId,         // Client ID
        't'   => 'pageview',        // Hit type - Pageview
        'dp'  => $documentPath,     // Document path (e.g., '/lesson.php?id=123')
    );

    $url = 'https://www.google-analytics.com/collect';

    // Use cURL to send the tracking request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_exec($ch);
    curl_close($ch);
}
?>
