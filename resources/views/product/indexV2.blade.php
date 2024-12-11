@extends('layouts.master-shopper')

@section('content')
{{-- * Section Hero --}}
<section class="w-full">
    <div class=" bg-no-repeat min-h-[475px] flex items-center justify-center" style="
    background-image: url('/images/backgrounds/herbal-drink-475.png'); 
    background-size: cover;
    background-position: 0% 70%;
    ">
        <div class="text-[38px] md:text-[48px] text-white font-extrabold">
            <h1>Produk Jamu Terbaik</h1>
        </div>
    </div>
</section>

{{-- * Section Products --}}
<section id="products" class="w-full mt-[80px] min-h-screen">
    {{-- * Content Products --}}
    <div class="container mx-auto ">
        <div class="xl:mx-[150px]" >
            {{ $products->links() }}
        </div>
       
        <div class="grid grid-cols-2 md:grid-cols-3 md:gap-2 xl:grid-cols-4 xl:mx-[150px] ">
            
            @if ($products->count())
                @foreach ($products as $product)
                <div class="m-4 md:m-3 2xl:h-[402px] 2xl:w-[275px]   bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
                    <!-- Product Image -->
                    <div class="relative h-48 w-full sm:h-56 lg:h-[254px] xl:h-64 ">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        {{-- <div class="absolute top-2 right-2 bg-[#FFCC00] text-white text-xs font-semibold px-2 py-1 rounded">New</div> --}}
                    </div>
        
                    <!-- Product Details -->
                    <div class="p-4 flex flex-col h-full">
                        <!-- Product Name -->
                        <h2 class="text-md sm:text-lg font-semibold text-gray-800 truncate md:text-[18px]"><a class="hover:text-[#FFCC00]" href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h2>
        
                        <!-- Product Price -->
                        <p class="text-slate-500 font-medium text-md sm:text-lg mt-2 md:text-[16px] ">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        
                        <!-- Add to Cart Button -->
                        @if (Auth::check())
                        <form action="{{ route('user.cart.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-full bg-[#FFCC00] text-white hover:text-[#FFCC00] font-semibold py-2 rounded-lg hover:bg-opacity-15 transition">
                                Tambah ke Keranjang
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="w-full mt-4 bg-[#FFCC00] hover:text-black text-white font-semibold py-2 rounded-lg text-center block hover:bg-opacity-20  transition">
                            Login 
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <p class="col-span-full text-center text-gray-500">Belum ada produk yang tersedia.</p>
            @endif
        </div>
    </div>
</section>
@endsection
