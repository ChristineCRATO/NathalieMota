console.log("Filter Photo JS is Open !");

jQuery(document).ready(function($) {
    console.log('test script loaded');

    $('.dropdown').each(function() {
        const $dropdown = $(this);
        const $button = $dropdown.find('.btnDrop'); // Button Toggle Dropdown
        const $list = $dropdown.find('.listDrop'); // Dropdown List
        const $items = $list.find('li'); // List Item inside Dropdown

        // Toggle Dropdown Button Click
        $button.on('click', function(event) {
            event.stopPropagation();
            $dropdown.toggleClass('open');
        });

        // Update Button text Close Dropdown when Item Click
        $items.on('click', function(event) {
                event.stopPropagation();
                const $item = $(this);
                $button.text($item.text()); // Set Button Text Select ItemText
                $button.data('value', $item.data('value')); // Set Data Attr to Store Iten Value
                
                $items.removeClass('selected-option');
                $item.addClass('selected-option');
                
                $dropdown.removeClass('open'); // Close Dropdown
                updateFilter(); // Call Fonction to Update Filter
            });

        const selectedValue = $button.data('value');
        $items.each(function() {
            const $item = $(this);
            if ($item.data('value') === selectedValue) {
                $item.addClass('selected-option');
            } else {
                $item.removeClass('selected-option');
            }
        })

    });

        // Close Dropdown if Click Outside
        $(document).on('click', function(event) {
            $('.dropdown.open').each(function() {
                const $dropdown = $(this);
            // Check Click Outside Dropdown
            if (!$dropdown.is(event.target) && $dropdown.has(event.target).length === 0) { // Corrected condition check Click Outside
                $dropdown.removeClass('open'); // Close Dropdown
            }
        });
    });
    
        // Fonction Triggers AJAX Filtering when Filter Changes //
        function updateFilter() {
            // Retrieve the Values ​​for the Filters //
            var categorie = $('#categorieFilter .btnDrop').data('value') || '';
            var format = $('#formatFilter .btnDrop').data('value') || '';
            var sort = $('#sortFilter .btnDrop').data('value') || '';

            // AJAX Request Filter Photos //
            $.ajax({
                url: myUrlAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_photo',
                    categorie: categorie,
                    format: format,
                    sort: sort
                },
                beforeSend: function() {
                    console.log('sending data...');
                    $('#load-more').hide();
                },
                success: function(response) {
                    console.log("ajax response:", response);
                    // Replace HTML Content #photoFilter with new Filter Photo
                    $('.initialBlock').empty().html(response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error', error);
                    $('#load-more').show();
                }
            });
        }
    });