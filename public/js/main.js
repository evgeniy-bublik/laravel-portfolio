$(function() {
    $(document).on('submit', '#contact-form', function( e ) {
        e.preventDefault();

        sendAjaxForm($(this));
    });

    $(document).on('submit', '#comment-form', function( e ) {
        e.preventDefault();

        sendAjaxForm($(this));
    });
});

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