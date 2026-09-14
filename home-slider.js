document.addEventListener('DOMContentLoaded', function () {
  const slider = document.querySelector('[data-dmz-slider]');
  if (!slider) return;

  const slides = Array.from(slider.querySelectorAll('.dmz-slide'));
  const dots = Array.from(slider.querySelectorAll('.dmz-slide-dot'));
  const prev = slider.querySelector('.dmz-slide-prev');
  const next = slider.querySelector('.dmz-slide-next');
  let index = 0;
  let timer;

  function show(i) {
    index = (i + slides.length) % slides.length;
    slides.forEach((slide, n) => slide.classList.toggle('is-active', n === index));
    dots.forEach((dot, n) => {
      dot.classList.toggle('is-active', n === index);
      dot.setAttribute('aria-selected', n === index ? 'true' : 'false');
    });
  }

  function restart() {
    clearInterval(timer);
    timer = setInterval(() => show(index + 1), 6000);
  }

  if (prev) prev.addEventListener('click', () => { show(index - 1); restart(); });
  if (next) next.addEventListener('click', () => { show(index + 1); restart(); });
  dots.forEach((dot, n) => dot.addEventListener('click', () => { show(n); restart(); }));

  slider.addEventListener('mouseenter', () => clearInterval(timer));
  slider.addEventListener('mouseleave', restart);
  show(0);
  restart();
});
