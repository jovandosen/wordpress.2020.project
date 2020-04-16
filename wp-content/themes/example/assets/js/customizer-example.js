(function ($, window, document) {
    'use strict';
    $(document).ready(function () {	

  	   /*wp.customize('baz_textarea_setting', function(value){
  	   		value.bind(function(x){
  	   			// x represents new value, live change in customizer
  	   			console.log(x);
  	   		});
  	   });

  	   wp.customize('bar_setting', function(value){
  	   		value.bind(function(newval){
  	   			// newval represents new value, live change in customizer
  	   			// console.log(newval);
  	   		});
  	   });*/

  	   wp.customize('foo_setting', function(value){
  	   		value.bind(function(newval){
  	   			// newval represents new value, live change in customizer
  	   			$("#foo_setting_id").text(newval);
  	   		});
  	   });
        
    });
}(jQuery, window, document));