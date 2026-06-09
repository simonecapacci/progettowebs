document.addEventListener('DOMContentLoaded', () => {
  const modalId = 'projectConfirmModal';

  const ensureModal = () => {
    let modal = document.getElementById(modalId);

    if (modal) {
      return modal;
    }

    modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = modalId;
    modal.tabIndex = -1;
    modal.setAttribute('aria-hidden', 'true');
    modal.innerHTML = `
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Conferma azione</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Chiudi"></button>
          </div>
          <div class="modal-body">
            <p class="mb-0" id="projectConfirmMessage"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
            <button type="button" class="btn btn-primary" id="projectConfirmOk">Conferma</button>
          </div>
        </div>
      </div>
    `;

    document.body.appendChild(modal);
    return modal;
  };

  window.showProjectConfirm = (message) => {
    const modalEl = ensureModal();
    const messageEl = modalEl.querySelector('#projectConfirmMessage');
    const okButton = modalEl.querySelector('#projectConfirmOk');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

    messageEl.textContent = message;

    return new Promise((resolve) => {
      const cleanup = () => {
        okButton.removeEventListener('click', handleConfirm);
        modalEl.removeEventListener('hidden.bs.modal', handleCancel);
      };

      const handleConfirm = () => {
        cleanup();
        modal.hide();
        resolve(true);
      };

      const handleCancel = () => {
        cleanup();
        resolve(false);
      };

      okButton.addEventListener('click', handleConfirm);
      modalEl.addEventListener('hidden.bs.modal', handleCancel, { once: true });

      modal.show();
    });
  };
});
