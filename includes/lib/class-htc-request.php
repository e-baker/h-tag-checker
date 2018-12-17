<?php

require '../../vendor/autoload.php';

use PHPHtmlParser\Dom;

class HTC_Request {

    public $html = null;

    public $URL = null;

    public function __construct( $url ) {
        $this->URL = $url;
        $this->get_page();
    }

    public function get_page(){
        $dom = new Dom;
        if( $dom->loadFromUrl( $this->URL ) ){
            $this->html = $dom;
        } else {
            return "There was an error.";
            exit;
        }
    }

    public function get_el( $element ){
        $results = array();
        $els = $this->html->find( $element );
        foreach ($els as $el) {
            $heading = strip_tags($el->innerHtml());
            array_push( $results, $heading );
        }
        return $results;
    }
}