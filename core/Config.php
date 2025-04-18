<?php

// if the initial route is a root route, it should be empty
// example, if the initial route is 'home', it should be 'home' and not '/home'
define('INITIAL_ROUTE', '');
define('ASSET_IMG', INITIAL_ROUTE . '/assets/img/');
define('ASSET_CSS', INITIAL_ROUTE . '/assets/css/');
define('ASSET_JS', INITIAL_ROUTE . '/assets/js/');
define('CREDENTIALS', json_decode(file_get_contents(__DIR__ . '/../credentials.json'), true));


// Start a session for the entire application
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
