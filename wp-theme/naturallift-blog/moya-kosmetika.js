(function () {
  var openBtn = document.getElementById('mk-menu-open');
  var closeBtn = document.getElementById('mk-menu-close');
  var overlay = document.getElementById('mk-menu-overlay');

  if (openBtn && overlay) {
    function openMenu() {
      overlay.hidden = false;
      overlay.setAttribute('aria-hidden', 'false');
      overlay.classList.add('is-open');
      openBtn.setAttribute('aria-expanded', 'true');
      document.body.classList.add('menu-open');
    }

    function closeMenu() {
      overlay.classList.remove('is-open');
      overlay.setAttribute('aria-hidden', 'true');
      openBtn.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('menu-open');

      window.setTimeout(function () {
        if (!overlay.classList.contains('is-open')) {
          overlay.hidden = true;
        }
      }, 280);
    }

    openBtn.addEventListener('click', function () {
      if (overlay.classList.contains('is-open')) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', closeMenu);
    }

    overlay.addEventListener('click', function (event) {
      if (event.target === overlay) {
        closeMenu();
      }
    });

    overlay.querySelectorAll('.menu-overlay__link, .menu-overlay__cta').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && overlay.classList.contains('is-open')) {
        closeMenu();
      }
    });
  }

  var cookieBanner = document.getElementById('mk-cookie-banner');
  if (!cookieBanner) {
    return;
  }

  var cookieKey = 'mk_cookie_consent_v1';
  var cookieBtn = cookieBanner.querySelector('.cookie-banner__ok');

  function hideCookieBanner() {
    cookieBanner.classList.remove('is-visible');
    cookieBanner.setAttribute('hidden', 'hidden');
  }

  function showCookieBanner() {
    cookieBanner.removeAttribute('hidden');
    cookieBanner.classList.add('is-visible');
  }

  try {
    if (localStorage.getItem(cookieKey) === '1') {
      return;
    }
  } catch (error) {
    /* storage недоступен */
  }

  showCookieBanner();

  if (cookieBtn) {
    cookieBtn.addEventListener('click', function () {
      try {
        localStorage.setItem(cookieKey, '1');
      } catch (error) {
        /* storage недоступен */
      }
      hideCookieBanner();
    });
  }
})();
