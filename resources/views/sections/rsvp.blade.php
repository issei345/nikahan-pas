<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Undangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Poppins:wght@400;600;700&family=Montserrat:wght@700&display=swap');

        /* --- RSVP SECTION --- */
.rsvp-section {
    padding: 100px 10px;
    background-color: #f8f5ed;
    display: flex;
    flex-direction: column; /* Ubah ke column dulu untuk tata letak keseluruhan */
    align-items: center; /* Pusatkan konten */
    max-width: 1000px; /* Lebar total section diperluas sedikit */
    margin: 0 auto;
}

.rsvp-header {
    width: 100%;
    text-align: right; /* "get in touch!" di kanan */
    margin-bottom: 40px;
    padding-right: 50px; /* Beri sedikit padding agar tidak terlalu mepet */
}

.rsvp-header h2 {
    font-family: 'Beth Ellen', cursive;
    font-size: 3em;
    color: #1E5B87;
    margin: 0;
}

/* --- Container untuk gambar dan form (layout berdampingan) --- */
.content-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Pusatkan konten di tengah */
    gap: 40px; /* Jarak antara gambar dan form */
    align-items: center; /* Pusatkan secara vertikal */
    width: 100%; /* Ambil lebar penuh section */
    max-width: 900px; /* Batasi lebar konten */
}

/* --- GAYA GAMBAR (kaya di screenshot) --- */
.image-container {
    flex-shrink: 0;
    width: 380px; /* Lebar kontainer gambar */
    height: 380px; /* Tinggi kontainer gambar (agar simetris) */
    position: relative;
    display: flex;
    background: none;
    box-shadow: none;
    justify-content: center;
    align-items: center;
}

.image-container .image-oval {
    width: 250px;
    height: 350px;
    border-radius: 50% / 60%; /* Bentuk oval */
    overflow: hidden;
    position: relative;
    z-index: 10;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.image-container .image-oval img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Pastikan gambar mengisi oval */
}

/* --- GAYA BINGKAI FLORAL --- */
/* Karena tidak ada SVG floral yang disertakan, kita akan menggunakan latar belakang placeholder atau memposisikannya */
.image-container .floral-frame {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Gunakan gambar floral Anda di sini */
    background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg"><defs><filter id="f1" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur in="SourceGraphic" stdDeviation="0"/></filter></defs><path d="M 200,50 A 150,150 0 0,1 350,200 A 150,150 0 0,1 200,350 A 150,150 0 0,1 50,200 A 150,150 0 0,1 200,50 Z" stroke="%239bb1bf" stroke-width="5" fill="none" filter="url(%23f1)"/></svg>');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    z-index: 5;
    /* Ini adalah placeholder visual. Ganti dengan positioning SVG floral Anda yang sebenarnya. */
}
/* Catatan: Untuk bingkai floral kompleks, Anda HARUS menggunakan elemen <img> atau <svg> terpisah
   dengan file SVG/PNG bingkai yang transparan. Saya hanya membuat placeholder bentuk. */


/* --- GAYA FORMULIR --- */
.rsvp-form-container {
    flex-shrink: 0;
    width: 100%;
    max-width: 380px; /* Lebar maksimum form */
    background-color: #1E5B87; /* Warna biru */
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.rsvp-form-container h3 {
    font-family: 'Beth Ellen', cursive; /* "Join the Celebration" */
    font-size: 2em;
    color: #F9F6F1;
    margin-top: 0;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-family: 'Poppins', sans-serif;
    color: #F9F6F1;
    font-size: 0.9em;
    margin-bottom: 8px;
    font-weight: 600;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group select {
    width: 100%;
    padding: 12px 15px;
    border: none;
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.9);
    font-family: 'Poppins', sans-serif;
    color: #767676;
    font-size: 0.9em;
    box-sizing: none;
    /* Tambahkan border biru tipis agar terlihat lebih menonjol seperti di ss */
    border: 1px solid #1e5b87;
    outline: none;
}

.form-group input::placeholder {
    color: #D9D9D9;
}

.rsvp-submit-button {
    width: 100%;
    padding: 15px 20px;
    background-color: #F8F5ED;
    color: #1E5B87;
    border: none;
    border-radius: 8px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 15px;
}

.rsvp-submit-button:hover {
    background-color: #e0dcd2;
}

/* Responsif */
@media (max-width: 768px) {
    .rsvp-section {
        padding: 50px 15px;
    }
    .rsvp-header {
        text-align: center;
        margin-bottom: 30px;
        padding-right: 0;
    }
    .rsvp-header h2 {
        font-size: 2.5em;
    }
    .content-wrapper {
        flex-direction: column; /* Tumpuk ke bawah */
        gap: 30px;
    }
    .image-container,
    .rsvp-form-container {
        max-width: 300px;
        width: 100%;
    }
  
    .rsvp-form-container {
        padding: 25px;
    }
}


    </style>
</head>
<body>
<section id="rsvp" class="rsvp-section">
    <div class="rsvp-header">
        <h2>get in touch!</h2>
    </div>

    <div class="content-wrapper">

        <div class="image-container">
             <img 
            src="{{ asset('img/kaya.svg') }}" 
            alt="Kalender Pernikahan" 
            class="calendar-svg">   
        </div>


        <div class="rsvp-form-container">
            <h3>Join the Celebration</h3>

            {{-- Tampilkan error validasi (TETAP DI ATAS FORM) --}}
         {{-- Tampilkan error --}}
        @if ($errors->any())
            <div style="background-color:#fce8e8;border:1px solid #f2b4b4;color:#cc0000;padding:10px;border-radius:5px;margin-bottom:15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Jika HADIR --}}
        @if (session('rsvp_status') == 'coming')
            <div style="text-align: center; margin-top: 30px;">
                <p style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #F8F5ED; font-size: 1.1em;">
                    {{ session('success') }} <br>
                    Terima kasih telah mengisi RSVP! <br><br>
                    Informasi Pernikahan lebih lanjut, klik link di bawah ini: <br>
                    <a href="https://read.bookcreator.com/WkJXEp7cFGeXiVaYqX5TDAtv2wA3/EErUEeKYTbWi4EqvjD6ANQ/DIjZpsQzRHuo9-0xUtiaRA"
                       target="_blank" style="color:#F9F6F1;text-decoration:underline;">
                        linktr.ee/nikah_siraman
                    </a>
                </p>
            </div>

        {{-- Jika TIDAK HADIR --}}
        @elseif (session('rsvp_status') == 'not_coming')
            <div style="text-align: center; margin-top: 30px;">
                <p style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #F8F5ED; font-size: 1.1em;">
                    {{ session('success') }} <br>
                    Terima kasih telah mengisi RSVP! <br><br>
                </p>
            </div>

        {{-- Jika BELUM submit --}}
        @else
            <form action="{{ route('rsvp.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Full Name!</label>
                    <input type="text" name="name" id="name" placeholder="Type your name here" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Active Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="rsvp_status">Konfirmasi Kehadiran</label>
                    <select name="rsvp_status" id="rsvp_status">
                        <option value="coming" {{ old('rsvp_status') == 'coming' ? 'selected' : '' }}>Hadir</option>
                        <option value="not_coming" {{ old('rsvp_status') == 'not_coming' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                </div>

                <button type="submit" class="rsvp-submit-button">Send RSVP & Get QR</button>
            </form>
        @endif

        </div>
    </div>
</section>
</body>
</html>