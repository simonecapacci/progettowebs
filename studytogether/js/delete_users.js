document.addEventListener('DOMContentLoaded', () => {
    const deleteUserForms = document.querySelectorAll('.delete-user-form');

    deleteUserForms.forEach(form => {
        form.addEventListener('submit', event => {
            const conferma = confirm('Vuoi davvero eliminare questo utente?');

            if (!conferma) {
                event.preventDefault();
            }
        });
    });
});