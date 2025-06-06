document.addEventListener('mousemove', function(e) {
  const x = (e.clientX / window.innerWidth - 0.5) * 20;
  const y = (e.clientY / window.innerHeight - 0.5) * 20;

  const bg = document.querySelector('.geo-bg');
  bg.style.transform = `translate3d(${x}px, ${y}px, 0)`;
});