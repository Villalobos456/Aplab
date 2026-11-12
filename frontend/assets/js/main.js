(function () {
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('site-nav');
  var header = document.querySelector('.site-header');
  var subs = document.querySelectorAll('.has-sub');
  if (!toggle || !nav) return;

  function closeSubs(except) {
    subs.forEach(function (li) {
      if (li === except) return;
      li.classList.remove('open');
      li.querySelector('.nav-btn').setAttribute('aria-expanded', 'false');
    });
  }

  function closeMenu() {
    nav.classList.remove('open');
    toggle.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Abrir menú');
    closeSubs();
  }

  toggle.addEventListener('click', function () {
    var open = nav.classList.toggle('open');
    toggle.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    if (!open) closeSubs();
  });

  subs.forEach(function (li) {
    var btn = li.querySelector('.nav-btn');
    btn.addEventListener('click', function () {
      var willOpen = !li.classList.contains('open');
      closeSubs(li);
      li.classList.toggle('open', willOpen);
      btn.setAttribute('aria-expanded', String(willOpen));
    });
  });

  // Al elegir un enlace, se cierra todo
  nav.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', closeMenu);
  });

  // Clic fuera del header
  document.addEventListener('click', function (e) {
    if (!header.contains(e.target)) closeMenu();
  });

  // Escape cierra y devuelve el foco
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeMenu();
      toggle.focus();
    }
  });

  // Si se agranda la pantalla, se reinicia el estado móvil
  window.matchMedia('(min-width: 961px)').addEventListener('change', closeMenu);
})();

/* ---------- Visor de figuras ---------- */
(function () {
  var dlg = document.getElementById('lightbox');
  if (!dlg || typeof dlg.showModal !== 'function') return;
  var img = dlg.querySelector('img');
  var scroll = dlg.querySelector('.lb-scroll');

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.fig-btn');
    if (!btn) return;
    img.src = btn.getAttribute('data-full');
    img.alt = btn.querySelector('img').alt;
    img.classList.remove('full');
    scroll.scrollTo(0, 0);
    dlg.showModal();
  });

  img.addEventListener('click', function () {
    img.classList.toggle('full');
  });

  dlg.querySelector('.lb-close').addEventListener('click', function () { dlg.close(); });
  dlg.addEventListener('click', function (e) { if (e.target === dlg) dlg.close(); });
})();

/* ---------- Índice lateral: sección activa ---------- */
(function () {
  var links = document.querySelectorAll('.toc a');
  if (!links.length || !('IntersectionObserver' in window)) return;
  var map = {};
  links.forEach(function (a) { map[a.getAttribute('href').slice(1)] = a; });
  var targets = Object.keys(map).map(function (id) { return document.getElementById(id); }).filter(Boolean);

  var obs = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) {
        links.forEach(function (a) { a.classList.remove('is-active'); });
        var a = map[en.target.id];
        if (a) a.classList.add('is-active');
      }
    });
  }, { rootMargin: '-90px 0px -65% 0px', threshold: 0 });

  targets.forEach(function (t) { obs.observe(t); });
})();

/* ---------- Aparición suave al hacer scroll ---------- */
(function () {
  var items = document.querySelectorAll('[data-reveal]');
  if (!items.length) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduce || !('IntersectionObserver' in window)) {
    items.forEach(function (el) { el.classList.add('in'); });
    return;
  }
  var obs = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) {
        en.target.classList.add('in');
        obs.unobserve(en.target);
      }
    });
  }, { threshold: 0.12 });
  items.forEach(function (el) { obs.observe(el); });
})();
