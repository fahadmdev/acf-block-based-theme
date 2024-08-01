jQuery(document).ready(function ($) {

    // Click event handler for the "Show All" button
    $('.show-all').on('click', function (e) {
        e.preventDefault();
        var $container = $(this).closest('.taxonomy-container');
        var $terms = $container.find('.taxonomy-terms li');

        if ($(this).hasClass('expanded')) {
            $terms.slice(5).hide();
            $(this).removeClass('expanded').text('Show All');
        } else {
            $terms.show();
            $(this).addClass('expanded').text('Show Less');
        }
    });

    // Initialize each taxonomy container
    $('.taxonomy-container').each(function () {
        var $container = $(this);
        var $terms = $container.find('.taxonomy-terms li');

        // Hide terms after the first 5
        $terms.slice(5).hide();

        // Check the number of terms and show/hide the "Show All" button
        if ($terms.length <= 5) {
            $container.find('.show-all').hide();
        }
    });
});
