<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scan Voucher QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div id="qr-reader" style="width: 500px; max-width: 90%; margin: 0 auto;"></div>
                    
                    <div id="scan-result" class="mt-6 text-center text-lg font-medium">
                        Arahkan kamera ke QR Code Voucher...
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const resultContainer = document.getElementById('scan-result');
            
            // 1. FUNGSI CALLBACK SUKSES
            function onScanSuccess(decodedText, decodedResult) {
                console.log(`Scan berhasil: ${decodedText}`);

                // Hentikan scanner segera setelah berhasil scan
                html5QrcodeScanner.clear();
                resultContainer.innerHTML = `<span class="text-blue-600">Memvalidasi kode ${decodedText}...</span>`;

                // Kirim kode ke backend Laravel
                redeemVoucher(decodedText);
            }

            // 2. FUNGSI CALLBACK GAGAL (opsional)
            function onScanError(errorMessage) {
                // Biarkan kosong agar console tidak terlalu ramai selama scanning
            }

            // 3. INISIALISASI SCANNER
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", // ID elemen <div>
                { fps: 10, qrbox: { width: 250, height: 250 } }, // Konfigurasi kamera
                false // verbose
            );
            
            // Mulai scanning
            html5QrcodeScanner.render(onScanSuccess, onScanError);


            // 4. FUNGSI UNTUK MENGIRIM DATA KE API LARAVEL
            async function redeemVoucher(code) {
                try {
                    const response = await fetch("{{ route('voucher.redeem') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token Keamanan Laravel
                        },
                        body: JSON.stringify({ code: code })
                    });

                    // Cek jika respons 500 atau 4xx
                    if (!response.ok) {
                        const errorResult = await response.json();
                        // Tampilkan pesan error (e.g., "Voucher sudah digunakan")
                        resultContainer.innerHTML = `<span class="text-red-600">ERROR: ${errorResult.error || 'Terjadi kesalahan tidak terduga.'}</span>`;
                        return; // Hentikan proses
                    }

                    // Jika respons 200 OK
                    const result = await response.json();
                    resultContainer.innerHTML = `<span class="text-green-600">${result.message}</span>`;
                    
                } catch (error) {
                    console.error('Fetch error:', error);
                    resultContainer.innerHTML = `<span class="text-red-600">Error: Gagal terhubung ke server atau masalah jaringan.</span>`;
                }

                // Tambahkan tombol untuk scan lagi
                resultContainer.innerHTML += ` <button onclick="window.location.reload()" class="ml-2 text-sm text-blue-500 underline">Scan Lagi</button>`;
            }
        });
    </script>
</x-app-layout>