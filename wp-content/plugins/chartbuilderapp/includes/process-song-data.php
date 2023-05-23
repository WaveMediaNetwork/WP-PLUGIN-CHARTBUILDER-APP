<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cba_song_data'])) {
        testFunction();
    }
}


function testFunction() {
    wp_redirect(add_query_arg('success', 'true', home_url()));
    exit;
}