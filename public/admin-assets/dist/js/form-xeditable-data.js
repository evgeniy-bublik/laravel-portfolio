/*FormXeditable Init*/
$(function(){
  	"use strict";

    if ($('.simple-xeditable').length) {
        $('.simple-xeditable').editable({
            'ajaxOptions': {
                type: 'put',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        });
    }
});