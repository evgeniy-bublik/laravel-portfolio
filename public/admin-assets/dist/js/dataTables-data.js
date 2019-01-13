/*DataTable Init*/

"use strict";

$(document).ready(function() {
    "use strict";

    if ($('#data-table-portfolio-categories').length) {
        $('#data-table-portfolio-categories').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-portfolio-categories').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'display_order'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-portfolio-works').length) {
        $('#data-table-portfolio-works').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-portfolio-works').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'date'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-blog-categories').length) {
        $('#data-table-blog-categories').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-blog-categories').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'display_order'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-blog-tags').length) {
        $('#data-table-blog-tags').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-blog-tags').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'display_order'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-blog-posts').length) {
        $('#data-table-blog-posts').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-blog-posts').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'slug'},
                {data: 'date'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-social-links').length) {
        $('#data-table-social-links').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-social-links').data('ajax-url'),
            columns: [
                {data: 'link'},
                {data: 'display_order'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-professional-skills').length) {
        $('#data-table-professional-skills').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-professional-skills').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'value'},
                {data: 'display_order'},
                {data: 'active'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-blog-comments').length) {
        $('#data-table-blog-comments').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-blog-comments').data('ajax-url'),
            columns: [
                {data: 'post.name', orderable: 'false', searchable: false},
                {data: 'user_name'},
                {data: 'user_email'},
                {data: 'active'},
                {data: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-pages').length) {
        $('#data-table-pages').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-pages').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'url'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

    if ($('#data-table-supports').length) {
        $('#data-table-supports').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#data-table-supports').data('ajax-url'),
            columns: [
                {data: 'name'},
                {data: 'email'},
                {data: 'subject'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });
    }

});