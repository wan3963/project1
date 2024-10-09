<?php
require_once 'google-api/src/Google_Client.php';
require_once 'google-api/src/Google_Oauth2Service.php';

session_start();

// Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName('Your Application Name');
$client->setClientId('YOUR_CLIENT_ID'); // Replace with your Client ID
$client->setClientSecret('YOUR_CLIENT_SECRET'); // Replace with your Client Secret
$client->setRedirectUri('http://your_subdomain.infinityfreeapp.com/google-login.php');
$client->addScope("email");
$client->addScope("profile");

$google_oauthV2 = new Google_Oauth2Service($client);

// Create Google Login URL
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
} elseif (isset($_GET['code'])) {
    // Authenticate and get user info
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var($client->getRedirectUri(), FILTER_SANITIZE_URL));
    exit;
}

// Get user information
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $userInfo = $google_oauthV2->userinfo->get();

    // You can now store user information in session or display it
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $userInfo['name'];
    header("Location: home.php");
    exit;
} else {
    // Generate Google login URL
    $authUrl = $client->createAuthUrl();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Login</title>
</head>
<body>
    <h2>Login with Google</h2>
    <a href="<?php echo $authUrl; ?>">Login with Google</a>
</body>
</html>
