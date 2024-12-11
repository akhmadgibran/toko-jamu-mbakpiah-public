@extends('layouts.master-shopper')

@section('content')
    <section id="hero" class="w-full min-h-screen flex items-center "  >
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                {{-- * hero description --}}
                <div class="flex flex-col justify-center items-start mx-auto  p-5 max-w-[480px]">
                    {{-- * text Selamat datang --}}
                    <div>
                        <h1 class="text-[38px] md:text-[48px] font-extrabold">
                            Selamat Datang di Jamu Mbah Piah
                        </h1>
                    </div>
                    {{-- * deskripsi welcome--}}
                    <div>
                        <h1 class="text-[18px] md:text-[24px] text-slate-500 text-bold">
                            Apakah Anda mencari solusi alami untuk kesehatan dan kebugaran? Kenalkan, Jamu Mbah Piah, ramuan tradisional turun-temurun yang dibuat dari bahan-bahan alami pilihan. Dengan resep rahasia warisan nenek moyang, Jamu Mbah Piah hadir untuk membantu menjaga kesehatan tubuh secara menyeluruh.
                        </h1>
                    </div>
                    {{-- * button --}}
                    <div class="pt-5 flex flex-row gap-2" >
                        <a href="{{ route('login') }}">
                            <div class="md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-[#FFCC00] hover:bg-opacity-20 text-white hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 " >
                                Tentang Kami
                            </div>
                        </a>
                        <a href="{{ route('product.index') }}">
                            <div class="md:block  px-5 py-2 md:px-7 md:py-3  lg:px-10 lg:py-4 bg-[#FFCC00] hover:bg-opacity-20 text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300  " >
                                Produk Kami
                            </div>
                        </a>
                    </div>
                </div>
                {{-- * hero image --}}
                <div class="flex flex-col justify-center items-start mx-auto  p-5 max-w-[480px]">
                    <div >
                        <img class="rounded-md shadow-lg"  src="/images/backgrounds/randomJamu.png" alt="">
                    </div>
                </div>
        </div>
    </section>
@endsection



