<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HTC_Shortcodes {

    public function __construct( ) {
        // Register the shortcode
        add_shortcode( 'htag-checker', array( $this, 'show_form' ) );
    }

    public function show_form( ) {
        echo '<form id="htc-form" method="get"><input id="htc-url" type="text" placeholder="https://trafficlight.me"><button id="htc-analyze">Check Tags</button></form>';
        echo '<div id="htc-results">Use the form above to see your results here.</div>';
        echo '<div id="htc-credits"><hr />Brought to you by <a href="https://trafficlight.me/seo-tools">Traffic Light Media</a>.</div>';
    }
}