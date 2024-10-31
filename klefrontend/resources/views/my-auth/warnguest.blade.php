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

<body class="h-full">
   
    <div class="flex flex-col col-span-3 h-[100vh] text-center align-middle">
        <div class="my-auto mx-auto">
            <div>
                <h1 class="text-[6vw]">Hata</h1>
            </div>
    
            <div>
                <h1 class="text-[3vw] text-red-600 font-light">Verileri görmek için giriş yapmalısınız</h1>
            </div>
    
    
            <div class="flex flex-row justify-center mt-[6vh] gap-x-[2vw] w-full">
                <x-forms.button class="navbtnguest form-button-responsive px-0 form-button-text-responsive">
                    <a href="/login" class="text-center w-full form-button-text-responsive">Giriş Yap</a>
                </x-forms.button>
    
                <x-forms.button class="navbtnguest form-button-responsive px-0 form-button-text-responsive">
                    <a href="/register" class="text-center w-full form-button-text-responsive">Kaydol</a>
                </x-forms.button>
            </div>
    
    
        </div>
    
    </div>

</body>

</html>


