/*!
 * WMARKA 4.0.11 — поведение шаблона поверх UIkit 3 (без зависимостей).
 * 1. Переключатель «сетка / список» ([data-wm-switch], [data-wm-set-view]) с памятью в localStorage.
 * 2. Показ пароля ([data-wm-password]).
 * 3. Текст материалов ([data-wm-content]): таблицы со скроллом, адаптивные видео.
 * 4. Клиентский фильтр карточек ([data-wm-filter]).
 * 5. Фокус в поле поиска при открытии модального окна (не при загрузке).
 */
(function () {
  'use strict';

  var store = {
    get: function (k) { try { return localStorage.getItem(k); } catch (e) { return null; } },
    set: function (k, v) { try { localStorage.setItem(k, v); } catch (e) { /* приватный режим */ } }
  };

  function swap(el, from, to) {
    (from || '').split(/\s+/).forEach(function (c) { if (c) { el.classList.remove(c); } });
    (to || '').split(/\s+/).forEach(function (c) { if (c) { el.classList.add(c); } });
  }

  function applyView(scope, view, save) {
    if (!scope) { return; }
    var other = view === 'list' ? 'grid' : 'list';
    scope.setAttribute('data-wm-view', view);
    scope.querySelectorAll('[data-wm-grid],[data-wm-list]').forEach(function (el) {
      swap(el, el.getAttribute('data-wm-' + other), el.getAttribute('data-wm-' + view));
    });
    scope.querySelectorAll('[data-wm-sizes-grid]').forEach(function (img) {
      img.setAttribute('sizes', img.getAttribute('data-wm-sizes-' + view));
    });
    scope.querySelectorAll('[data-wm-grid-size]').forEach(function (img) {
      var s = img.getAttribute('data-wm-' + view + '-size');
      if (s) { img.setAttribute('width', s); img.setAttribute('height', s); }
    });
    var key = scope.getAttribute('data-wm-switch');
    document.querySelectorAll('[data-wm-switch="' + key + '"] [data-wm-set-view], [data-wm-switch-proxy="' + key + '"] [data-wm-set-view]').forEach(function (b) {
      b.classList.toggle('uk-active', b.getAttribute('data-wm-set-view') === view);
    });
    if (save) { store.set('wmarka.view.' + key, view); }
    if (window.UIkit && UIkit.update) { UIkit.update(scope); }
  }

  function init() {
    document.querySelectorAll('[data-wm-switch]').forEach(function (scope) {
      var saved = store.get('wmarka.view.' + scope.getAttribute('data-wm-switch'));
      if (saved && saved !== scope.getAttribute('data-wm-view')) { applyView(scope, saved, false); }
    });

    document.addEventListener('click', function (e) {
      var btn = e.target.closest('[data-wm-set-view]');
      if (btn) {
        var holder = btn.closest('[data-wm-switch],[data-wm-switch-proxy]');
        var key = holder && (holder.getAttribute('data-wm-switch') || holder.getAttribute('data-wm-switch-proxy'));
        applyView(key ? document.querySelector('[data-wm-switch="' + key + '"]') : null, btn.getAttribute('data-wm-set-view'), true);
        return;
      }
      var eye = e.target.closest('[data-wm-password]');
      if (eye) {
        e.preventDefault();
        var input = document.querySelector(eye.getAttribute('data-wm-password'));
        if (input) {
          input.type = input.type === 'password' ? 'text' : 'password';
          eye.setAttribute('uk-icon', 'icon: ' + (input.type === 'password' ? 'eye' : 'eye-slash'));
        }
      }
    });

    // Первый абзац статьи — вводный: класс UIkit uk-text-lead
    document.querySelectorAll('[data-wm-lead] > p:first-child').forEach(function (p) { p.classList.add('uk-text-lead'); });

    document.querySelectorAll('[data-wm-content]').forEach(function (body) {
      body.querySelectorAll('table').forEach(function (t) {
        if (!t.className) { t.className = 'uk-table uk-table-divider uk-table-small'; }
        if (!t.parentElement.classList.contains('uk-overflow-auto')) {
          var wrap = document.createElement('div');
          wrap.className = 'uk-overflow-auto';
          t.parentNode.insertBefore(wrap, t);
          wrap.appendChild(t);
        }
      });
      body.querySelectorAll('iframe[width][height]').forEach(function (f) {
        if (!f.hasAttribute('uk-responsive')) { f.setAttribute('uk-responsive', ''); f.classList.add('uk-width-1-1'); }
      });
    });

    document.querySelectorAll('[data-wm-filter]').forEach(function (input) {
      var target = document.querySelector(input.getAttribute('data-wm-filter'));
      if (!target) { return; }
      input.addEventListener('input', function () {
        var q = input.value.trim().toLowerCase();
        Array.prototype.forEach.call(target.children, function (cell) {
          var item = cell.querySelector('[data-wm-filter-text]');
          var text = item ? item.getAttribute('data-wm-filter-text') : cell.textContent.toLowerCase();
          cell.hidden = q !== '' && text.indexOf(q) === -1;
        });
        if (window.UIkit && UIkit.update) { UIkit.update(target); }
      });
    });

    document.addEventListener('shown', function (e) {
      var field = e.target && e.target.querySelector && e.target.querySelector('[data-wm-autofocus]');
      if (field) { field.focus(); }
    }, true);
  }

  if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
})();

/* Кнопка «Очистить» общей панели фильтров: сбрасывает поля формы и отправляет её */
document.addEventListener('click', function (e) {
  var btn = e.target.closest('[data-wm-clear]');
  if (!btn || !btn.form) { return; }
  btn.form.querySelectorAll('input[type=search], input[type=text]').forEach(function (i) { i.value = ''; });
  btn.form.querySelectorAll('select:not([name=limit])').forEach(function (s) { s.selectedIndex = 0; });
  btn.form.submit();
});
