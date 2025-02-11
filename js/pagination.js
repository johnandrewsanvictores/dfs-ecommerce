$(document).ready(function() {
    const itemsPerPage = 18;
    const $products = $('.product-list .card');
    const $pagination = $('.pagination');
    const totalPages = Math.ceil($products.length / itemsPerPage);

    function showPage(page) {
        $products.hide();
        $products.slice((page - 1) * itemsPerPage, page * itemsPerPage).show();
        $pagination.find('a').removeClass('active');
        $pagination.find(`a[data-page="${page}"]`).addClass('active');
    }

    function createPagination() {
        $pagination.empty();
        $pagination.append('<a href="#" data-page="prev">&laquo;</a>');
        for (let i = 1; i <= totalPages; i++) {
            $pagination.append(`<a href="#" data-page="${i}">${i}</a>`);
        }
        $pagination.append('<a href="#" data-page="next">&raquo;</a>');
    }

    $pagination.on('click', 'a', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        const currentPage = $pagination.find('a.active').data('page');

        if (page === 'prev') {
            page = currentPage > 1 ? currentPage - 1 : 1;
        } else if (page === 'next') {
            page = currentPage < totalPages ? currentPage + 1 : totalPages;
        }

        showPage(page);
    });

    createPagination();
    showPage(1);
});
