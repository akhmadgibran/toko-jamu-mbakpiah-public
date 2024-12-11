<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di Toko Jamu Mbak Piah 👋') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"">
                        @foreach ($products as $product )
                         <a href="{{ route('product.show', $product->id) }}" class="block max-w-xs bg-white rounded-lg shadow-md overflow-hidden transform transition hover:scale-105">
                            <!-- resources/views/components/product-card.blade.php -->
                            <div class="max-w-xs bg-white rounded-lg shadow-md overflow-hidden transform transition hover:scale-105">
                                <!-- Product Image -->
                                <div class="h-48 w-full overflow-hidden">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Product Details -->
                                <div class="p-4">
                                    <!-- Product Name -->
                                    <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>

                                    <!-- Product Price -->
                                    <p class="text-gray-500 font-medium mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                                    <!-- Add to Cart Button -->
                                    
                                    <form action="{{ route('user.cart.store') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                            Tambah ke Keranjang
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
