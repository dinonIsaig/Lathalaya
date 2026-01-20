
document.addEventListener('DOMContentLoaded', function() {
    const successModal = document.getElementById('confirmSubmittedModal');

    if (successModal && document.body.dataset.showSuccess === 'true') {
        successModal.classList.remove('hidden');
    }
});