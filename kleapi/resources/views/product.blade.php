<x-my-layout>


    <div class="mt-[3vw]">

        <div class="flex flex-row gap-x-[5vw] max-md:flex-col max-md:items-center">

            <x-logo :$product :xmargin="$xmargin='mx-[10vw]'" class="pt-5 max-w-[15vw] min-w-[15vw] min-h-[30vw] max-h-[35vw]"></x-logo>

            <x-product-info :$product></x-product-info>
        </div>

    </div>

</x-my-layout>
