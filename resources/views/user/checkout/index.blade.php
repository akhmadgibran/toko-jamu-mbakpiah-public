@extends('layouts.master-shopper')

@section('content')
<section class="w-full min-h-screen mb-[80px]" >
    {{-- * Page title --}}
    <div class="my-2 bg-white shadow-lg p-2" >
        {{-- * Section title --}}
        <div class="" >
            <div class="px-5 py-2 lg:py-10 lg:px-10 " >
                <div class="text-black text-[28px] font-extrabold" >
                    Buat Order
                </div>
            </div>
        </div>
    </div>

    {{-- * content container --}}
    <div class="grid grid-col-1 lg:grid-cols-2 bg-white h-full p-5" >
        {{-- * content cart --}}
        <div class="flex justify-center overflow-x-auto max-w-[800px]" >
            <div class="p-5 lg:p-10   " >
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
                                                <button type="submit" class="bg-[#FFCC00] px-2 py-1 rounded hover:bg-opacity-20" {{ $item->quantity <= 1 ? 'disabled' : '' }}  >-</button>
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
            </div>
        </div>

        {{-- * content preview alamat - telpon , note buyer , harga total ,Qris, no tlp seller, tombol  order --}}
        <div class="flex justify-center overflow-x-auto max-w-[800px]" >
            <div class="p-5 lg:p-10  " >

            {{-- * content wrapper preview alamat - telpon , note buyer , harga total ,Qris, no tlp seller ,tombol order --}}
            <div class="mt-5 lg:mt-0 flex flex-col shadow-lg rounded-md justify-center bg-[#FFCC00]" >
                <form action="{{ route('user.checkout.store') }}" method="POST" class="mt-4">
                    @csrf

                    {{-- * preview alamat - telpon --}}
                    <div class="p-4 flex flex-col " >
                        {{-- * preview alamat --}}
                        <div class="" >
                            <p class="font-semibold text-black text-sm lg:text-[16px]" >Alamat Pengiriman :</p>
                            <p class=" text-black lg:text-[32px]" >{{ auth()->user()->address }}</p>
                            <p class="font-semibold text-white text-xs lg:text-sm" >* Ubah alamatmu di menu profile</p>
                            <p class="font-semibold text-red-500 text-xs lg:text-sm" >* Alamat pengiriman order tidak bisa diubah setelah melakukan order</p>
                        </div>

                        {{-- * preview telpon --}}
                        <div class="pt-2" >
                            <p class="font-semibold text-black text-sm lg:text-[16px]" >No Telpon :</p>
                            <p class=" text-black lg:text-[32px]" >{{ auth()->user()->phone }}</p>
                            <p class="font-semibold text-red-500 text-xs lg:text-sm" >* Nomor telepon akan digunakan untuk pengecekan pembayaran</p>
                        </div>

                        {{-- * suggestion
                        <div class="pt-2" >
                            <p class="font-semibold text-red-500 text-xs lg:text-sm" >* Ganti alamat dan no telpon di profile anda jika diperlukan</p>
                        </div> --}}
                    </div>

                    {{-- * note buyer --}}
                    <div class="p-4 flex flex-col text-sm" >
                        <p class="font-semibold text-black lg:text-[16px]" >Catatan Untuk Penjual :</p>
                        {{-- <input name="buyer-note" type="text" placeholder="Masukkan catatan untuk penjual disini" class="border border-white rounded-md p-2 mt-2" > --}}
                        <textarea required name="buyer_note" class="border border-white rounded-md p-2 mt-2" id="buyer_note" cols="30" rows="10" placeholder="Masukkan catatan untuk penjual disini" ></textarea>
                    </div>

                    {{-- * row total --}}
                    <div class="p-4 flex  justify-between" >
                        <div>
                            <p class="font-semibold text-black lg:text-[16px]" >Harga Total</p>
                        </div>
                        <div>
                            <p class="font-semibold text-black lg:text-[16px]" >Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    {{-- * row qris --}}
                    <div class="p-4 flex flex-col" >
                        <p class="font-semibold text-black lg:text-[16px]" >Pembayaran QRIS :</p>
                        <div class="flex justify-center p-2" >
                            <img src="{{ asset('images/icons/qr-code-example.jpg') }}" alt="" class=" min-w-[300px] min-h-[300px] w-12 h-12 md:w-16 md:h-16 rounded">
                        </div>
                    </div>

                    <div class="p-4 flex flex-col " >
                        <p class="font-semibold text-black text-sm lg:text-[16px]" >No Telpon Penjual :</p>
                        <p class="f text-black lg:text-[32px] " >{{ $adminPhone }}</p>
                        <p class="font-semibold text-red-500 text-xs lg:text-sm" >* Silahkan konfirmasi pembayaran dengan mengirimkan bukti pembayaran ke no telpon penjual</p>
                    </div>


                    @if ( Auth::user()->phone == null || Auth::user()->address == null )
                                            {{-- * row button order --}}
                    <div class="p-2" >
                        {{-- <a href="{{ route('product.index') }}">
                            <div class=" md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                                Order
                        </a> --}}

                            <div class="w-full px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black font-semibold  hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center">
                                Ada Data Yang Belum Diisi
                            </div>
                    @else
                                            {{-- * row button order --}}
                    <div class="p-2" >
                        {{-- <a href="{{ route('product.index') }}">
                            <div class=" md:block px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center " >
                                Order
                        </a> --}}

                            <button type="submit" class="w-full px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black font-semibold  hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center">
                                Order
                            </button>
                    @endif
                
                    </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection