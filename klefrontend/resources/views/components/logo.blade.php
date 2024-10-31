@props(['product', 'productnum' , 'xmargin' => 'mx-auto'])
<div class="min-w-fit  min-h-fit sm:my-auto xsm:max-md:mx-auto {{$xmargin}}">
    <img src="{{ asset($productnum['logo']) }}" class="xsm:max-md:min-h-[30vw] xsm:max-md:min-w-[30vw]" style="width:15vw ; height:15vw ; border-radius: 2vw"  alt="">
</div>