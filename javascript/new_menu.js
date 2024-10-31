document.addEventListener("DOMContentLoaded", function() {
    const minusBtn = document.querySelectorAll(".minus-btn");
    const plusBtn = document.querySelectorAll(".plus-btn");
    const quantityInputs = document.querySelectorAll("input[name='quantity']"); // Ubah name menjadi 'quantity'

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

    // Tambahkan event listener untuk mengirim data ke PHP
    const checkoutForm = document.getElementById('checkout-form'); // Pastikan form memiliki id 'checkout-form'
    checkoutForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman form secara default

        // Ambil data dari form
        const formData = new FormData(checkoutForm);

        // Kirim data ke PHP menggunakan fetch API
        fetch('database/insert.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Output response dari PHP (opsional, bisa dihapus jika tidak diperlukan)
            // Tambahkan logika lain sesuai kebutuhan, misalnya tampilkan pesan sukses, reset form, dll.
        })
        .catch(error => {
            console.error('Error:', error);
            // Tambahkan logika penanganan error jika diperlukan
        });
    });
});
