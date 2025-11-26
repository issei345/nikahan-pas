<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>/* --- SAVE THE DATE SECTION (TIME LINE) --- */
.date-section {
    padding: 80px 20px;
    text-align: center;
    background-color: #f8f5ed; 
}

.date-section h2 {
    /* Gaya Judul: "Save The Date!" (Tetap menggunakan Beth Ellen) */
    font-family: 'Beth Ellen', cursive;
    font-size: 64px;
    color: #1E5B87;
    margin-bottom: 40px;
    line-height: 1.2;
}

/* Container untuk SVG Kalender */
.calendar-container {
    width: 100%;
    max-width: 1300px; /* Batasi lebar agar tidak terlalu besar di desktop */
    margin: 0 auto;
}

/* Gaya untuk SVG itu sendiri */
.calendar-svg {
    width: 100%;
    height: auto;
    display: block; /* Penting untuk menghilangkan spasi bawah */
    /* Tambahkan bayangan ringan jika SVG Anda tidak memilikinya */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
    border-radius: 20px; /* Untuk menyesuaikan bayangan dengan sudut kalender */
}


@media (max-width: 768px) {
    .date-section h2 {
        font-size: 2.2em;
    }
    .calendar-container {
        max-width: 350px;
    }
}
</style>
</head>
<section id="event" class="date-section">
    
    <h2>Save The Date!</h2>

    <div class="calendar-container">
        <img 
            src="{{ asset('img/kalender.svg') }}" 
            alt="Kalender Pernikahan" 
            class="calendar-svg">    
        </div>
</section>
</html>