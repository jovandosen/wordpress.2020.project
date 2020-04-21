(function ($, window, document) {
    'use strict';
    $(document).ready(function () {
       
       $(".custom-logo-link").addClass("navbar-brand");
        
    });
}(jQuery, window, document));

function hideShowComments(that)
{
	jQuery(that).next().toggle();
}

function hideShowCategories(that)
{
	jQuery(that).parent().next().toggle();
}