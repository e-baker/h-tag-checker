<?php

class HTC_Result {

    public $h1s = array();

    public $h2s = array();

    public $url = null;

    public function __construct( $headers ) {
        $this->url = $headers->URL;
        $this->h1s = $headers->get_el( 'h1' );
        $this->h2s = $headers->get_el( 'h2' );
    }

    public function print_result(){
        $output = "<div id='analysis-results'><h3>Heading Tag Results for <a href='{$this->url}' target='_blank' rel='nofollow'>{$this->url}</a>:</h3>";
        $output .= $this->print_els( 'H1', $this->h1s );
        $output .= $this->print_els( 'H2', $this->h2s );
        $output .= '</div>';
        return $output;
    }

    private function print_els( $el_type, $els ){
        $el_output = "<h4>{$el_type} Headings</h4><ul class='{$el_type}-results'>";
        
        if( count($els) > 0 ) {
            foreach( $els as $el ) {
                $el_output .= "<li class='{$el_type}-result'>" . $el . "</li>";
            }

            $this->has_duplicates( $els ) ? $el_output .= "<p class='htc-error-msg'>Your page has <a href='https://trafficlight.me/duplicate-{$el_type}-tags'>duplicate {$el_type} tags</a>.</p>" : null;
        
        } else {
            $el_output .= "<li class='{$el_type}-result'>There were no {$el_type} tags found on this page.</li>";
        }
        
        $el_output .= '</ul>';
        
        return $el_output;
    }

    private function has_duplicates( $tocheck ) {
        $has_duplicates = count( $tocheck ) === count( array_unique( $tocheck ) ) ? false : true;
        return $has_duplicates;
    }

}