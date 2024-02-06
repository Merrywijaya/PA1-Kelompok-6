$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $(document).on('click', '.paginasi', function(event) {
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        page = $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });
});

function hapus(url) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "DELETE",
                success: function(response) {
                    Swal.fire(
                        'Terhapus!',
                        'Data anda telah terhapus.',
                        'success'
                    ).then(function() {
                        location.reload();
                    });
                }
            });
        } else {
            Swal.fire(
                'Dibatalkan!',
                'Data anda tidak jadi dihapus.',
                'error'
            )
        }
    })
}
