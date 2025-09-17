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