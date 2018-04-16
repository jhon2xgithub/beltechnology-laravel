(function($) {

    $.fn.beltechAjaxsubmitModal = function(options) {

        // Default options
        var settings = $.extend({
            alertmsg: '',
            statusmsg: '',
            imgurl: '',
            originaltext: '',
            datatarget: '',
            reload: true,
            showMessage: false
        }, options);

        return this.each(function() {

            $(this).on('submit', function(e) {

                e.preventDefault();
                resetErrors();
                var btn             = $(this).find("[type='submit']");
                var file            = $(this).find('input[type="file"]').val().trim();
                var row_num         = $(this).find('[name="row_num"]').val();
                var count_row       = row_num - 1;
                var column_num      = $(this).find('[name="column_num"]').val();
                var column_count    = column_num - 1;

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    processData: false, // set it to false if will using new FormData(this).
                    cache: false,
                    contentType: false, // set it to false if will using new FormData(thi   s).
                    data: new FormData(this), // use this to belong file input because if use serialize fike type not belongs and it hards for ajax to save the uploaded file
                    beforeSend: function() {
                    
                        var loadingText = settings.imgurl;                       
                        btn.data(settings.originaltext, $(this).html());
                        btn.html(loadingText);
                               
                    },
                    success: function(data) {

                        $.each(data.error, function(i, v) {
                            if (v == true) {
                                location.reload();
                            } else {
                                var msg = '<label class="error" for="' + i + '">' + v + '</label>';
                                $('input[name="' + i + '"], select[name="' + i + '"], textarea[name="' + i + '"], input[data-error="' + i + '"]').addClass('inputTxtError').after(msg);
                                btn.html('Send'); 

                            }

                        });

                        var keys = Object.keys(data);
                        $('input[name="' + keys[0] + '"]').focus();
                        $('select[name="' + keys[0] + '"]').focus();
                        $('textarea[name="' + keys[0] + '"]').focus();
                    },

                    // remember that's why calling success message placed here in error: function because when you used new FormData(this)
                    // it's hard to read the data from controller from success: function(data)
                    error: function(xhr, err) {
                        if (xhr.status == 200) {
                          

                            // checks if file input upload is not empty, then do the logic
                            if (file) {                   

                                $.when(btn.html('Form submitted successfully')).done(function() {
                                    alert(settings.alertmsg);
                                });                             


                                //updates order status message without refresh the page from table data tables
                                $("table#orders").find("tbody tr").each(function() {
                                    var $this = $(this);
                                    if ($this.index() === count_row) {
                                        if (settings.statusmsg.length > 0) {
                                            $this.find('a').eq(2).text(settings.statusmsg);
                                        }
                                        if (settings.datatarget.length > 0) {
                                            $this.find('a').eq(2).attr('data-target', settings.datatarget);
                                        }

                                    }
                                });

                            } else {

                                if (settings.showMessage) {
                                    alert('Nothing has changed');
                                    
                                } else {
                                    location.reload();
                                }
                            }

                            // if reload set to true evertime user click alert message for success will reloads the page.
                            if (settings.reload) {
                                location.reload();

                            }

                            // use this catch server internal error response.
                        } else if (xhr.status == 500) {
                            btn.html('Send');
                            alert('500 (Internal Server Error)');

                        }
                    }
                });

                function resetErrors() {
                    $('form input, form select, form textarea').removeClass('inputTxtError');
                    $('label.error').remove();
                }
            });
        });

    };

}(jQuery));