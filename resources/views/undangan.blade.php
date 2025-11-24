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
    @include('sections.app')

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
    


</body>
</html>
