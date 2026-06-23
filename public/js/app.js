/* NoteFlow — app.js */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Auto-dismiss alerts after 4s ─────────────────────── */
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(function (alert) {
    // Close button
    const closeBtn = alert.querySelector('.alert-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        dismissAlert(alert);
      });
    }
    // Auto-dismiss
    setTimeout(function () {
      dismissAlert(alert);
    }, 4000);
  });

  function dismissAlert(el) {
    el.style.transition = 'opacity 0.35s ease, transform 0.35s ease, max-height 0.35s ease, margin 0.35s ease, padding 0.35s ease';
    el.style.opacity = '0';
    el.style.transform = 'translateY(-6px)';
    el.style.maxHeight = el.scrollHeight + 'px';
    setTimeout(function () {
      el.style.maxHeight = '0';
      el.style.marginBottom = '0';
      el.style.paddingTop = '0';
      el.style.paddingBottom = '0';
    }, 200);
    setTimeout(function () {
      el.remove();
    }, 560);
  }

  /* ── Note cards staggered animation ───────────────────── */
  const cards = document.querySelectorAll('.note-card');
  cards.forEach(function (card, i) {
    card.style.animationDelay = (i * 60) + 'ms';
  });

  /* ── Delete confirmation ───────────────────────────────── */
  // Handled inline via onclick="return confirm(...)" on the link
  // But we also intercept to style the native dialog is not possible,
  // so we enhance with a custom confirm if needed — keeping it simple:
  const deleteLinks = document.querySelectorAll('.delete-link');
  deleteLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const confirmed = window.confirm('Supprimer cette note définitivement ?');
      if (confirmed) {
        window.location.href = link.href;
      }
    });
  });

  /* ── Auto-resize textarea ──────────────────────────────── */
  const textareas = document.querySelectorAll('textarea');
  textareas.forEach(function (ta) {
    ta.addEventListener('input', function () {
      ta.style.height = 'auto';
      ta.style.height = ta.scrollHeight + 'px';
    });
  });

  /* ── Highlight active nav link ─────────────────────────── */
  const currentPage = new URLSearchParams(window.location.search).get('page') || '';
  document.querySelectorAll('.site-header nav a').forEach(function (link) {
    const href = link.getAttribute('href') || '';
    const linkPage = new URLSearchParams(href.split('?')[1] || '').get('page') || '';
    if (linkPage && linkPage === currentPage) {
      link.style.color = 'var(--accent)';
      link.style.background = 'var(--accent-light)';
    }
  });

});