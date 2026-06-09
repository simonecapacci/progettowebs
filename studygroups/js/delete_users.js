document.addEventListener('DOMContentLoaded', () => {
    const deleteUserForms = document.querySelectorAll('.delete-user-form');

    deleteUserForms.forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();

            window.showProjectConfirm('Vuoi davvero eliminare questo utente?')
                .then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    }
                });
        });
    });
});
