@extends('layouts.master-shopper')

@section('content')
    <section class="w-full min-h-screen  " >
            {{-- * Page title --}}
            <div class="my-2 bg-white shadow-lg p-2" >
                {{-- * Section title --}}
                <div class="" >
                    <div class="px-5 py-2 lg:py-10 lg:px-10 " >
                        <div class="text-black text-[28px] font-extrabold" >
                            Keranjang Saya
                        </div>

                    </div>
                </div>
            </div>

            {{-- * content wrapper --}}
            <div class=" max-w-5xl mx-auto" >
                <div class="flex flex-col " >
                    <div class="p-5 max-w-full  overflow-x-scroll " >
                        @foreach ($cartItems as $item)
                        {{-- * content wrapper per items --}}
                        <div class="min-w-[400px] mt-2 flex flex-row justify-between shadow-lg rounded-md  bg-white p-5   " >
                            {{-- * column image --}}
                                <div class="p-4" >
                                <img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}" class=" min-w-[64px] min-h-[64px] w-12 h-12 md:w-16 md:h-16 rounded">
                                </div>
                            {{-- * column name & price --}}
                                <div class="p-4 flex flex-col justify-center  " >
                                    <div>
                                        <p class="font-semibold text-xs" >{{ $item->product->name }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-xs text-[#FFCC00]" >Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            {{-- * column quantity --}}
                                <div class="py-4 px-2 md:px-6 flex justify-center" >
                                        <div class="flex items-center justify-center space-x-2">
                                            <div class="flex justify-center" >
                                                <!-- Decrement Form -->
                                                <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                                    <button type="submit" class="bg-[#FFCC00] px-2 py-1 rounded hover:bg-opacity-20"  {{ $item->quantity <= 1 ? 'disabled' : '' }} >-</button>
                                                </form>

                                                <!-- Quantity Display -->
                                                <span class="px-4 my-auto"><p class="text-xs " >{{ $item->quantity }}</p></span>

                                                <!-- Increment Form -->
                                                <form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                    <button type="submit" class="bg-[#FFCC00] px-2 py-1 rounded hover:bg-opacity-20">+</button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            {{-- * column total
                                <div>
                                    <div>
                                        <p>Rp 200.000.000</p>
                                    </div>
                                </div> --}}
                            {{-- * column action --}}
                                <div class="py-4 px-2 md:px-6 text-center flex justify-center" >
                                        <form action="{{ route('user.cart.destroy', $item->id) }}" method="POST" class="flex justify-center" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <img class="h-[24px] w-[24px]"  src="{{ asset('images/icons/solid_trash-can.png') }}" alt="">
                                            </button>
                                        </form>
                                </div>
                        </div>
                        @endforeach

                        {{-- * content wrapper total and order button --}}
                        <div class="mt-5 flex flex-col shadow-lg rounded-md justify-center bg-[#FFCC00]" >
                            {{-- * row total --}}
                            <div class="p-4 flex  justify-between" >
                                <div>
                                    <p class="font-semibold text-black" >Harga Total</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-black" >Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            {{-- * row button order --}}
                            @if ( $cartItems->count() > 0 ) 
                                <div class="p-2" >
                                    <a href="{{ route('user.checkout.index') }}">
                                        <div class=" md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                                            Order Sekarang
                                        </div>
                                    </a>
                                </div>
                            

                            @else 
                                <div class="p-2" >
                                    <a  href="{{ route('product.index') }}">
                                        <div class=" md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                                            Keranjang Kosong
                                        </div>
                                    </a>
                                </div>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection