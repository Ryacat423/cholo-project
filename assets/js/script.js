let filterItems = (category) => {
    const productItems = document.querySelectorAll('.product-item');

    productItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category');

        if (category === 'All' || itemCategory === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
})