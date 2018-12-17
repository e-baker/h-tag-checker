<?php

require 'class-htc-request.php';
require 'class-htc-result.php';

if ( isset( $_GET['u'] ) ) { // If u variable is set
    $req = new HTC_Request( $_GET['u'] );
    $res = new HTC_Result( $req );
    print_r( $res->print_result() );
} else {
    echo "Please set an appropriate url.";
}