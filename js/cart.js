document.addEventListener('DOMContentLoaded', () => {
  const API_PATH = '../components/cart_api.php';

  document.querySelectorAll('.addToCart').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      const name = btn.dataset.name;
      const description = btn.dataset.description;
      const price = btn.dataset.price;

      fetch(API_PATH, {
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
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;

      fetch(API_PATH, {
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