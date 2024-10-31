<x-guest-layout>
    <x-forms.form class="" method="POST" action="/login" >

    <x-forms.input label="E-Posta" name="email" id="email"  required></x-forms.input>
    <x-forms.input label="Şifre" name="password" id="password" type="password" required></x-forms.input>
    
    
    <div class="mt-[2vw]"></div>
    <div class="">
        <x-forms.button class=" float-right form-button-responsive px-0 form-button-text-responsive mt-[1vw]">Giriş Yap</x-forms.button>

    </div>
</x-forms.form>
</x-guest-layout>

