(function ( $ ) {
 
    $.fn.quotation = function( options ) {
 
        // Default options
        // var settings = $.extend({
        //     name: 'John Doe',
        //     color: 'orange'
        // }, options );
 
        // Apply options
        // return this.append('Hello ' + settings.name + '!').css({ color: settings.color });

        return this.each(function(){

        	$(this).text('updatef text'); 
        });
 
    };
 
}( jQuery ));