document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form[action="cart.php"] input[name="add"]');

    forms.forEach(button => {
        button.addEventListener('click', () => {
            alert('Product added to cart!');
        });
    });
});


