var _cancelHref = '';
function openCancelModal(href, name) {
    _cancelHref = href;
    document.getElementById('cancelModalName').textContent = name;
    document.getElementById('cancelConfirmBtn').href = href;
    document.getElementById('cancelModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeCancelModal() {
    document.getElementById('cancelModal').classList.remove('active');
    document.body.style.overflow = '';
    _cancelHref = '';
}
