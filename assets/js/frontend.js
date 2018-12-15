jQuery( document ).ready( function ( j ) {
	j('button#htc-analyze').on( 'click touchstart', function( e ) {
        var input = document.getElementById('htc-url').value;
        console.log(input);
        var req_url = 'https://plugin.local/wp-content/plugins/h-tag-checker/includes/lib/class-htc-request.php?u=' + encodeURIComponent(input);
        console.log(req_url);
        j.ajax({
            type: "GET",
            url: req_url,
            dataType: "json",
            success: function (response) {
                myFunc( response );
            },
            error: function ( err_resp ) {
                console.log( err_resp );
            }
        });
    });

    function myFunc( resp ) {
        console.log(resp.h1);
    }
});