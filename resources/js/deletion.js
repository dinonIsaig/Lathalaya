window.openDeleteModal = function(articleId) {
    const idInput = document.getElementById('modal_article_id');
    if (idInput) {
        idInput.value = articleId;
    }
        
    const modal = document.getElementById('confirmDeletionModal');
    if (modal) {
        modal.classList.remove('hidden');
    } else {
        console.error('Modal element not found');
    }
}