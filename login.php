<?php
require_once 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'cf4e59ebaae34ef1b8abcedfaf2e3060',
    '1c1f0a89686a40e3a47ff8f5ce889a67',
    'artificial-incoherence.com/token.php'
);

$options = [
    'scope' => [
        'user-read-currently-playing',
        'user-read-playback-state',
        'streaming'
    ],
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();
?>
