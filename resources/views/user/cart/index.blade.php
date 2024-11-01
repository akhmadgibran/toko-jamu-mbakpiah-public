<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keranjang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"

                    <!-- Cart Page Container -->
                    <div class="max-w-5xl mx-auto p-4">
                        <!-- Cart Header -->
                        <h1 class="text-2xl font-bold mb-4">Your Cart</h1>

                        <!-- Cart Items Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-gray-100 border-b">
                                        <th class="py-3 px-2 md:px-6 text-left">Product</th>
                                        <th class="py-3 px-2 md:px-6 text-left">Price</th>
                                        <th class="py-3 px-2 md:px-6 text-center">Quantity</th>
                                        <th class="py-3 px-2 md:px-6 text-left">Total</th>
                                        <th class="py-3 px-2 md:px-6 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Row -->
                                    @foreach ($cartItems as $item)
                                    <tr class="border-b">
                                        <!-- Product Info -->
                                        <td class="py-4 px-2 md:px-6 flex items-center space-x-2 md:space-x-4">
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}" class="w-12 h-12 md:w-16 md:h-16 rounded">
                                            <span class="text-sm md:text-base font-medium">{{ $item->product->name }}</span>
                                        </td>

                                        <!-- Product Price -->
                                        <td class="py-4 px-2 md:px-6 text-sm md:text-base">
                                            Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                        </td>

                                        <!-- Quantity Controls -->
                                        <td class="py-4 px-2 md:px-6 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <!-- Decrement Form -->
                                                <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                                    <button type="submit" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                                </form>

                                                <!-- Quantity Display -->
                                                <span class="px-4">{{ $item->quantity }}</span>

                                                <!-- Increment Form -->
                                                <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                    <button type="submit" class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300">+</button>
                                                </form>
                                            </div>
                                        </td>

                                        <!-- Total Price Per Item -->
                                        <td class="py-4 px-2 md:px-6 text-sm md:text-base">
                                            Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                        </td>

                                        <!-- Remove Button -->
                                        <td class="py-4 px-2 md:px-6 text-center">
                                            <form action="{{ route('user.cart.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Cart Summary -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold">Total Price:</span>
                                <span class="text-xl font-bold">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>

                            <!-- Checkout Button -->
                            <button class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                Proceed to Checkout
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
