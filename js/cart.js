document.querySelectorAll('.addToCart').forEach(button => {
  button.addEventListener('click', e => {
    const id = button.dataset.id;

    fetch('../components/cart_api.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ productId: id })
    })
    .then(res => res.json())
    .then(data => {
      alert('Zum Warenkorb hinzugefügt!');
    });
  });
});