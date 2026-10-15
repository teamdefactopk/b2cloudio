// b2cloud.io site interactions: header state, mobile menu, mega menu, search panel,
// scroll reveals, cookie notice, back-to-top and disabled-item toasts.
(function () {
  'use strict';
  var doc = document.documentElement;
  var header = document.querySelector('.site-header');
  var toTop = document.querySelector('.to-top');
  var toast = document.getElementById('toast');

  function onScroll() {
    var y = window.scrollY || 0;
    if (header) header.classList.toggle('scrolled', y > 8);
    if (toTop) toTop.classList.toggle('show', y > 600);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Mobile menu
  var menuBtn = document.querySelector('[data-menu]');
  var nav = document.getElementById('main-nav');
  if (menuBtn && nav) {
    menuBtn.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      menuBtn.setAttribute('aria-expanded', String(open));
    });
  }

  // Services menu: tap to open on touch / small screens
  document.querySelectorAll('.has-menu > a').forEach(function (a) {
    a.addEventListener('click', function (ev) {
      if (window.matchMedia('(max-width: 980px)').matches) {
        var item = a.parentElement;
        if (!item.classList.contains('open')) {
          ev.preventDefault();
          item.classList.add('open');
        }
      }
    });
  });

  // Search panel
  var panel = document.getElementById('search-panel');
  var openBtn = document.querySelector('[data-search-open]');
  var closeBtn = document.querySelector('[data-search-close]');
  function setSearch(open) {
    if (!panel) return;
    panel.hidden = !open;
    if (openBtn) openBtn.setAttribute('aria-expanded', String(open));
    if (open) { var i = panel.querySelector('input'); if (i) i.focus(); }
  }
  if (openBtn) openBtn.addEventListener('click', function () { setSearch(panel.hidden); });
  if (closeBtn) closeBtn.addEventListener('click', function () { setSearch(false); openBtn && openBtn.focus(); });
  document.addEventListener('keydown', function (ev) {
    if (ev.key === 'Escape') {
      setSearch(false);
      if (nav) { nav.classList.remove('open'); menuBtn && menuBtn.setAttribute('aria-expanded', 'false'); }
    }
    if (ev.key === '/' && !/input|textarea|select/i.test((document.activeElement || {}).tagName || '')) {
      ev.preventDefault();
      setSearch(true);
    }
  });

  // Scroll reveal (content is visible by default without JS or with reduced motion)
  var reveals = document.querySelectorAll('.reveal, .step');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if ('IntersectionObserver' in window && doc.classList.contains('anim') && !reduce) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('in'); });
  }

  // Disabled items: explain instead of doing nothing
  function showToast(msg) {
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(showToast.t);
    showToast.t = setTimeout(function () { toast.classList.remove('show'); }, 2400);
  }
  document.querySelectorAll('[aria-disabled="true"]').forEach(function (el) {
    el.setAttribute('tabindex', '0');
    function explain(ev) { ev.preventDefault(); showToast(el.getAttribute('title') || 'Coming soon'); }
    el.addEventListener('click', explain);
    el.addEventListener('keydown', function (ev) { if (ev.key === 'Enter' || ev.key === ' ') explain(ev); });
  });

  // Cookie notice
  var cookie = document.getElementById('cookie');
  try {
    if (cookie && !localStorage.getItem('b2c_cookie_ok')) cookie.hidden = false;
  } catch (e) { /* storage unavailable: keep hidden */ }
  var ok = document.querySelector('[data-cookie-ok]');
  if (ok) ok.addEventListener('click', function () {
    cookie.hidden = true;
    try { localStorage.setItem('b2c_cookie_ok', '1'); } catch (e) {}
  });

  // Light client-side validation for the contact form (server validates too)
  var form = document.querySelector('form[data-validate]');
  if (form) {
    form.addEventListener('submit', function (ev) {
      if (!form.checkValidity()) {
        ev.preventDefault();
        var bad = form.querySelector(':invalid');
        if (bad) { bad.focus(); if (bad.reportValidity) bad.reportValidity(); }
      } else {
        var b = form.querySelector('button[type="submit"]');
        if (b) { b.disabled = true; b.textContent = 'Sending…'; }
      }
    });
  }
})();
