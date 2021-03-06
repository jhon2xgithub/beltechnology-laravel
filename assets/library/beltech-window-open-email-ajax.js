(function ( $ ) {
 
    $.fn.beltechwindowOpenEmailAjax = function( options ) {
 
        // Default options
        var settings = $.extend({
            alertmsg: 'Welcome to the junggle',
            imgurl: '',
            progressbar: '',
            originaltext: '',
            reload: true,
            parentwindow: ''                     
        }, options );

        // Apply options
        // return this.append('Hello ' + settings.name + '!').css({ color: settings.color });

        return this.each(function(){

            // $(this).text(settings.alertmsg); 
            $(this).on('submit', function(e){
                e.preventDefault();



                // $("body").hide();

                // console.log('parentwindow: '+parentwindow);

                var $this = $(this).find("#form-btn");
                $.ajax({     
                    // xhr: function(){

                    //    var xhr = new window.XMLHttpRequest();

                    //    xhr.upload.addEventListener('progress', function(e){

                    //        if(e.lengthComputable){
                    //                // console.log(e.loaded);
                    //                // console.log(e.total);
                    //                // console.log( (e.loaded / e.total) );

                    //                var percent = Math.round((e.loaded / e.total) *100);
                    //                console.log(percent);
                    //                $(settings.progressbar).attr('arial-valuenow', percent).css('width', percent + '%').text( percent + '%' );
                    //        }
                          
                    //    });

                    //    return xhr;
                    // },                     
                    url: $(this).attr('action'),
                    type:'POST', 
                    dataType: 'json',                     
                    processData:false,
                    contentType: false,                  
                    data: new FormData(this),
                    beforeSend: function(){                        
                        var loadingText = settings.imgurl;
                        if ($(this).html() !== loadingText) {
                            $this.data(settings.originaltext, $(this).html());
                            $this.html(loadingText);
                        }
                    },                   
                    success: function(data) {
                        if(!$.isEmptyObject(data.error)){
                            printErrorMsg('form-error-msg', data.error); 
                            $this.html('Error send');                                                     
                        }               
                       
                    },
                    error: function(xhr, err) {     
                    
                        if(xhr.status == 200){
                            $('.form-error-msg').css('display','none');
                            window.opener.location.reload();
                            $this.html('Form submitted successfully');    
                     
                            // parent.location.reload();
                            
                            // var serverErrors = confirm (settings.alertmsg);
                            // if (serverErrors)                                

                            //     window.opener.location.reload(); 
                            // else
                            //     // remain stay

                            // if(settings.reload){
                            //     location.reload();
                            // }

                            // // if reload set to true evertime user click alert message for success will reloads the page.
                            // if(settings.reload){
                            //     location.reload();
                            // }
                                          

                        }else if(xhr.status == 500){
                            $this.html('500 (Internal Server Error)');
                    
                            var serverErrors = confirm ("500 (Internal Server Error)");
                                                  
                        }                                           
                    }                               
                });

                function printErrorMsg (err, msg) {
                    $('.'+err).find("ul").html('');
                    $('.'+err).css('display','block');
                    $.each( msg, function( key, value ) {
                        $('.'+err).find("ul").append('<li>'+value+'</li>');
                    });
                }
            });
        });
 
    };
 
}( jQuery ));