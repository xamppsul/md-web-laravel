const FlashDataSuccess = $('.flash-data-success').data('flashdata-success');
const FlashDataError = $('.flash-data-error').data('flashdata-error');

if (FlashDataSuccess) {
    Swal.fire(
        'Success!',
        FlashDataSuccess,
        'success'
    )
}

if (FlashDataError) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: FlashDataError,
        footer: '<a href="#">Why do I have this issue?</a>'
    });
}

//tombol hapus
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let form = this.closest('form');
            Swal.fire({
                title: 'Hapus Data?',
                text: "Data aset akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});