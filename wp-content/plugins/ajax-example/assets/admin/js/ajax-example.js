(function ($, window, document) {
    'use strict';
    // execute when the DOM is ready
    $(document).ready(function () {
       
       $("#test").on("keydown", function(){
            $.post(ajax_example_obj.url, {
                action: "process",
                detail: "jovan",
                _ajax_nonce: ajax_example_obj.nonce   
            }, function(data){
                console.log(data);
            });
       });

        $( document ).on( 'heartbeat-send', function ( event, data ) {
            // Add additional data to Heartbeat data.
            data.myplugin_customfield = 'some_data';
        });

        $( document ).on( 'heartbeat-tick', function ( event, data ) {
            // Check for our data, and use it.
            if ( ! data.myplugin_customfield_hashed ) {
                return;
            }
 
            // alert( 'The hash is ' + data.myplugin_customfield_hashed );
            console.log( data.myplugin_customfield_hashed );
        });
        
    });
}(jQuery, window, document));