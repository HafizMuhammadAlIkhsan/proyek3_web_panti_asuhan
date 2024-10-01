// const container = document.querySelector(".container");
// const linkItems = document.querySelectorAll(".menu-item");

// container.addEventListener("mouseenter", () => {
//     container.classList.add("active");
// });

// container.addEventListener("mouseleave", () => {
//     container.classList.remove("active");
// });

// for (let i = 0; i < linkItems.length; i++) {
//     linkItems[i].addEventListener("click", () => {
//         linkItems.forEach((linkItem) => {
//             linkItem.classList.remove("active");
//         });
//         linkItems[i].classList.add("active");
//     });
// }

// // Status login pengguna, diset ke false saat awal
// let isLoggedIn = false; // Ganti dengan true jika pengguna sudah login

// // Mendapatkan elemen dari DOM
// const userInfo = document.querySelector('.logged-in');
// const loginBtn = document.querySelector('.logged-out');

// // Mengatur tampilan berdasarkan status login
// function updateDisplay() {
//     if (isLoggedIn) {
//         userInfo.style.display = 'flex'; // Tampilkan informasi pengguna
//         loginBtn.style.display = 'none'; // Sembunyikan tombol login
//     } else {
//         userInfo.style.display = 'none'; // Sembunyikan informasi pengguna
//         loginBtn.style.display = 'block'; // Tampilkan tombol login
//     }
// }

// // Panggil fungsi untuk memperbarui tampilan saat halaman dimuat
// updateDisplay();

// // Contoh fungsi untuk menangani login
// function userLogin() {
//     isLoggedIn = true; // Ubah status menjadi sudah login
//     updateDisplay(); // Panggil fungsi untuk memperbarui tampilan
// }

// // Event listener untuk tombol login
// document.getElementById('login-btn').addEventListener('click', function() {
//     // Logika login di sini
//     // Misalnya, jika login berhasil:
//     userLogin(); // Ubah status dan perbarui tampilan
// });

