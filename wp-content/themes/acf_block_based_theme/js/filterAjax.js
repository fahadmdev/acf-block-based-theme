jQuery(document).ready(function ($) {
    // Function to handle filter changes
    function handleFilterChange() {
        var filter = {};

        $('#filter-form .term-checkbox:checked').each(function () {
            var taxonomy = $(this).attr('name').replace('[]', '');
            if (!(taxonomy in filter)) {
                filter[taxonomy] = [];
            }
            filter[taxonomy].push($(this).val());
        });

        // Show loading indicator
        $('.filtered-data').html('<p>Loading...</p>');

        $.ajax({
            url: ajax_filter_params.ajax_url, // Ensure this is set correctly
            type: 'POST',
            cache: false, // Disable caching
            data: {
                action: 'filter_search',
                filter: filter
            },
            success: function (response) {
                $('.filtered-data').html(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $('.filtered-data').html('<p>An error occurred. Please try again.</p>');
            }
        });
    }

    // Attach the filter change handler to the checkbox click event
    $(document).on('change', '#filter-form .term-checkbox', handleFilterChange);
});
