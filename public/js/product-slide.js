
function scrollCategory(categoryId, direction) {
    const container = document.getElementById('category-' + categoryId);
    const scrollAmount = 300;

    container.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}