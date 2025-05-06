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