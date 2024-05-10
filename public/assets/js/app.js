const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function toggleLike(button) {
  var galeriId = $(button).data('galeri-id');

  // Kirim permintaan ke server menggunakan AJAX
  $.ajax({
      url: '/toggle-like/' + galeriId,
      type: 'POST',
      data: {
          _token: '{{ csrf_token() }}',
          galeri_id: galeriId,
      },
      success: function(response) {
          // Tindakan yang diambil setelah permintaan berhasil (misalnya, ubah warna ikon)
          $(button).toggleClass('liked', response.liked);
          $(button).next('.like-count').text(response.likeCount + ' Likes');
      },
      error: function(error) {
          console.error('Error:', error);
      }
  });
}
