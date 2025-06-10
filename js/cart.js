document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.addToCart').forEach(btn => {
    btn.addEventListener('click', function () {
      const id = this.dataset.id;
      const name = this.dataset.name;
      const price = this.dataset.price;
      fetch('../php/cart_api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'add', id, name, price })
      }).then(r => r.json()).then(() => {
        alert(`${name} wurde dem Warenkorb hinzugefügt.`);
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
      }).then(r => r.json()).then(() => {
        location.reload();
      });
    });
  });
});
