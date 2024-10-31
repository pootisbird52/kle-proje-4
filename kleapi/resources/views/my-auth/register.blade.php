<x-guest-layout>
    <x-forms.form class="" method="POST" action="/register" >

    <x-forms.input label="İsim" name="first_name" id="first_name" required></x-forms.input>
    <x-forms.input label="Soyisim" name="last_name" id="last_name" required></x-forms.input>
    <x-forms.input label="E-Posta" name="email" id="email"  required></x-forms.input>
    <x-forms.input label="Şifre" name='password' id="password" type="password" required></x-forms.input>
    <x-forms.input label="Şifreyi Doğrula" name='password_confirmation' id="password_confirmation" type="password" required></x-forms.input>
    
    <div class="mt-[2vw]"></div>
    <div class="">
        <x-forms.button class=" float-right form-button-responsive px-0 form-button-text-responsive mt-[1vw]">Kaydol</x-forms.button>

    </div>
    </x-forms.form>
</x-guest-layout>

