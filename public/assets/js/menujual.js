const quantityInputs = document.querySelectorAll('.quantity-input');
    const categoryTotals = {}; // Menyimpan total kategori
    
    quantityInputs.forEach(input => {
        const baseQuantity = parseInt(input.getAttribute('data-base-quantity'));
        const price = parseFloat(input.getAttribute('data-price'));
        const totalCell = input.parentNode.nextElementSibling.nextElementSibling;
        const categoryCell = input.parentNode.previousElementSibling;
        const categoryName = categoryCell.textContent.trim(); // Nama kategori
        const barangDikurangiCell = input.parentNode.nextElementSibling.nextElementSibling.nextElementSibling; // Ambil kolom "barangDikurangi"
        
        // Inisialisasi total kategori
        if (!categoryTotals[categoryName]) {
            categoryTotals[categoryName] = 0;
        }
        
        input.addEventListener('change', () => {
            const quantity = parseInt(input.value);
            const adjustedQuantity = baseQuantity - quantity;
            barangDikurangiCell.textContent = adjustedQuantity.toString();
            
            if (adjustedQuantity >= 0) {
                const total = adjustedQuantity * price;
                totalCell.textContent = 'Rp' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                
                // Mengupdate total kategori
                categoryTotals[categoryName] += total;
                
                // Mengupdate tampilan total kategori
                updateCategoryTotalDisplay(categoryName, categoryTotals[categoryName]);
            }
        });
    });

    const saveButton = document.getElementById('save-button');
    saveButton.addEventListener('click', () => {
    const changedData = [];
    
    quantityInputs.forEach(input => {
        const quantity = parseInt(input.value);
        const baseQuantity = parseInt(input.getAttribute('data-base-quantity'));
        const adjustedQuantity = baseQuantity - quantity;
        
        if (adjustedQuantity !== 0) {
            const itemName = input.parentNode.previousElementSibling.previousElementSibling.textContent.trim();
            const data = {
                itemName: itemName,
                adjustedQuantity: adjustedQuantity
            };
            changedData.push(data);
        }
    });
    
    if (changedData.length > 0) {
        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            type: 'POST',
            url: '/save_changes', // Ganti dengan URL endpoint penyimpanan di server
            data: { changes: changedData },
            success: function(response) {
                console.log('Data berhasil disimpan:', response);
                // Di sini Anda bisa melakukan tindakan lain setelah berhasil menyimpan data
            },
            error: function(error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }
    });

    function updateCategoryTotalDisplay(categoryName, total) {
    const categoryTotalDisplay = document.querySelector(`#${categoryName.replace(/\s+/g, '-')}-total`);
    if (categoryTotalDisplay) {
        categoryTotalDisplay.textContent = 'Rp' + total.toFixed(2);
    }
    }
    function updateTotalPrice() {
    const totalCells = document.querySelectorAll('.total');
    let totalPrice = 0;
    
    totalCells.forEach(cell => {
        const totalValue = parseFloat(cell.textContent.replace('Rp', '').replace(',', '').trim());
        totalPrice += totalValue;
    });
    
    const totalAmount = document.getElementById('total-amount');
    totalAmount.textContent = 'Rp' + totalPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Panggil fungsi updateTotalPrice() setelah menghitung total pada setiap input quantity
    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            // ... (kode lain di dalam event listener)

            // Setelah menghitung total untuk item individual, panggil fungsi untuk memperbarui total keseluruhan
            updateTotalPrice();
        });
    });

    // Panggil fungsi updateTotalPrice() saat halaman dimuat untuk pertama kali
    window.addEventListener('load', updateTotalPrice);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    const refreshButton = document.getElementById('save-button');
    
    refreshButton.addEventListener('click', () => {
        location.reload(); // Ini akan me-refresh halaman
    });
