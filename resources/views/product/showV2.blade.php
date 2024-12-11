@extends('layouts.master-shopper')

@section('content')
<section class="w-full h-full" >
    <div class="mt-[80px] grid grid-cols-1 lg:grid-cols-2" >
            {{-- * Image and Name --}}
        <div class="pb-10 lg:py-40 pt-5 lg:col-start-2 lg:row-start-1 " >
            <div class="flex flex-col   " >
                {{-- * Name --}}
                <div class="px-5 py-2" >
                    <div class="text-[28px] md:text-[38px] lg:text-[48px] font-bold text-black">
                        {{ $product->name }}
                    </div>
                </div>
                {{-- * Image --}}
                <div class="py-2" >
                    <div class="flex justify-center items-center" >
                        <div class=" " >
                            <div class="h-[384px] w-[384px] lg:h-[484px] lg:w-[484px] " >
                                <img class="w-full h-full object-cover rounded-md shadow-2xl"  src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            {{-- * name Description and price --}}
        <div class="bg-[#282828] pt-10 pb-20 lg:py-40 rounded-t-lg lg:rounded-r-lg lg:col-start-1 lg:row-start-1 flex justify-center" >
            <div class=" flex flex-col mx-center px-10 lg:max-w-[579px] lg:min-w-[579px]" >
                {{-- * price --}}
                <div class="px-5 py-2" >
                    <div class="text-[#FFCC00] text-[28px]" >
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                </div>

                {{-- * descriptions --}}
                <div class="px-5 py-2 lg:min-h-[300px] " >
                    <div class="text-white text-[20px]" >
                        {{ $product->description }}
                    </div>
                </div>

                {{-- * buttons --}}
                <div class="flex flex-col gap-2 justify-between mx-10 my-3" >
                    @if (Auth::check())
                    {{-- <a href="{{ route('product.index') }}">
                        <div class="md:block  px-5 py-2 md:px-7 md:py-3  lg:px-10 lg:py-4 bg-[#FFCC00] hover:bg-opacity-20 text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                            Tambah Keranjang
                        </div>
                    </a> --}}
                    <form action="{{ route('user.cart.store') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="md:block w-full  px-5 py-2 md:px-7 md:py-3  lg:px-10 lg:py-4 bg-[#FFCC00] hover:bg-opacity-20 text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center ">
                            Tambah ke Keranjang
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}">
                        <div class="md:block  px-5 py-2 md:px-7 md:py-3  lg:px-10 lg:py-4 bg-[#FFCC00] hover:bg-opacity-20 text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                            login
                        </div>
                    </a>
                    @endif
                    <a href="{{ route('product.index') }}">
                        <div class="mt-2 md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-opacity-20   text-[#FFCC00] hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                            Kembali
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
