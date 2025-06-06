document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.addToCart').forEach(btn => {
    btn.addEventListener('click', function () {
      const id = this.dataset.id;
      const name = this.dataset.name;
      const description  = this.dataset.description;
      const price = this.dataset.price;

      fetch('../php/cart_api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'add', id, description, name, price })
      })
      .then(response => {
        if (response.ok) {
          alert(`${name} wurde dem Warenkorb hinzugefügt.`);
        } else {
          alert('Fehler beim Hinzufügen zum Warenkorb.');
        }
      });
    });
  });

  document.querySelectorAll('.removeFromCart').forEach(btn => {
    btn.addEventListener('click', function () {
      const id = this.dataset.id;

      fetch('cart_api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'remove', id })
      })
      .then(response => {
        if (response.ok) {
          location.reload();
        } else {
          alert('Fehler beim Entfernen aus dem Warenkorb.');
        }
      });
    });
  });
});