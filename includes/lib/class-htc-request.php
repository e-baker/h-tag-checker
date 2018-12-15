<?php

require '../../vendor/autoload.php';

use PHPHtmlParser\Dom;

class HTC_Request {

    public $html = null;

    public $h1s = array();

    public $h2s = array();

    public function __construct( $url ) {
        $this->URL = $url;
        $this->get_page();
        $this->get_h1();
        $this->get_h2();
    }

    public function get_page(){
        $dom = new Dom;
        $dom->loadFromUrl( $this->URL );
        $this->html = $dom;
    }

    public function get_h1(){
        $h1s = $this->html->find('h1');
        foreach ($h1s as $h1) {
            $heading = $h1->text();
            array_push( $this->h1s, $heading );
        }
    }

    public function get_h2(){
        $h2s = $this->html->find('h2');
        foreach ($h2s as $h2) {
            $heading = $h2->text();
            array_push( $this->h2s, $heading );
        }
    }

    public function return_headers(){
        return json_encode( array( 'h1' => $this->h1s, 'h2' => $this->h2s ) );
    }
}

if ( isset( $_GET['u'] ) ) { // If u variable is set
    $req = new HTC_Request( $_GET['u'] );
    print_r($req->return_headers());
} else {
    echo "Please set an appropriate url.";
}