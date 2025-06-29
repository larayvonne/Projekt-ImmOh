document.addEventListener('DOMContentLoaded', () => {
  const API_PATH = '../components/cart_api.php';

  document.querySelectorAll('.addToCart').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      fetch(API_PATH, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'add', id })
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert(`${data.name} wurde dem Warenkorb hinzugefügt.`);
          } else {
            alert(data.message || 'Fehler beim Hinzufügen zum Warenkorb.');
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
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            location.reload();
          } else {
            alert(data.message || 'Fehler beim Entfernen aus dem Warenkorb.');
          }
        });
    });
  });
});
