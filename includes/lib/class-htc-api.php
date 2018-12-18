<?php

require 'class-htc-request.php';
require 'class-htc-result.php';

/**
 * If this page is requested, we look for the specific 'u' variable
 * to use. If it's there, we create a request and tender the results but
 * if it's not found, we let them know.
 */
if ( isset( $_GET['u'] ) ) { // The GET variable 'u' is set
    $req = new HTC_Request( $_GET['u'] );
    $res = new HTC_Result( $req );
    print_r( $res->print_result() );
} else { // The GET variable 'u' has not been set.
    echo "Please set an appropriate url.";
}