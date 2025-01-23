document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');

    searchIcon.addEventListener('click', () => {
        if (searchBar.style.display === 'flex') {
            searchBar.style.display = 'none';
        } else {
            searchBar.style.display = 'flex';
        }
    });
});