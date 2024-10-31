<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Layout</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Script --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="h-full w-screen overflow-x-hidden">
   
    <div class="header-responsive">
        <div>
            <h1 class="h1-responsive">Site</h1>
        </div>

            <div class="nav-link-div">
                <a href="/home" class="navlink">Ana Sayfa</a>
                <a href="/product/create" class="navlink">Ürün Oluştur</a>
            </div>

            <div class="nav-btn-div">
                <div class="navbtn">
                    <form method="POST" action="/logout">
                        @csrf
                        <button>Çıkış Yap</button>
                    </form>
                </div>
            </div>

        </div>

        
        
        {{ $slot }}

</body>

</html>