<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'cf4e59ebaae34ef1b8abcedfaf2e3060',
    '1c1f0a89686a40e3a47ff8f5ce889a67',
    'http://localhost/token.php'
);

if (!isset($_GET['action'])) {

    $session->requestAccessToken($_GET['code']);

    $accessToken = $session->getAccessToken();
    setcookie('accessToken', $accessToken, time() + 3600);
    setcookie('refreshTime', time() + 3600, time() + (3600 * 365));
    $refreshToken = $session->getRefreshToken();
    setcookie('refreshToken', $refreshToken, time() + (3600 * 365));

} elseif ($_GET['action'] == "refresh") {

    $session->refreshAccessToken($_COOKIE['refreshToken']);

    $accessToken = $session->getAccessToken();
    setcookie('accessToken', $accessToken, time() + 3600);
    setcookie('refreshTime', time() + 3600, time() + (3600 * 365));
    $refreshToken = $session->getRefreshToken();
    setcookie('refreshToken', $refreshToken, time() + (3600 * 365));
}

header('Location: playing.php');
die();
?>
