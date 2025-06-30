document.querySelectorAll('.addToCart').forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault(); //  Verhindert "Nach-oben-Springen"!
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


document.querySelectorAll('.addToCartWohnung').forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const id = button.getAttribute('data-id');
    window.location.href = `${window.location.pathname}?wohnung_id=${id}`;
  });
});