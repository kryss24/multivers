const modalPhoto = document.getElementById('modal-photo');
const ouvrirModal = document.getElementById('ouvrir-modal');
const fermerModal = document.getElementById('fermer-modal');
const photoInput = document.getElementById('photo-input');
const apercuImage = document.getElementById('apercu-image');

ouvrirModal.addEventListener('click', () => {
    modalPhoto.classList.add('afficher');
});

fermerModal.addEventListener('click', () => {
    modalPhoto.classList.remove('afficher');
});

photoInput.addEventListener('change', () => {
    const file = photoInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function() {
            apercuImage.style.backgroundImage = `url(${reader.result})`;
        };
        reader.readAsDataURL(file);
    }
});

