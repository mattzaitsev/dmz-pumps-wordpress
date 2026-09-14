document.addEventListener('DOMContentLoaded', function () {
  const slider = document.querySelector('[data-dmz-slider]');
  if (!slider) return;

  const slides = Array.from(slider.querySelectorAll('.dmz-slide'));
  const dots = Array.from(slider.querySelectorAll('[data-dmz-dot]'));
  const prev = slider.querySelector('[data-dmz-prev]');
  const next = slider.querySelector('[data-dmz-next]');
  let index = 0;
  let timer;

  function show(i) {
    index = (i + slides.length) % slides.length;
    slides.forEach((slide, n) => slide.classList.toggle('is-active', n === index));
    dots.forEach((dot, n) => dot.classList.toggle('is-active', n === index));
  }

  function restart() {
    clearInterval(timer);
    timer = setInterval(() => show(index + 1), 6500);
  }

  if (prev) prev.addEventListener('click', () => { show(index - 1); restart(); });
  if (next) next.addEventListener('click', () => { show(index + 1); restart(); });
  dots.forEach(dot => dot.addEventListener('click', () => { show(Number(dot.dataset.dmzDot)); restart(); }));

  slider.addEventListener('mouseenter', () => clearInterval(timer));
  slider.addEventListener('mouseleave', restart);
  restart();
});
