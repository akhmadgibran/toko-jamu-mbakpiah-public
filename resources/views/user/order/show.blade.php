@extends('layouts.master-shopper')

@section('content')
    <section class="w-full min-h-screen mb-[80px] " >
            {{-- * Page title --}}
            <div class="my-2 bg-white shadow-lg p-2" >
                {{-- * Section title --}}
                <div class="" >
                    <div class="px-5 py-2 lg:py-10 lg:px-10 " >
                        <div class="text-black text-[28px] font-extrabold" >
                            Detail Orderan Saya
                        </div>
                    </div>
                </div>
            </div>

            {{-- * content container --}}

            <div class="flex flex-col" >
                {{-- * progress filter tab --}}
                <div class=" p-5 bg-white flex flex-col justify-center" >
                    <div class="p-5 max-w-full mx-auto  overflow-x-scroll" >
                        @foreach ($userOrderDetail as $item)
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
                                        <p class="font-semibold text-xs text-[#FFCC00]" >Rp {{ $item->product->price }}</p>
                                    </div>
                                </div>
                            {{-- * column quantity --}}
                                <div class="py-4 px-2 md:px-6 flex justify-center" >
                                        <div class="flex items-center justify-center space-x-2">
                                            <div class="flex justify-center" >
                                        
        
            
                                                <!-- Quantity Display -->
                                                <span class="px-4 my-auto"><p class="text-xs " >x{{ $item->quantity }}</p></span>
            
        
                                            </div>
                                        </div>
                                </div>
                            {{-- * column total --}}
                                <div class="flex justify-center" >
                                    <div class="text-center flex justify-center flex-col ">
                                        <p class="text-xs" >{{ $item->quantity * $item->product->price }}</p>
                                    </div>
                                </div>
                            {{-- * column action --}}

                        </div>
                        @endforeach
                        {{-- * content wrapper per items --}}

                    </div>
                    <div class="p-5  mx-auto max-w-[600px]" >
                        <div class="" >
                            <div class="bg-[#FFCC00] rounded-md flex flex-col justify-center " >
                                {{-- * Harga total --}}
                                <div class="p-5 flex flex-row  justify-between gap" >
                                    <p class="" >Harga total :</p>
                                    <p class="" >Rp. {{ $item->order->total_price }}</p>
                                </div>
    
                                {{-- * Alamat Pengiriman --}}
                                <div class="p-5" >
                                    <p class="" >Alamat Pengiriman :</p>
                                    <p class="" >{{ $item->order->address }}</p>
                                </div>
                                {{-- * Nomor Telepon --}}
                                <div class="p-5" >
                                    <p class="" >Nomor Telepon Pembeli :</p>
                                    <p class="" >{{ $item->order->user->phone }}</p>
                                </div>
                                {{-- * Note Pembeli --}}
                                <div class="p-5" >
                                    <p class="" >Note Pembeli :</p>
                                    <p class="" >{{ $item->order->buyer_note }}</p>
                                </div>
    
                                {{-- * Status Pengiriman Terkini --}}
                                <div class="p-5" >
                                    <p class="" >Status Pengiriman :</p>
                                    <p class="" >{{ $item->order->status }}</p>
                                </div>
    
                                {{-- * Note Penjual  --}}
                                <div class="p-5" >
                                    <p class="" >Note Penjual :</p>
                                    <p class="" >{{ $item->order->seller_note }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>
@endsection