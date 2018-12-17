<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HTC_Shortcodes {

    public function __construct( ) {
        // Register the shortcode
        add_shortcode( 'htag-checker', array( $this, 'show_form' ) );
    }

    public function show_form( ) {
        $output = '<form id="htc-form" method="get"><input id="htc-url" type="text" placeholder="https://trafficlight.me"><button id="htc-analyze">Check Tags</button></form>';
        $output .= '<div id="htc-results">Use the form above to see your results here.</div>';
        $output .= '<div id="htc-credits"><hr />Brought to you by <a href="https://trafficlight.me/seo-tools/h-tag-checker">Traffic Light Media</a>.</div>';
        return $output;
    }
}