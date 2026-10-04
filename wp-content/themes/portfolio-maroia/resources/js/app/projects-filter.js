document.addEventListener('click', (e) => {
    const button = e.target.closest('.filter-buttons [data-filter]');
    if (!button) return;

    const filter = button.dataset.filter;

    document.querySelectorAll('.filter-buttons [data-filter]').forEach((b) => {
        const on = b === button;
        b.classList.toggle('active', on);
        b.setAttribute('aria-pressed', String(on));
    });

    document.querySelectorAll('[data-projects-grid] .project-card').forEach((card) => {
        const types = (card.dataset.types || '').split(' ');
        card.hidden = !(filter === 'all' || types.includes(filter));
    });
});