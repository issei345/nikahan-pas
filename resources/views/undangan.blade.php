<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>Khafid & Aya</title>

  <style>
    body {
        background-color: #F9F6F1;
    }
  </style>

</head>

<body>
    {{-- Header --}}
    @include('sections.header')

    {{-- Cover --}}

    {{-- Section Hero --}}
    @include('sections.hero')

    {{-- Section Informasi Acara --}}
    @include('sections.event')
    
    {{-- Section Kartu Ucapan --}}
    @include('sections.story')
    
    {{-- Section RSVP --}}
    @include('sections.rsvp')

    {{-- Section RSVP --}}
    @include('sections.footer')
   <audio id="musicPlayer" loop>
    <source src="{{ asset('sounds/kebogiro.mp3') }}" type="audio/mpeg">
    Browser Anda tidak mendukung elemen audio.
</audio>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const music = document.getElementById('musicPlayer');
        
        // **LANGKAH B: Baca Flag dari LocalStorage**
        const shouldPlay = localStorage.getItem('playMusicOnLoad');
        
        // 3. Cek apakah tombol NEXT sudah diklik (flag 'true')
        if (shouldPlay === 'true') {
            music.play().then(() => {
                console.log("Musik berhasil diputar setelah interaksi dari Cover.");
            }).catch(error => {
                console.error("Gagal memutar audio meskipun sudah ada interaksi:", error);
            });
            
            // 4. Hapus flag agar musik tidak berulang jika pengguna me-refresh halaman
            localStorage.removeItem('playMusicOnLoad');
        }
    });
        // (Di sini Anda bisa menambahkan logika untuk ikon play/pause yang fixed)
 
</script>
</body>
</html>
