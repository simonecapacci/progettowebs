document.addEventListener('DOMContentLoaded', () => {

    const forms = document.querySelectorAll('.unsubscribe-form');

    forms.forEach(form => {

        form.addEventListener('submit', (event) => {

            const conferma = confirm(
                'Sei sicuro di voler uscire da questo gruppo?'
            );

            if (!conferma) {
                event.preventDefault();
            }

        });

    });

});