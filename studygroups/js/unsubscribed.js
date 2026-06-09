document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.unsubscribe-form');

    forms.forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();

            window.showProjectConfirm('Sei sicuro di voler uscire da questo gruppo?')
                .then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    }
                });
        });
    });
});
