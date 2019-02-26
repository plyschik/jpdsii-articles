window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;

require('bootstrap');
require('jquery-typeahead');

$(document).ready(function () {
    $.typeahead({
        input: '.typeahead-search',
        minLength: 2,
        maxItem: 4,
        dynamic: true,
        delay: 750,
        display: ['title'],
        href: function (item) {
            return '/article/' + item.id;
        },
        source: {
            ajax: {
                url: '/api/search',
                data: {
                    query: "{{query}}"
                }
            }
        }
    });
});