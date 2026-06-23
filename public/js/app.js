

document.addEventListener('DOMContentLoaded', function () {


  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(function (alert) {

    const closeBtn = alert.querySelector('.alert-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        dismissAlert(alert);
      });
    }

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

  const cards = document.querySelectorAll('.note-card');
  cards.forEach(function (card, i) {
    card.style.animationDelay = (i * 60) + 'ms';
  });

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


  const textareas = document.querySelectorAll('textarea');
  textareas.forEach(function (ta) {
    ta.addEventListener('input', function () {
      ta.style.height = 'auto';
      ta.style.height = ta.scrollHeight + 'px';
    });
  });


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