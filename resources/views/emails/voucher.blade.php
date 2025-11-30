<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Spesial Untuk Anda</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .header {
            background: #3a3a3a;
            padding: 30px 20px 40px 20px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, transparent 49%, #2d2d2d 50%, #2d2d2d 100%);
            z-index: 0;
        }
        
        .logo-container {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .wedding-logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: white;
            padding: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            object-fit: cover;
        }
        
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .header p {
            margin: 10px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .content {
            padding: 40px 30px;
            background-color: white;
            position: relative;
        }
        
        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        .message {
            font-size: 15px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }
        
        .voucher-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .voucher-title {
            font-size: 24px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
        }
        
        .qr-code {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .qr-code img {
            display: block;
            width: 250px;
            height: 250px;
            margin: 0 auto;
        }
        
        .voucher-code {
            font-size: 16px;
            font-weight: 600;
            color: #667eea;
            margin-top: 15px;
            letter-spacing: 1px;
        }
        
        .discount-badge {
            background-color: #48bb78;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 18px;
            font-weight: 700;
            display: inline-block;
            margin-top: 10px;
        }
        
        .instructions {
            background-color: #fef5e7;
            border-left: 4px solid #f39c12;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .instructions-title {
            font-size: 18px;
            font-weight: 600;
            color: #e67e22;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .instructions-title::before {
            content: "📋";
            margin-right: 8px;
            font-size: 20px;
        }
        
        .instructions ol {
            margin: 0;
            padding-left: 20px;
        }
        
        .instructions li {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        
        .instructions li strong {
            color: #d35400;
        }
        
        .note {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .note-title {
            font-weight: 600;
            color: #856404;
            margin-bottom: 8px;
        }
        
        .note-text {
            font-size: 13px;
            color: #856404;
            line-height: 1.5;
        }
        
        .details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .details-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .details-row:last-child {
            border-bottom: none;
        }
        
        .details-label {
            font-weight: 600;
            color: #495057;
            width: 150px;
            flex-shrink: 0;
        }
        
        .details-value {
            color: #6c757d;
        }
        
        .footer {
            background-color: #2d3748;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
        
        .footer-message {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .footer-submessage {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 20px;
        }
        
        .social-links {
            margin-top: 20px;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .content {
                padding: 30px 20px;
            }
            
            .qr-code img {
                width: 200px;
                height: 200px;
            }
            
            .details-row {
                flex-direction: column;
            }
            
            .details-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header dengan Logo -->
        <div class="header">
      
            <h1>🎉 Voucher Spesial Untuk Anda!</h1>
            <p>Terima kasih telah mengkonfirmasi kehadiran</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <!-- Greeting -->
            <div class="greeting">
                Halo 👋, <strong>{{ $guest->name }}</strong>
            </div>
            
            <!-- Message -->
            <div class="message">
                Terima kasih telah mengkonfirmasi kehadiran Anda di acara pernikahan kami! Sebagai bentuk apresiasi, kami memberikan voucher diskon spesial yang dapat Anda gunakan untuk pembelian merchandise pernikahan.
            </div>
            
            <!-- Voucher Card -->
            <div class="voucher-card">
                <div class="voucher-title">QR CODE</div>
        <img src="{{ $message->embedData(base64_decode($qrCodeBase64), 'qrcode.png', 'image/png') }}" alt="Voucher QR Code">
    </div>
                
                <div style="margin-top: 20px; padding-top: 20px; border-top: 2px solid rgba(0,0,0,0.1);">
                    <div style="font-size: 12px; color: #666; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Jenis Diskon</div>
                    <div class="discount-badge">DISKON 10%</div>
                </div>
            </div>
            
            <!-- Voucher Details -->
            <div class="details">
                <div class="details-row">
                    <div class="details-label">Nama Tamu:</div>
                    <div class="details-value">{{ $guest->name }}</div>
                </div>
                <div class="details-row">
                    <div class="details-label">Email:</div>
                    <div class="details-value">{{ $guest->email }}</div>
                </div>
                <div class="details-row">
                    <div class="details-label">No. WhatsApp:</div>
                    <div class="details-value">{{ $guest->phone }}</div>
                </div> 
            </div>
            
            <!-- Instructions -->
            <div class="instructions">
                <div class="instructions-title">Cara Menukar Voucher:</div>
                <ol>
                    <li><strong>Simpan</strong> email ini atau <strong>screenshot</strong> QR Code di atas</li>
                    <li><strong>Datang</strong> ke booth merchandise lokasi acara pernikahan</li>
                    <li><strong>Tunjukkan</strong> QR Code kepada tim merchandise kami</li>
                    <li><strong>Tim kami</strong> akan scan QR Code untuk memvalidasi voucher Anda</li>
                    <li><strong>Pilih</strong> merchandise favorit Anda dan nikmati diskonnya!</li>
                </ol>
                
                <div class="note">
                    <div class="note-title">⚠ NOTE:</div>
                    <div class="note-text">
                        Voucher hanya bisa discan satu kali. Pastikan Anda sudah memilih merchandise yang diinginkan sebelum melakukan pembayaran.
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-message">Sampai Jumpa di Hari H! 💐</div>
            <div class="footer-submessage">
                Kami sangat menantikan kehadiran Anda dalam momen bahagia kami
            </div>
            
            <div class="social-links">
                <p style="margin: 0; font-size: 12px; opacity: 0.7;">
                    Email ini dikirim otomatis, mohon tidak membalas email ini.
                </p>
            </div>
        </div>
    </div>
</body>
</html>