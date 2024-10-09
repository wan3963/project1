<?php
session_start(); // Start the session

// Destroy the session
$_SESSION = array(); // Clear the session array
session_destroy(); // Destroy the session

// If you want to include Google logout
if (isset($_GET['logout'])) {
    // Include the Google API client
    require_once 'google-api/src/Google_Client.php';

    // Create Client
    $client = new Google_Client();
    $client->setClientId('YOUR_CLIENT_ID'); // Replace with your Client ID
    $client->setClientSecret('YOUR_CLIENT_SECRET'); // Replace with your Client Secret
    $client->setRedirectUri('http://your_subdomain.infinityfreeapp.com/google-login.php');

    // Redirect to Google logout
    $logoutUrl = "https://accounts.google.com/Logout";
    header("Location: $logoutUrl");
    exit;
}

header("location: index.php"); // Redirect to the login page
exit;
?>
