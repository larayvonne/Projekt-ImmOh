document.addEventListener('DOMContentLoaded', () => {
  const API_PATH = '../components/cart_api.php';

  document.querySelectorAll('.addToCart').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      const name = btn.dataset.name;

      fetch(API_PATH, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'add', id })
      })
      .then(response => {
        if (response.ok) {
          const prod = name || 'Produkt';
          alert(`${prod} wurde dem Warenkorb hinzugefügt.`);
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
