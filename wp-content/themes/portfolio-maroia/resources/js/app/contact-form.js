cat > resources/js/app/contact-form.js <<'EOF'
document.addEventListener('submit', async (e) => {
  const form = e.target.closest('[data-contact-form]');
  if (!form) return;

  e.preventDefault();

  const d = form.dataset;
  const status = document.querySelector('.form-status');
  const button = form.querySelector('.btn-form');
  const labels = {
    name: d.errName,
    email: d.errEmail,
    message: d.errMessage,
  };

  const showErrors = (errors) => {
    form.querySelectorAll('.form-input-wrapper').forEach((wrap) => {
      const input = wrap.querySelector('input, textarea');
      const err = wrap.querySelector('.field-error');
      const msg = errors[input.name] || '';
      err.textContent = msg;
      wrap.classList.toggle('has-error', Boolean(msg));
      if (msg) input.setAttribute('aria-invalid', 'true');
      else input.removeAttribute('aria-invalid');
    });
  };

  const setStatus = (text, type) => {
    status.innerHTML = text ? '<p class="is-' + type + '">' + text + '</p>' : '';
  };

  const data = new FormData(form);
  const errors = {};
  Object.keys(labels).forEach((k) => {
    if (!String(data.get(k) || '').trim()) errors[k] = labels[k];
  });
  const email = String(data.get('email') || '').trim();
  if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    errors.email = d.errEmailBad;
  }

  showErrors(errors);
  if (Object.keys(errors).length) {
    setStatus(d.msgFix, 'error');
    const firstInvalid = form.querySelector('[aria-invalid="true"]');
    if (firstInvalid) firstInvalid.focus({ preventScroll: true });
    return;
  }

  button.disabled = true;
  setStatus('', '');

  try {
    const res = await fetch(form.action, {
      method: 'POST',
      body: data,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    });
    const json = await res.json();

    if (json.ok) {
      form.reset();
      showErrors({});
      setStatus(json.message, 'success');
    } else {
      const errs = json.errors || {};
      showErrors(errs);
      const extra = Object.keys(errs)
          .filter((k) => !form.querySelector('[name="' + k + '"]'))
          .map((k) => errs[k]);
      setStatus(extra.length ? extra.join(' ') : d.msgFix, 'error');
    }
  } catch (err) {
    setStatus(d.msgFail, 'error');
  } finally {
    button.disabled = false;
  }
});