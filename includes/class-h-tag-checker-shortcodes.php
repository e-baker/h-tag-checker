<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HTC_Shortcodes {

    public function __construct( ) {
        // Register the shortcode
        add_shortcode( 'htag-checker', array( $this, 'show_form' ) );
    }

    public function show_form( ) {
        //echo '<form method="get"><input id="htc-url" type="text" placeholder="https://ericbaker.me"><button id="htc-analyze">Check Tags</button></form>';
            echo '<input id="htc-url" type="text" placeholder="https://ericbaker.me"><button id="htc-analyze">Check Tags</button>';
        echo '<div id="htc-results">Use the form above to see your results here.</div>';
    }
}