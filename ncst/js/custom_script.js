document.addEventListener('DOMContentLoaded', function() {
    const formTerms = document.getElementById('formTerms');
    const modalTerms = document.getElementById('modalTerms');
    const termsModal = document.getElementById('termsModal');

    window.openModal = function() {
        if (termsModal) {
            termsModal.classList.remove('hidden');
            termsModal.classList.add('flex');
        }
    }
    window.closeModal = function() {
        if (termsModal) {
            termsModal.classList.remove('flex');
            termsModal.classList.add('hidden');
        }
    }

    window.checkTerms = function(){
        if (formTerms && modalTerms) {
            formTerms.checked = modalTerms.checked;
            closeModal();
        }
    }
});