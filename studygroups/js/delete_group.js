document.addEventListener('DOMContentLoaded', () => {
    const deleteGroupForms = document.querySelectorAll('.delete-group-form');

    deleteGroupForms.forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();

            window.showProjectConfirm('Vuoi davvero eliminare questo gruppo?')
                .then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    }
                });
        });
    });
});
