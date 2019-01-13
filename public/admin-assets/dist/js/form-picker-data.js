/*FormPicker Init*/

$(document).ready(function() {
    "use strict";

    if ($('.datepicker').length) {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            showTodayButton: true,
            allowInputToggle: true,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                today: 'fa fa-bell',
            },
        }).data("DateTimePicker").date(moment());
    }

    if ($('.datetimepicker').length) {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false,
            showTodayButton: true,
            allowInputToggle: true,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                today: 'fa fa-bell',
            },
        }).data("DateTimePicker").date(moment());
    }

    if ($('.simple-colorpicker').length) {
        /* Bootstrap Colorpicker Init*/
        $('.simple-colorpicker').colorpicker();
    }
});