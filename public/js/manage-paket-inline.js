$(document).ready(function() {
    // Edit button click - populate modal
    $('.btn-edit-card').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const kategori = $(this).data('kategori');
        const harga = $(this).data('harga');
        const deskripsi = $(this).data('deskripsi');
        const available = $(this).data('available');

        $('#edit_id').val(id);
        $('#edit_nama_paket').val(nama);
        $('#edit_kategori').val(kategori);
        $('#edit_harga_paket').val(harga);
        $('#edit_deskripsi').val(deskripsi);
        $('#edit_available').val(available);
    });
});

// Change per page filter
function changePerPage(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', value);
    url.searchParams.set('page', 1);
    window.location.href = url.toString();
}

// Delete confirmation
function confirmDelete(id, nama) {
    $('#delete_paket_name').text(nama);
    $('#confirm_delete_btn').attr('href', '/hapus_paket/' + id);
    $('#deleteModal').modal('show');
}
