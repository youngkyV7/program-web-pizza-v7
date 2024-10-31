document.addEventListener("DOMContentLoaded", function() {
    const minusBtn = document.querySelectorAll(".minus-btn");
    const plusBtn = document.querySelectorAll(".plus-btn");
    const quantityInputs = document.querySelectorAll("input[name='name']");

    minusBtn.forEach(function(button, index) {
        button.addEventListener("click", function() {
            if (parseInt(quantityInputs[index].value) > 0) {
                quantityInputs[index].value = parseInt(quantityInputs[index].value) - 1;
            }
        });
    });

    plusBtn.forEach(function(button, index) {
        button.addEventListener("click", function() {
            quantityInputs[index].value = parseInt(quantityInputs[index].value) + 1;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Seleksi tombol checkout
    const checkoutBtns = document.querySelectorAll(".checkout-btn");

    // Tambahkan event listener untuk setiap tombol checkout
    checkoutBtns.forEach(function(button, index) {
        button.addEventListener("click", function() {
            // Dapatkan informasi tentang item yang dipilih
            const itemName = document.querySelectorAll(".box h2")[index].innerText;
            const itemQuantity = document.querySelectorAll("input[name='name']")[index].value;

            // Buat pesan checkout dengan daftar item yang dipilih
            const message = `Saya ingin memesan ${itemQuantity} ${itemName}(s).`;

            // Arahkan pengguna ke nomor WhatsApp dengan pesan yang dibuat
            const whatsappURL = `https://wa.me/628813189475?text=${encodeURIComponent(message)}`;
            window.location.href = whatsappURL;
        });
    });
});