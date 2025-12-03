<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Raya & Khafidz</title>
    
    <!-- Link Font Beth Ellen dari Google Fonts --><link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden; /* Mencegah scroll */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #F9F6F1; /* Warna fallback */
        }

        .cover-container {
            width: 100vw;
            height: 100vh;
            position: relative;
            /* Path gambar background Anda (Sketsa) */
            background-image: url('{{ asset('img/cover.svg') }}'); 
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            
            /* Posisikan konten (tulisan) ke atas */
            justify-content: flex-start; 
            
            align-items: center;
            text-align: center;
        }

        .names {
            font-family: 'Beth Ellen', cursive;
            font-size: 80px; /* Ukuran font 85px */
            color: #1E5B87; /* Warna teks */
            line-height: 1.1;
            z-index: 2; 
            position: relative; 
            
            /* Ditingkatkan menjadi 15vh (sebelumnya 10vh) */
            margin-top: 3vh; 
        }

        .names span {
            display: block;
        }

        .ampersand {
            font-size: 0.7em; 
        }

        .couple-image {
            position: absolute;
            bottom: 0; 
            left: 50%;
            transform: translateX(-50%); 
            width: 60%; 
            height: 60%; 
            /* Path gambar orang Anda (Harus PNG/SVG transparan) */
            background-image: url('{{ asset('img/pasangan.svg') }}'); 
            background-size: contain; 
            background-repeat: no-repeat;
            background-position: center bottom; 
            z-index: 1; 
            max-height: 80vh; 
            max-width: 100vw; 
        }

        .next-button-container {
            /* Menggunakan fixed agar tombol selalu terlihat di pojok */
            position: fixed; 
            bottom: 5vh; 
            right: 5vw; 
            z-index: 3; 
        }

        .next-button {
            padding: 15px 40px; /* Padding ditingkatkan agar lebih besar */
            font-size: 1.8em; /* Ukuran font lebih besar */
            font-weight: 700; /* Bold */
            
            /* Warna teks biru gelap */
            color: #1E5B87; 
            /* Warna latar putih */
            background-color: white; 
            
            border: none;
            /* Border-radius lebih besar untuk bentuk tumpul */
            border-radius: 20px; 
            cursor: pointer;
            
            /* Shadow yang lebih halus */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); 
            transition: background-color 0.3s ease, transform 0.2s ease;
            
            /* Font Montserrat */
            font-family: 'Montserrat', sans-serif;
        }

        .next-button:hover {
            background-color: #f0f0f0; /* Sedikit abu-abu saat hover */
            transform: translateY(-2px); /* Efek sedikit terangkat */
        }

        /* MEDIA QUERIES untuk responsif */
        @media (max-width: 768px) {
            .names {
                font-size: 60px; 
                margin-top: 8vh; 
            }
            .next-button {
                font-size: 1.4em; /* Lebih kecil di mobile */
                padding: 12px 30px;
                bottom: 3vh;
                right: 3vw;
            }
            .couple-image {
                max-height: 70vh;
            }
        }

        @media (max-width: 480px) {
            .names {
                font-size: 45px;
                margin-top: 5vh; 
            }
            .next-button {
                font-size: 1.1em;
                padding: 10px 25px;
                border-radius: 15px; /* Sesuaikan radius di mobile */
            }
            .couple-image {
                max-height: 60vh;
            }
        }
    </style>
</head>
<body>
    <div class="cover-container">
        
        <!-- Tulisan Nama (diposisikan di atas dengan margin-top) --><div class="names">
            <span>Raya</span>
            <span class="ampersand">&</span>
            <span>Khafidz</span>
        </div>

        <!-- Gambar orang (diposisikan absolute di bawah) --><div class="couple-image"></div> 

        <div class="next-button-container">
          <button class="next-button" onclick="animateAndRedirect('{{ route('undangan') }}')">NEXT</button></div>
    </div>

    <script>
    function animateAndRedirect(url) {
        // 1. Ambil elemen cover
        const cover = document.querySelector('.cover-container');

        // 2. Tambahkan kelas animasi
        cover.classList.add('fade-out-up');

        // 3. Set timeout untuk menunggu animasi selesai (0.7s) sebelum pindah halaman
        setTimeout(() => {
            window.location.href = url;
        }, 700); 
    }
</script>
</body>
</html>