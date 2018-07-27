$(function() {
    $(document).on('submit', '#contact-form', function( e ) {
        e.preventDefault();

        sendAjaxForm($(this));
    });

    $(document).on('submit', '#comment-form', function( e ) {
        e.preventDefault();

        sendAjaxForm($(this));
    });

    // validate rules contact form
    $("#contact-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            email: {
                required: true,
                email: true,
                maxlength: 100,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            site: {
                required: false,
                url: true,
                maxlength: 100,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            subject: {
                required: true,
                maxlength: 255,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            text: {
                required: true,
                normalizer: function(value) {
                  return $.trim(value);
                }
            }
        }
    });

    // validate rules comment form
    $("#comment-form").validate({
        rules: {
            user_name: {
                required: true,
                maxlength: 100,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            user_email: {
                required: true,
                email: true,
                maxlength: 100,
                normalizer: function(value) {
                  return $.trim(value);
                }
            },
            text: {
                required: true,
                normalizer: function(value) {
                  return $.trim(value);
                }
            }
        }
    });
});

// send ajax form
function sendAjaxForm(form)
{
    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: $(form).serialize(),
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function(data) {
        if (data.status) {
            $(form)[0].reset();
        }

        $(document).find('#dynamic-modal .modal-content').replaceWith(data.content);
        $(document).find('#dynamic-modal').modal();
    });
}

$.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /[a-z]+@[a-z]+\.[a-z]+/.test( value );
}