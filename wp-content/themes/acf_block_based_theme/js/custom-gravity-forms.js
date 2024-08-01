jQuery(document).ready(function ($) {
    var fieldId = 'field_1_25';
    var maxVisibleOptions = 5;
    var isAllShown = false;


    function showAllOptions() {
        $('#' + fieldId + ' .gchoice').show();
        isAllShown = true;
    }


    function showLimitedOptions() {
        $('#' + fieldId + ' .gchoice').each(function (index) {
            if (index >= maxVisibleOptions) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
        isAllShown = false;
    }

    // Add "Show All" link
    $('#' + fieldId).append('<div class="show-all-container"><a href="#" class="show-all">Show All</a></div>');

    // Handle click on "Show All" link
    $('#' + fieldId + ' .show-all').on('click', function (e) {
        e.preventDefault();
        if (isAllShown) {
            showLimitedOptions();
            $(this).text('Show All');
        } else {
            showAllOptions();
            $(this).text('See Less');
        }
    });


    showLimitedOptions();
});
