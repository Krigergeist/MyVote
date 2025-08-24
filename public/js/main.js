
// Initialize AOS & page enter
document.addEventListener('DOMContentLoaded', () => {
  AOS.init({ once: true, offset: 80, duration: 600, easing: 'ease-out' });
  document.body.classList.add('page-enter-active');
});

// Smooth page leave transition on internal links
function isInternal(href) {
  if (!href) return false;
  if (href.startsWith('#')) return false;
  try { const u = new URL(href, window.location.href); return u.origin === window.location.origin; }
  catch { return false; }
}

document.addEventListener('click', (e) => {
  const a = e.target.closest('a');
  if (!a) return;
  const href = a.getAttribute('href');
  const hasNav = a.hasAttribute('data-nav');
  if (hasNav && isInternal(href)) {
    e.preventDefault();
    document.body.classList.add('page-leave');
    setTimeout(() => { window.location.href = href; }, 200);
  }
});
