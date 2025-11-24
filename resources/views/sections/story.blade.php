<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* --- SCHEDULE SECTION (Full Image Display) --- */
.schedule-section {
    padding: 60px 20px;
    text-align: center;
    background-color: #f8f5ed; /* Warna latar belakang */
}

/* Container untuk gambar */
.schedule-image-container {
    width: 100%;
    max-width: 1300px; /* Batasi lebar untuk tampilan desktop agar tidak terlalu melebar */
    margin: 0 auto;
    border-radius: 10px;
    overflow: hidden; /* Penting untuk menjaga border-radius jika ada bayangan */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Gaya untuk Gambar itu sendiri */
.schedule-image {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 768px) {
    .schedule-section {
        padding: 40px 10px;
    }
    .schedule-image-container {
        max-width: 100%; /* Biarkan gambar mengambil lebar penuh di ponsel */
        box-shadow: none; /* Hilangkan bayangan agar terlihat alami di ponsel */
    }
}
    </style>
</head>
<section id="schedule" class="schedule-section">
    
    <div class="schedule-image-container">
        <img 
            src="{{ asset('img/schedule.svg') }}" 
            alt="The Schedule: Urutan acara Siraman, Ijab Qabul, dan Panggih" 
            class="schedule-image"
        >
        </div>
</section>
</html>