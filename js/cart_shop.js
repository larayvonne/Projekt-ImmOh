document.addEventListener('DOMContentLoaded', () => {
  console.log('cart_shop.js geladen');

  document.querySelectorAll('.addToCart').forEach(button => {
    button.addEventListener('click', (event) => {
      event.preventDefault();

      const id = button.dataset.id;

      fetch('../components/add_to_cart_ajax_shop.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          productId: id,
          type: 'secondhand'  // <---- wichtig!
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert('Produkt wurde zum Warenkorb hinzugefügt!');
        } else {
          alert('Fehler beim Hinzufügen: ' + (data.message || 'Unbekannter Fehler'));
        }
      })
      .catch(error => {
        console.error('AJAX-Fehler:', error);
      });
    });
  });
});