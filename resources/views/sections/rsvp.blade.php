<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Undangan</title>
    <!-- Ganti dengan styling Anda, cth: Tailwind -->
    <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
    <style>
        /* --- RSVP SECTION --- */
.rsvp-section {
    padding: 100px 10px;
    background-color: #f8f5ed;
    display: flex;
    flex-wrap: wrap; /* Agar konten bisa bungkus ke bawah di layar kecil */
    justify-content: center;
    gap: 40px; /* Jarak antara teks dan form */
    max-width: 900px; /* Batasi lebar total section */
    margin: 0 auto;
}

.rsvp-header {
    width: 100%;
    text-align: right; /* "get in touch!" di kanan */
    margin-bottom: 40px;
}

.rsvp-header h2 {
    font-family: 'Beth Ellen', cursive;
    font-size: 3em;
    color: #1E5B87;
    margin: 0;
}

.rsvp-text-content {
    flex: 1; /* Ambil ruang sebanyak mungkin */
    max-width: 400px; /* Batasi lebar teks */
    text-align: left;
    font-family: 'Poppins', sans-serif;
    color: #333;
    font-size: 1em;
    line-height: 1.8;
}

.rsvp-text-content p {
    margin-bottom: 15px;
    font-size: 25px;
    font-style: 'poppins',bold  ;
    color: #1E5B87;
}

.rsvp-form-container {
    flex-shrink: 0; /* Jangan menyusut */
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
    border: none; /* Hapus border */
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.9); /* Latar belakang input putih transparan */
    font-family: 'Poppins', sans-serif;
    color: #767676;
    font-size: 0.9em;
    box-sizing: border-box; /* Agar padding tidak menambah lebar */
}

.form-group input::placeholder {
    color: #D9D9D9;
}

.rsvp-submit-button {
    width: 100%;
    padding: 15px 20px;
    background-color: #F8F5ED; /* Warna krem untuk tombol */
    color: #1E5B87; /* Warna teks biru */
    border: none;
    border-radius: 8px;
    font-family: 'Montserrat', sans-serif; /* Font Montserrat untuk tombol */
    font-weight: 700;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 15px;
}

.rsvp-submit-button:hover {
    background-color: #e0dcd2; /* Sedikit gelap saat hover */
}

/* Responsif */
@media (max-width: 768px) {
    .rsvp-section {
        flex-direction: column; /* Tumpuk ke bawah */
        gap: 30px;
        padding: 50px 15px;
    }
    .rsvp-header {
        text-align: center; /* Judul di tengah */
        margin-bottom: 30px;
    }
    .rsvp-header h2 {
        font-size: 2.5em;
    }
    .rsvp-text-content,
    .rsvp-form-container {
        max-width: 100%; /* Ambil lebar penuh */
    }
    .rsvp-form-container {
        padding: 25px;
    }
    .rsvp-text-content p {
        font-size: 0.9em;
    }
}
    </style>
</head>
<section id="rsvp" class="rsvp-section">
    <div class="rsvp-header">
        <h2>get in touch!</h2>
    </div>

    <div class="rsvp-text-content">
        <p>
            Secure Your Spot!" We would be over the moon to celebrate this special day with you. Please fill in your details below to confirm your attendance.
        </p>
        <p>
            Note: Make sure to use an active email address. We will send your Access QR Code directly to your inbox!
        </p>
    </div>

    <div class="rsvp-form-container">
        <h3>Join the Celebration</h3>

        {{-- Tampilkan error validasi (TETAP DI ATAS FORM) --}}
        @if ($errors->any())
            <div style="background-color: #fce8e8; border: 1px solid #f2b4b4; color: #cc0000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        {{-- KONDISI: Jika RSVP berhasil, TAMPILKAN UCAPAN TERIMA KASIH SAJA --}}
        @if (session('success'))
            <div style="text-align: center; margin-top: 30px;">
                <p style="
                    font-family: 'Montserrat', sans-serif;
                    font-weight: 700;
                    color: #F8F5ED; /* Warna krem agar kontras dengan latar biru */
                    font-size: 1.1em;
                    line-height: 1.5;
                ">
                    {{-- Pesan Sukses --}}
                    {{ session('success') }}
                    
                    {{-- Teks Tambahan Selesai Mengisi RSVP --}}
                    <br>
                    **Terima kasih telah mengisi RSVP!**
                </p>
            </div>
        @else
        {{-- KONDISI: Jika belum berhasil/baru dibuka, TAMPILKAN FORM --}}
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
                {{-- Input Konfirmasi Kehadiran sebagai Select --}}
                <div class="form-group">
                    <label for="rsvp_status">Konfirmasi Kehadiran</label>
                    <select name="rsvp_status" id="rsvp_status">
                        <option value="coming" {{ old('rsvp_status') == 'coming' ? 'selected' : '' }}>Hadir</option>
                        <option value="not_coming" {{ old('rsvp_status') == 'not_coming' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                </div>
                <button type="submit" class="rsvp-submit-button">
                    Send RSVP & Get QR
                </button>
            </form>
        @endif
    </div>
</section>
</html>
