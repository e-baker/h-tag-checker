jQuery( document ).ready( function ( j ) {
    keepCredits();
	j('form#htc-form').submit( function( e ) {
        e.preventDefault();
        var input = document.getElementById('htc-url').value;
        if( !includesProtocol( input ) ) { 
            var defaultProtocol = 'http://';
            var urlString = defaultProtocol.concat( '', input );
        }
        var req_url = window.location.origin + '/wp-content/plugins/h-tag-checker/includes/lib/class-htc-api.php?u=' + encodeURIComponent(urlString);
        if( validURL(urlString) ) {
                j.ajax({
                type: "GET",
                url: req_url,
                success: function (response) {
                    updateDivs( response );
                    keepCredits();
                },
                error: function ( err_resp ) {
                    console.log( 'Error: ' + err_resp.responseText );
                }
            });
        } else {
            updateDivs( "<h3>Please enter a valid URL.</h3>");
        }
    });

    function updateDivs( resp ) {
        document.getElementById('htc-results').innerHTML = resp;
    }

    function keepCredits( ) {
        var credits = j('div#htc-credits');
        if( credits.is(":hidden") ) {
            credits.css( 'display', 'block' );
        }
    }

    function includesProtocol( string ) {
        var regex = /http/gmi;
        if ( string.search( regex ) > -1 ) {
            return true;
        } else {
            return false;
        }
    }

    function validURL( string ) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;  
        }
    }
});