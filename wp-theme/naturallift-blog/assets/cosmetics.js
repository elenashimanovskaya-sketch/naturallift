(function () {
  'use strict';

  /* Вкладки карточки продукта */
  document.querySelectorAll('[data-sc-tabs]').forEach(function (root) {
    var buttons = root.querySelectorAll('[data-sc-tab]');
    var panels = root.querySelectorAll('[data-sc-panel]');

    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = btn.getAttribute('data-sc-tab');

        buttons.forEach(function (b) {
          var active = b === btn;
          b.classList.toggle('is-active', active);
          b.setAttribute('aria-selected', active ? 'true' : 'false');
        });

        panels.forEach(function (panel) {
          var active = panel.getAttribute('data-sc-panel') === key;
          panel.classList.toggle('is-active', active);
          if (active) {
            panel.removeAttribute('hidden');
          } else {
            panel.setAttribute('hidden', 'hidden');
          }
        });
      });
    });
  });

  /* Галерея продукта */
  document.querySelectorAll('[data-sc-gallery]').forEach(function (root) {
    var main = root.querySelector('[data-sc-gallery-main]');
    var thumbs = root.querySelectorAll('[data-sc-gallery-thumb]');

    thumbs.forEach(function (thumb) {
      thumb.addEventListener('click', function () {
        var url = thumb.getAttribute('data-sc-gallery-thumb');
        if (!url || !main) {
          return;
        }
        main.src = url;
        thumbs.forEach(function (t) {
          t.classList.toggle('is-active', t === thumb);
        });
      });
    });
  });

  /* Фильтры каталога */
  var filtersRoot = document.querySelector('[data-sc-filters]');
  var grid = document.querySelector('[data-sc-grid]');
  var emptyMsg = document.querySelector('[data-sc-empty]');

  if (!filtersRoot || !grid) {
    return;
  }

  var cards = grid.querySelectorAll('.sc-card');
  var activeFilters = {};

  filtersRoot.querySelectorAll('.sc-filter-chip').forEach(function (chip) {
    chip.addEventListener('click', function () {
      var taxonomy = chip.getAttribute('data-taxonomy');
      var filter = chip.getAttribute('data-filter') || '';

      filtersRoot
        .querySelectorAll('.sc-filter-chip[data-taxonomy="' + taxonomy + '"]')
        .forEach(function (sibling) {
          sibling.classList.remove('is-active');
        });
      chip.classList.add('is-active');

      if (filter) {
        activeFilters[taxonomy] = filter;
      } else {
        delete activeFilters[taxonomy];
      }

      applyFilters();
    });
  });

  function applyFilters() {
    var keys = Object.keys(activeFilters);
    var visible = 0;

    cards.forEach(function (card) {
      var cardFilters = (card.getAttribute('data-filters') || '').split(/\s+/).filter(Boolean);
      var show = keys.every(function (tax) {
        return cardFilters.indexOf(activeFilters[tax]) !== -1;
      });

      card.classList.toggle('is-hidden', !show);
      if (show) {
        visible += 1;
      }
    });

    if (emptyMsg) {
      emptyMsg.hidden = visible > 0;
    }
  }
})();
