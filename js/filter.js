$(document).ready(function() {
    $('#show-price-range').click(function() {
        $('#price-range-section').toggleClass('hidden');
    });

    $('#apply-filters').click(function() {
        var sortBy = $('#sort-by').val();
        var priceMin = parseInt($('#price-min').val()) || 0;
        var priceMax = parseInt($('#price-max').val()) || Infinity;

        $('.product-list .card').each(function() {
            var price = parseInt($(this).data('price'));
            var sort = $(this).data('sort');

            var show = true;

            if (!$('#price-range-section').hasClass('hidden')) {
                if (price < priceMin || price > priceMax) {
                    show = false;
                }
            }

            if (sortBy !== 'default' && sort !== sortBy) {
                show = false;
            }

            if (show) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});