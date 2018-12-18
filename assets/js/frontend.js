jQuery( document ).ready( function ( j ) {
    keepCredits();
	j('form#htc-form').submit( function( e ) {
        e.preventDefault();
        var input = document.getElementById('htc-url').value;
        if( !includesProtocol( input ) ) { 
            var defaultProtocol = window.location.protocol;
            var urlString = defaultProtocol.concat( '//', input );
        }
        var req_url = window.location.origin + '/wp-content/plugins/h-tag-checker/includes/lib/class-htc-api.php?u=' + encodeURIComponent(urlString);
        if( validURL(urlString) && isAvailable(urlString) ) {
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
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i'); // fragment locater
        if(!pattern.test(string)) {
            return false;
        } else {
            return true;
        }
    }

    function isAvailable( url ) {
        var status = null;
        j.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                status = true;
            },
            error: function ( err_resp ) {
                status = false;
            }
        })
        return status;
    }
});