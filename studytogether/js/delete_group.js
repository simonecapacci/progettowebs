document.addEventListener('DOMContentLoaded', () => {
    const deleteGroupForms = document.querySelectorAll('.delete-group-form');

    deleteGroupForms.forEach(form => {
        form.addEventListener('submit', event => {
            const conferma = confirm('Vuoi davvero eliminare questo gruppo?');

            if (!conferma) {
                event.preventDefault();
            }
        });
    });
});