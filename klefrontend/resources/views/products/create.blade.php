<x-my-layout>
    <h1 class="h1-responsive text-center mt-[2vw]">Ürün Oluştur</h1>

    <form class=" mx-auto space-y-6" method="POST" action="/product" enctype="multipart/form-data">
        @csrf
        <div class="max-w-[70vw] form-text-responsive mx-auto space-y-[3vw]">
            <x-forms.input label="Ürün Adı" name="title" ></x-forms.input>
            <x-forms.input label="Ürün Fiyatı" type="number" name="price" ></x-forms.input>
            <x-forms.input label="Ürün Açıklaması" name="description"></x-forms.input>
            
     
        </div>
               <x-forms.divider/>
        

        <div class="flex justify-end items-center">

            <x-forms.button class="mr-[4vw] form-button-responsive px-0 form-button-text-responsive mt-[1vw]">Oluştur</x-forms.button>
        </div>
    </form>

</x-my-layout>