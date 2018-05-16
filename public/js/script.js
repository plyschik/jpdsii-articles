$(document).ready(function () {
    $.typeahead({
        input: '.typeahead-search',
        minLength: 2,
        maxItem: 4,
        dynamic: true,
        delay: 750,
        display: ['title'],
        href: function (item) {
            return '/jpdsii-articles/public/article/' + item.id;
        },
        source: {
            ajax: {
                url: '/jpdsii-articles/public/api/search',
                data: {
                    query: "{{query}}"
                }
            }
        }
    });
});