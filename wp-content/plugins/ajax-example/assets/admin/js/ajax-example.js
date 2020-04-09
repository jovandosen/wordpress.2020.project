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
        
    });
}(jQuery, window, document));