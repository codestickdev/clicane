(function($){
    function validateForm(form){
        let inputs = form.find('input'),
            textarea = form.find('textarea'),
            response = [];

        inputs.each(function(){
            let name = $(this).attr('name');
            if(!$(this).attr('optional')){
                if($(this).val() == ''){
                    response.push(name);
                }
            }
        });

        if(textarea.val() === ''){
            response.push(textarea.attr('name'));
        }

        // if(!checkbox.parent().hasClass('checked')){
        //     response.push(checkbox.attr('name'));
        // }

        if(response.length === 0){
            response = true;
        }

        return response;
    }

    function cleanForm(form){
        let inputs = form.find('input'),
            textarea = form.find('textarea');
            // checkbox = form.find('input[type="checkbox"]');

        inputs.each(function(){
            $(this).removeClass('input-error');
        });

        textarea.removeClass('input-error');
        // checkbox.parent().removeClass('input-error');

        $('.contactForm__alert').removeClass('contactForm__alert--visible');
        $('.contactForm__alert').removeClass('contactForm__alert--error');
    }

    $(document).ready(function(){
        let form = $('#contactForm');

        $(form).on('submit', function(e){
            e.preventDefault();
            let validate = validateForm(form);
            cleanForm(form);

            let phone = form.find('input[name="contactPhone"]').val(),
                mail = form.find('input[name="contactMail"]').val(),
                message = form.find('textarea[name="contactMessage"]').val();

            if(validate == true){
                let data = {
                    action: 'contactForm',
                    mail: mail,
                    phone: phone,
                    message: message,
                }
                $.ajax({
                    type: 'POST',
                    url: clic.ajaxurl,
                    data: data,

                    beforeSend: function(){
                        form.addClass('loading');
                    },
                    success: function(response){
                        console.log(response);
                        form.removeClass('loading');

                        if(response == true || response == 'true'){
                            cleanForm(form);

                            // clear values
                            let inputs = form.find('input'),
                                textarea = form.find('textarea');

                            inputs.each(function(){
                                $(this).val('');
                            });
                            textarea.val('');

                            // show alert
                            $('.contactForm__alert').addClass('contactForm__alert--visible');

                            // add notice
                            if($('html').attr('lang') == 'en-US'){
                                $('.contactForm__alert p').html('The form has been successfully sent.');
                            }else{
                                $('.contactForm__alert p').html('Formularz został pomyślnie wysłany.');
                            }
                        }else{
                            $('.contactForm__alert').addClass('contactForm__alert--visible');
                            $('.contactForm__alert').addClass('contactForm__alert--error');

                            if($('html').attr('lang') == 'en-US'){
                                $('.contactForm__alert p').html('There was an error sending the form. Please try again later.');
                            }else{
                                $('.contactForm__alert p').html('Wystąpił błąd podczas wysyłania formularza. Spróbuj ponownie później.');
                            }
                        }
                    }
                });
            }else{
                $(validate).each(function(index, name){
                    console.log(name);
                    if(name == 'contactAcceptance'){
                        $('.contactForm__acceptance').addClass('input-error');
                    }else{
                        $('input[name="' + name + '"]').addClass('input-error');
                        $('textarea[name="' + name + '"]').addClass('input-error');
                    }
                });
            }
        });
    });
}(jQuery));