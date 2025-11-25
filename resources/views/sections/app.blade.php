<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan Raya & Khafidz</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <style> 

        /* --- 1. HEADER/NAVIGASI --- */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 10px 10px; 
            background-color: rgba(249, 246, 241, 0.95); /* Krem transparan */
            transition: transform 0.3s ease;
            z-index: 999;
            display: flex;
            justify-content: center;
        }

        .header.hidden {
            transform: translateY(-100%);
        }

        header ul {
            display: flex;
            justify-content: center;
            font-family: 'Montserrat', sans-serif; 
            gap: 30px; 
            list-style: none;
            padding: 0; 
            margin: 0; 
            max-width: 900px;
            width: 100%;
        }

        header a {
            text-decoration: none;
            color: #1E5B87; /* Warna biru gelap */
            font-weight: 700;
            font-size: 0.8em;
            letter-spacing: 0.1em; 
            text-transform: uppercase;
            transition: color 0.2s ease;
        }

        header a:hover {
            color: #0E4B77;
        }

        /* --- 2. app SECTION --- */
        .app {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%; 
            /* Jarak dari body margin */
            margin-top: 20px; 
        }

        .invitation-container {
            text-align: center;
            max-width: 1350px; 
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            /* Jarak dari header fixed di atas */
            margin-top: 60px; 
        }

        /* Teks Utama (Container Relatif) */
        .text-section {
            position: relative;
            display: inline-block; 
            width: 350px; 
            height: 180px; 
            margin-bottom: 30px; 
        }

        /* Teks Melengkung (We're getting married) */
        .curved-text-container {
            font-family: 'Dancing Script', cursive; 
            color: #1E5B87; 
            font-size: 1.8em; 
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%); 
            width: 300px; 
            height: 150px;
        }

        .curved-char {
            position: absolute; 
            display: inline-block;
            top: 0;
            left: 50%; 
            transform-origin: 0 1000%; 
            transform: rotate(var(--rotation)); 
            margin-left: -0.5em; 
        }

        /* Nama (Raya & Khafidz) */
        .names {
            font-family: 'Beth Ellen', cursive;
            font-size: 3em; 
            color: #1E5B87; 
            line-height: 1;
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -10%); 
            width: 280px; 
            height: 120px; 
        }

        .name-raya, .name-amp, .name-khafidz {
            position: absolute;
            white-space: nowrap;
            
        }

        .name-raya {
            top: 0; left: 0; 
            transform: translate(-15%, 0); 
            font-size: 1.1em;
        }

        .name-amp {
            top: 45%; left: 50%;
            transform: translate(-50%, -50%); 
            font-size: 0.8em; 
        }

        .name-khafidz {
            bottom: 0; right: 0; 
            transform: translate(15%, 0); 
            font-size: 1.1em;
        }

        /* Ilustrasi */
        .illustration-section {
            width: 100%;
            display: flex;
            justify-content: center;
        } */

        .table-illustration {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* --- MEDIA QUERIES --- */
        @media (max-width: 768px) {
            .header ul {
                gap: 15px;
                padding: 0 10px; 
                overflow-x: auto; 
                white-space: nowrap;
                justify-content: flex-start;
            }
            .header a {
                font-size: 0.7em;
            }
            .text-section {
                width: 300px;
                height: 150px; 
                margin-top: 20px;
            }
            .curved-text-container {
                font-size: 1.5em;
                width: 250px;
                height: 120px;
            }
            .names {
                font-size: 2.5em;
                width: 200px;
                height: 100px;
                transform: translate(-50%, 0); 
            }
        }
    </style>
</head>

<header id="mainHeader" class="header">
        <nav>
            <ul>
                <li><a href="#hero">OUR STORY</a></li>
                <li><a href="#event">TIME LINE</a></li>
                <li><a href="#story">INFORMATION</a></li>
                <li><a href="#rsvp">RSVP</a></li>
            </ul>
        </nav>
    </header>

    <section class="app" id="app"> 
        <div class="invitation-container">
            <div class="text-section">
                <div class="curved-text-container">
                    <span class="curved-char" style="--rotation: -50deg;">W</span>
                    <span class="curved-char" style="--rotation: -45deg;">e</span>
                    <span class="curved-char" style="--rotation: -40deg;">'</span>
                    <span class="curved-char" style="--rotation: -35deg;">r</span>
                    <span class="curved-char" style="--rotation: -30deg;">e</span>
                    <span class="curved-char" style="--rotation: -25deg;"> </span>
                    <span class="curved-char" style="--rotation: -20deg;">g</span>
                    <span class="curved-char" style="--rotation: -15deg;">e</span>
                    <span class="curved-char" style="--rotation: -10deg;">t</span>
                    <span class="curved-char" style="--rotation: -5deg;">t</span>
                    <span class="curved-char" style="--rotation: 0deg;">i</span>
                    <span class="curved-char" style="--rotation: 5deg;">n</span>
                    <span class="curved-char" style="--rotation: 10deg;">g</span>
                    <span class="curved-char" style="--rotation: 15deg;"> </span>
                    <span class="curved-char" style="--rotation: 20deg;">m</span>
                    <span class="curved-char" style="--rotation: 25deg;">a</span>
                    <span class="curved-char" style="--rotation: 30deg;">r</span>
                    <span class="curved-char" style="--rotation: 35deg;">r</span>
                    <span class="curved-char" style="--rotation: 40deg;">i</span>
                    <span class="curved-char" style="--rotation: 45deg;">e</span>
                    <span class="curved-char" style="--rotation: 50deg;">d</span>
                </div>

                <h1 class="names">
                    <span class="name-raya">Raya</span>
                    <span class="name-amp">&amp;</span>
                    <span class="name-khafidz">Khafidz</span>
                </h1>
            </div>

            <div class="illustration-section">
                <img 
                    src="{{ asset('img/meja.svg') }}" 
                    alt="Meja Pesta Pernikahan" 
                    class="table-illustration"
                >
            </div>
        </div>
    </section>

   <script>
    const header = document.getElementById("mainHeader");
    let lastScroll = 0;

    // --- FUNGSI SCROLL HALUS (BARU) ---
    document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah aksi lompat (jump) default browser

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                // Lakukan scroll animasi ke elemen target
                targetElement.scrollIntoView({
                    behavior: 'smooth' // Mengaktifkan scroll halus JavaScript
                });
                // Pastikan header muncul setelah diklik
                header.classList.remove('hidden'); 
            }
        });
    });

    // --- FUNGSI HIDE/SHOW HEADER (LAMA, TIDAK BERUBAH) ---
    window.addEventListener("scroll", function () {
        let currentScroll = window.pageYOffset;

        if (currentScroll > lastScroll && currentScroll > 50) { 
            header.classList.add("hidden");
        } else {
            header.classList.remove("hidden");
        }

        lastScroll = currentScroll;
    });
</script>
</html>