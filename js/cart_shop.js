document.querySelectorAll('.addToCart').forEach(button => {
  button.addEventListener('click', e => {
    e.preventDefault();
    const id = button.dataset.id;

    fetch('../components/cart_shop_api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ productId: id })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.message); // oder schöner: Toast-Nachricht
      } else {
        alert("Fehler: " + data.message);
      }
    });
  });
});