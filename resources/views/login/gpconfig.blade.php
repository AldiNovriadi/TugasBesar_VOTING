<?php
session_start();
// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';
$client_id = '1008844533839-p7taa03fq1u53kh7hog2h2qrrn4tgh8o.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost:8000/voting/login'; // Callback URL
// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
