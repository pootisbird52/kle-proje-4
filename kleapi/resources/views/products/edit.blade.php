<x-my-layout>
    <h1 class="h1-responsive text-center">Ürün Düzenle</h1>

    <form class="mx-auto space-y-6" method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="max-w-[70vw] form-text-responsive mx-auto space-y-[3vw]">
            <x-forms.input label="Ürün Adı" name="title" value="{{$product->title}}"></x-forms.input>
            <x-forms.input label="Ürün Fiyatı" type="number" name="price" value="{{$product->price}}"></x-forms.input>
            <x-forms.input label="Ürün Açıklaması" name="description" value="{{$product->description}}"></x-forms.input>           
        </div>
        <x-forms.divider/>
        

        <div class="flex justify-end items-center">

            <x-forms.button class="mr-[4vw] form-button-responsive px-0 form-button-text-responsive mt-[1vw]">Kaydet</x-forms.button>
        </div>
    </form>
    <form action="/product/{{ $product->id }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-my-layout>