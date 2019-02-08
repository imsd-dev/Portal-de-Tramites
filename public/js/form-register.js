/* VALIDACION REGISTRO*/
/*
 Name: 			form - Register
 Written by: 	Penalolen Themes - (http://www.gdm.cl)
 Version: 		4.7.0 - 1.0
 */

(function ($) {

    'use strict';

    /*
     Contact Form: Basic
     */
    $('#register').validate({
        submitHandler: function (form) {

            var $form = $(form),
                    //	$messageSuccess = $('#contactSuccess'),
                    //	$messageError = $('#contactError'),
                    $submitButton = $(this.submitButton),
                    $errorMessage = $('#mailErrorMessage');

            $submitButton.button('loading');

            // Ajax Submit
            $.ajax({
                type: 'POST',
                url: $form.attr('action'),
                data: {
                    //	name: $form.find('#name').val(),
                    //	email: $form.find('#email').val(),
                    //	subject: $form.find('#subject').val(),
                    //	message: $form.find('#message').val()
                }
            }).always(function (data, textStatus, jqXHR) {

                $errorMessage.empty().hide();

                if (data.response == 'success') {

                    $messageSuccess.removeClass('hidden');
                    $messageError.addClass('hidden');

                    // Reset Form
                    $form.find('.form-control')
                            .val('')
                            .blur()
                            .parent()
                            .removeClass('has-success')
                            .removeClass('has-error')
                            .find('label.error')
                            .remove();

                    if (($messageSuccess.offset().top - 80) < $(window).scrollTop()) {
                        $('html, body').animate({
                            scrollTop: $messageSuccess.offset().top - 80
                        }, 300);
                    }

                    $submitButton.button('reset');

                    return;

                } else if (data.response == 'error' && typeof data.errorMessage !== 'undefined') {
                    $errorMessage.html(data.errorMessage).show();
                } else {
                    $errorMessage.html(data.responseText).show();
                }

                $messageError.removeClass('hidden');
                $messageSuccess.addClass('hidden');

                if (($messageError.offset().top - 80) < $(window).scrollTop()) {
                    $('html, body').animate({
                        scrollTop: $messageError.offset().top - 80
                    }, 300);
                }

                $form.find('.has-success')
                        .removeClass('has-success');

                $submitButton.button('reset');

            });
        }
    });



}).apply(this, [jQuery]);	