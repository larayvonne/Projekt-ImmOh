document.querySelectorAll('.addToCartWohnung').forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault(); // Kein Reload
    const id = button.dataset.id;

    fetch('../components/add_to_cart_ajax_wohnungen.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'wohnung_id=' + encodeURIComponent(id)
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(`Wohnung hinzugefügt!`);
      } else {
        alert('Fehler beim Hinzufügen');
      }
    })
    .catch(err => {
      console.error('AJAX Fehler:', err);
    });
  });
});