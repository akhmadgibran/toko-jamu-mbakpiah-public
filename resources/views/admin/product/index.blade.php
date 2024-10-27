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
                    <h2>Table Produk</h2>
                    <div class="mt-3">
                        <a href="{{ route('admin.product.create') }}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Tambah produk</a>
                    </div>
                    {{-- <button type="button" onclick="window.location='{{ route('admin.product.create') }}" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Produk</button> --}}
                </div>
                
                <div class="p-6">

                    <!-- resources/views/components/product-table.blade.php -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="p-4 border-b border-gray-200">#</th>
                                    <th class="p-4 border-b border-gray-200">ID Produk</th>
                                    <th class="p-4 border-b border-gray-200">Nama Produk</th>
                                    <th class="p-4 border-b border-gray-200">Deskripsi Produk</th>
                                    <th class="p-4 border-b border-gray-200">Harga</th>
                                    <th class="p-4 border-b border-gray-200">Foto Produk</th>
                                    <th class="p-4 border-b border-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr class="hover:bg-gray-50">
                                        <!-- Row Number -->
                                        <td class="p-4 border-b border-gray-200 text-gray-700">{{ $index + 1 }}</td>

                                        <!-- Product ID -->
                                        <td class="p-4 border-b border-gray-200 text-gray-700">{{ $product->id }}</td>

                                        <!-- Product Name -->
                                        <td class="p-4 border-b border-gray-200 text-gray-700">{{ $product->name }}</td>

                                        <!-- Product Description -->
                                        <td class="p-4 border-b border-gray-200 text-gray-600">{{ Str::limit($product->description, 50) }}</td>

                                        <!-- Product Price in IDR -->
                                        <td class="p-4 border-b border-gray-200 text-gray-700">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <!-- Product Image -->
                                        <td class="p-4 border-b border-gray-200">
                                            <div class="w-20 h-20 overflow-hidden rounded-lg">
                                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            </div>
                                        </td>

                                        <!-- Actions -->
                                        <td class="p-4 border-b border-gray-200">
                                            <div class="flex space-x-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.product.edit', $product->id) }}" class="px-3 py-1 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    Edit
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
