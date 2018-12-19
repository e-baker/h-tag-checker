jQuery( document ).ready( function ( j ) {
    keepCredits();
    var getUrl = getUrlParam( 'url', 'null');
    if( getUrl != 'null' ) {
        j('#htc-url').val( getUrl );
        
        getResults( getUrl );
    }

	j('form#htc-form').submit( function( e ) {
        e.preventDefault();
        var url = document.getElementById('htc-url').value;
        getResults( url );
    });

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    function getUrlParam(parameter, defaultvalue){
        var urlparameter = defaultvalue;
        if(window.location.href.indexOf(parameter) > -1){
            urlparameter = getUrlVars()[parameter];
            }
        return urlparameter;
    }

    function updateDivs( resp ) {
        var el = document.getElementById('htc-results');
        el.innerHTML = resp;
        el.scrollIntoView({behavior: 'smooth'});
    }  

    function keepCredits( ) {
        var credits = j('div#htc-credits');
        if( credits.is(":hidden") ) {
            credits.css( 'display', 'block' );
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
            console.log("Does not pass validURL.");
            return false;
        } else {
            return true;
        }
    }

    function showResults() {
        
    }

    function getResults( urlString ) {
        var req_url = window.location.origin + '/wp-content/plugins/h-tag-checker/includes/lib/class-htc-api.php?u=' + encodeURIComponent(urlString);
        if( validURL(urlString) ) {
            j.ajax({
                type: "GET",
                url: req_url,
                success: function (response) {
                    updateDivs( response );
                    keepCredits();
                    showResults();
                },
                error: function ( err_resp ) {
                    console.log( 'Error: ' + err_resp.responseText );
                }
            });
        } else {
            updateDivs( "<h3>Please enter a valid URL.</h3>");
            
        }
    }
});