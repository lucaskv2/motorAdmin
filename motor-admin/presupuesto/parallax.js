window.addEventListener('load', () => {
  const fila = document.querySelector('.servicios-fila');
  let position = 100;
  const speed = 2;

  function animate() {
    if (position > 0) {
      position -= speed;
      fila.style.transform = `translateY(${position}px)`;
      requestAnimationFrame(animate);
    } else {
      fila.style.transform = `translateY(0px)`;
    }
  }

  animate();
});

