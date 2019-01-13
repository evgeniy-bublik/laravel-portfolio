/*Rangeslider Init*/

$(document).ready(function() {
    "use strict";

    if ($(".percentage-range").length) {
        $(".percentage-range").ionRangeSlider({
            max: 100,
            min: 0,
        });
    }

});