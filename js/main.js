document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const productCard = e.target.closest('.product-card');
            const productName = productCard.querySelector('h3').textContent;
            const productPrice = productCard.querySelector('.price').textContent;
            
            cart.push({
                name: productName,
                price: productPrice
            });

            alert(`${productName} added to cart!`);
            updateCartCount();
        });
    });

    function updateCartCount() {
        const cartLink = document.querySelector('a[href="#cart"]');
        cartLink.textContent = `Cart (${cart.length})`;
    }
});