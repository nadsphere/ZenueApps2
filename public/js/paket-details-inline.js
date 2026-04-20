function openOrderModal() {
    document.getElementById('orderModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeOrderModal() {
    document.getElementById('orderModal').classList.remove('active');
    document.body.style.overflow = '';
}

// Close on backdrop click
document.getElementById('orderModal').addEventListener('click', function(e) {
    if (e.target === this) closeOrderModal();
});

function toggleFavorite(paketId) {
    $.ajax({
        url: '/wishlist/toggle/' + paketId,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}' },
        success: function(response) {
            var icon = document.getElementById('favIcon');
            if (response.added) {
                icon.classList.remove('fa-heart-o');
                icon.classList.add('fa-heart');
            } else {
                icon.classList.remove('fa-heart');
                icon.classList.add('fa-heart-o');
            }
        }
    });
}

function changeMainImage(src, thumb) {
    var mainImg = document.querySelector('.hero-main-image');
    if (mainImg) {
        mainImg.src = src;
    }
    document.querySelectorAll('.thumbnail-item').forEach(function(t) {
        t.classList.remove('active');
    });
    thumb.classList.add('active');
}
