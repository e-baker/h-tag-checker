jQuery( document ).ready( function ( j ) {
    keepCredits();
	j('form#htc-form').submit( function( e ) {
        e.preventDefault();
        var input = document.getElementById('htc-url').value;
        var req_url = 'https://plugin.local/wp-content/plugins/h-tag-checker/includes/lib/class-htc-api.php?u=' + encodeURIComponent(input);
        if( validURL(input) ) {
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
        console.log( resp );
        document.getElementById('htc-results').innerHTML = resp;
    }

    function keepCredits( ) {
        var credits = j('div#htc-credits');
        if( credits.is(":hidden") ) {
            credits.css( 'display', 'block' );
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