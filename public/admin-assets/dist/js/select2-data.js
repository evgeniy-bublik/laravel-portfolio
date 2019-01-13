/*Form advanced Init*/
$(document).ready(function() {
"use strict";

    /* Select2 Init*/
    if ($(".select2").length) {
        $(".select2").select2();
    }

    if ($(".select2-taggable").length) {
        $(".select2-taggable").select2({
            tags: true,
        });
    }

});