$(document).ready(function() {
    // Star rating hover effect
    $('.rating-stars label').hover(
        function() {
            $(this).prevAll('label').addBack().css('color', '#f39c12');
        },
        function() {
            $(this).prevAll('label').addBack().css('color', '');
            // Reset to checked state
            $(this).parent().find('input:checked').nextAll('label').css('color', '');
        }
    );

    // AJAX filter - fetch packages without page refresh
    function fetchPackages(page) {
        var params = {
            search: $('#searchInput').val(),
            kategori: $('#kategoriSelect').val(),
            sort: $('#sortSelect').val(),
        };

        if (page) {
            params.page = page;
        }

        $.ajax({
            url: '/paket',
            type: 'GET',
            data: params,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
            beforeSend: function() {
                $('#packageGrid').css('opacity', '0.5');
            },
            success: function(response) {
                $('#packageGrid').html(response.html);
                $('#paginationWrapper').html(response.pagination);
                history.replaceState(null, '', '?' + $.param(params));
                $('#packageGrid').css('opacity', '1');
            },
            error: function() {
                $('#packageGrid').css('opacity', '1');
            }
        });
    }

    // Search with debounce
    var debounceTimer;
    $('#searchInput').on('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function() {
            fetchPackages(1);
        }, 500);
    });

    // Kategori and sort change
    $('#kategoriSelect, #sortSelect').on('change', function() {
        fetchPackages(1);
    });

    // Pagination links - handle via AJAX
    $(document).on('click', '#paginationWrapper a', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var page = new URL(href, window.location.origin).searchParams.get('page');
        if (page) {
            fetchPackages(page);
            $('html, body').animate({ scrollTop: 0 }, 300);
        }
    });

    // Wishlist toggle
    $(document).on('click', '.btn-wishlist[data-paket-id]', function() {
        var btn = $(this);
        var paketId = btn.data('paket-id');
        $.ajax({
            url: '/wishlist/toggle/' + paketId,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.added) {
                    btn.addClass('active');
                    btn.find('i').removeClass('fa-heart-o').addClass('fa-heart');
                    btn.attr('title', 'Hapus dari Wishlist');
                } else {
                    btn.removeClass('active');
                    btn.find('i').removeClass('fa-heart').addClass('fa-heart-o');
                    btn.attr('title', 'Tambah ke Wishlist');
                }
            }
        });
    });
});
