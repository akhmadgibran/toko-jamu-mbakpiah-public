<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="mt-3">
                        <a href="{{ route('user.product.index') }}" class=" text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-white-600 dark:hover:bg-white-700 focus:outline-none dark:focus:ring-blue-800" >Kembali</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    <!-- resources/views/components/product-details.blade.php -->
                    <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-lg space-y-6 md:space-y-0 md:flex md:space-x-8">
                        <!-- Product Image -->
                        <div class="w-full md:w-1/2 h-96 rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>

                        <!-- Product Details Section -->
                        <div class="w-full md:w-1/2 flex flex-col justify-between">
                            <!-- Product Name -->
                            <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>

                            <!-- Product Price -->
                            <p class="text-2xl font-medium text-gray-600 mt-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                            <!-- Product Description -->
                            <p class="text-gray-700 mt-4 leading-relaxed">{{ $product->description }}</p>

                            <!-- Add to Cart Button -->
                            <button type="button" class="mt-6 bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
