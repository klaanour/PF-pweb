document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.add-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'product_id=' + id
            })
            .then(res => res.text())
            .then(() => {
                showMessage('Item added to cart');
            });
        });
    });
});

function showMessage(text) {
    let msg = document.createElement('div');
    msg.className = 'success-msg';
    msg.innerText = text;
    document.body.prepend(msg);

    setTimeout(() => {
        msg.remove();
    }, 2000);
}
