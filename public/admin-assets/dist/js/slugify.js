$(document).ready(function() {
    "use strict";

    if ($('.slugify').length) {
        $('.slugify').slugify($('.slugify').data('source'), {
            truncate: 255,
        });
    }
});