<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  

.illustration-section {
    width: 100%;
    /* Pastikan gambar berada di tengah secara horizontal */
    display: flex;
    justify-content: center;
    
    /* Atur jarak agar ilustrasi tidak terlalu dekat dengan nama di atasnya */
    margin-top: 30px; 
}

.table-illustrationn {
    /* Gambar akan menyesuaikan lebar container */
    max-width: 100%; 
    height: auto;
    display: block;
    
    /* Jaga agar gambar tidak melebihi batas desain tertentu di desktop besar */
    max-height: 530px; 
}



.hero {
   
    background-size: contain; /* atau cover */
    background-repeat: no-repeat;
    background-position: bottom center;
}
  </style>
</head>
<div class="illustration-section">
    <img 
        src="{{ asset('img/footer.svg') }}" 
        alt="Meja Pesta Pernikahan" 
        class="table-illustrationn"
    >
</div>
</html>