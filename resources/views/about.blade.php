@extends('layouts.master-shopper')

@section('content')
{{-- * Section Hero --}}
<section class="w-full p-5 bg-white ">
    <div class="mx-auto max-w-[1310px] rounded-md bg-no-repeat min-h-[475px] flex items-center justify-center" style="
    background-image: url('/images/backgrounds/about-background.jpg'); 
    background-size: cover;
    background-position: 100% 70%;
    ">
        <div class="text-[38px] md:text-[48px] text-white font-extrabold text-center">
            <h1>Tentang Jamu Mbak Piah</h1>
        </div>
    </div>
</section>

{{-- * Section Products --}}
<section id="products" class="w-full  bg-white p-5">
    {{-- * Content Products --}}
    <div class="container mx-auto max-w-[420px] ">
        <div class="p-5 text-center mx-auto" >
            <h2 class="text-[28px]  font-extrabold" >Tentang Jamu Mbak Piah</h2>
            <br>
            <br>
            <p class="text-[16px] " >Kami hadir sebagai penjaga tradisi jamu Nusantara yang kaya akan manfaat kesehatan. Dengan resep rahasia yang diwariskan secara turun-temurun, Jamu Mbak Piah diracik dari bahan-bahan alami pilihan yang diambil langsung dari alam. Setiap tetesnya menghadirkan kebaikan yang dirancang untuk membantu menjaga keseimbangan tubuh, meningkatkan kebugaran, dan mendukung kesehatan secara menyeluruh.</p>
            <p class="text-[16px] " >Kami percaya bahwa kesehatan yang baik dimulai dari alam. Oleh karena itu, semua produk kami dibuat tanpa bahan kimia berbahaya, menjadikannya pilihan yang aman dan alami untuk Anda dan keluarga. Di Jamu Mbak Piah, kami meracik setiap produk dengan penuh cinta dan dedikasi, menjaga tradisi leluhur sambil menghadirkan solusi modern untuk kebutuhan kesehatan Anda.</p>
           
        </div>
    </div>
</section>
@endsection
