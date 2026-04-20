function openRemoveModal(id, nama) {
    document.getElementById('removePaketName').textContent = nama;
    document.getElementById('confirmRemoveBtn').href = '/wishlist/remove/' + id;
    document.getElementById('removeModalBackdrop').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeRemoveModal() {
    document.getElementById('removeModalBackdrop').classList.remove('active');
    document.body.style.overflow = '';
}

document.getElementById('removeModalBackdrop').addEventListener('click', function(e) {
    if (e.target === this) closeRemoveModal();
});
