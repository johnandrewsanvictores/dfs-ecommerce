document.addEventListener('DOMContentLoaded', function() {
    const sortBy = document.getElementById('sort-by');
    const applyFiltersBtn = document.getElementById('apply-filters');
    const priceMin = document.getElementById('price-min');
    const priceMax = document.getElementById('price-max');
    const productList = document.querySelector('.product-list');
    const allCards = Array.from(document.querySelectorAll('#products .card'));

    sortBy.addEventListener('change', () => {
        if (sortBy.value === 'default') {
            priceMin.value = '';
            priceMax.value = '';
            resetAndSortProducts();
        }
    });

    applyFiltersBtn.addEventListener('click', applyFilters);

    function resetAndSortProducts() {
        let filteredCards = allCards;

        if (sortBy.value === 'discounted') {
            filteredCards.sort((a, b) => parseInt(a.dataset.price) - parseInt(b.dataset.price));
        } else if (sortBy.value === 'new-arrival' || sortBy.value === 'popular') {
            filteredCards.sort((a, b) => parseInt(b.dataset.price) - parseInt(a.dataset.price));
        }

        productList.innerHTML = '';
        filteredCards.forEach(card => {
            productList.appendChild(card);
        });
    }

    function applyFilters() {
        const sortValue = sortBy.value;
        const minPrice = priceMin.value ? parseInt(priceMin.value) : 0;
        const maxPrice = priceMax.value ? parseInt(priceMax.value) : Infinity;
        let filteredCards = allCards;

        filteredCards = filteredCards.filter(card => {
            const cardPrice = parseInt(card.dataset.price);
            return (cardPrice >= minPrice && cardPrice <= maxPrice);
        });

        if (sortValue !== 'default') {
            filteredCards = filteredCards.filter(card => card.dataset.category === sortValue);
        }

        if (sortValue === 'discounted') {
            filteredCards.sort((a, b) => parseInt(a.dataset.price) - parseInt(b.dataset.price));
        } else if (sortValue === 'new-arrival' || sortValue === 'popular') {
            filteredCards.sort((a, b) => parseInt(b.dataset.price) - parseInt(a.dataset.price));
        }

        productList.innerHTML = '';
        filteredCards.forEach(card => {
            productList.appendChild(card);
        });
    }
});
