// ========================= SweatAlert FlashData ==========================
const message = $('.flashData').data('message');
const tittle = $('.flashData').data('tittle');
const icon = $('.flashData').data('icon');
const flash = document.querySelector('.flashData')

if (message && tittle && icon) {

  Swal.fire({
    icon: icon,
    title: tittle,
    text: message,
    showConfirmButton: false,
    timer: 4000
  })

  flash.remove()

}
// ========================= END SweatAlert FlashData ==========================

// ================== SWEETALERT BUTTON DELETE ==============================
$('table tbody').on('click', '.btnDelete', function (e) {

  e.preventDefault();

  const href = $(this).attr('href');

  const Delete = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger cancelBtn'
    },
    buttonsStyling: false
  })


  Delete.fire({
    title: 'Kamu yakin?',
    text: "Data yang sudah dihapus tidak bisa kembali!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      Delete.fire(
        'Cancelled',
        'Data tidak jadi dihapus!',
        'error'
      )
    }
  })

  const cancelBtn = document.querySelector('.cancelBtn');
  cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON DELETE ==============================