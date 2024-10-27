<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Form Tambah Produk</h2>
                    <div class="mt-3">
                        <a href="{{ route('admin.product.index') }}" class=" text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-white-600 dark:hover:bg-white-700 focus:outline-none dark:focus:ring-blue-800" >Kembali</a>
                    </div>
                </div>
                
                <div class="p-6">
                    <!-- resources/views/components/product-form.blade.php -->
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg sm:p-6 md:p-8">
                            @csrf
                            <h2 class="text-xl sm:text-2xl font-semibold mb-4">Tambah Produk Baru</h2>

                            <!-- Product Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-medium">Nama Produk</label>
                                <input type="text" name="name" id="name" class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukan Nama Produk" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Product Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-medium">Deskripsi Produk</label>
                                <textarea name="description" id="description" class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Masukan Deskripsi Produk" required></textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Product Price -->
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 font-medium">Harga Produk</label>
                                <input type="number" name="price" id="price" class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukan Harga Produk (angka)" required step="0.01" min="0">
                                @error('price')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Product Image -->
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 font-medium">Gambar Produk</label>
                                <input type="file" name="image" id="image" class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*" required>
                                <p class="text-gray-500 text-sm mt-1">Rekomendasi resolution: 600x600 pixels</p>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Tambah Produk</button>
                        </form>

                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
