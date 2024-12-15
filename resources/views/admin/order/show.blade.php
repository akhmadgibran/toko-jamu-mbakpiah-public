<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Orderan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- * Content --}}

                    
            <div class="flex flex-col" >
                {{-- * progress filter tab --}}
                <div class=" p-5 bg-white flex flex-col justify-center" >
                    <div class="p-5 max-w-full mx-auto  overflow-x-scroll" >
                        @foreach ($adminOrderDetail as $item)
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
                                
                                <form action="{{ route('admin.order.update', $item->order->id) }}" method="POST">
                                    @csrf
                                {{-- * Status Pengiriman Terkini --}}
                                <div class="p-5" >
                                    <p class="" >Status Pengiriman :</p>
                                    <select name="status" id="status" required >
                                        <option value="{{ $item->order->status }}">{{ $item->order->status }}</option>
                                        @foreach ($orderStatus as $status)
                                            <option value="{{ $status->status }}">{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                {{-- * Note Penjual  --}}
                                <div class="p-4 flex flex-col text-sm" >
                                    <p class="font-semibold text-black lg:text-[16px]" >Catatan Untuk Pembeli :</p>
                                    {{-- <input name="buyer-note" type="text" placeholder="Masukkan catatan untuk penjual disini" class="border border-white rounded-md p-2 mt-2" > --}}
                                    <textarea required name="seller_note" class="border border-white rounded-md p-2 mt-2" id="seller_note" cols="30" rows="10" placeholder="Masukkan catatan untuk pembeli disini" ></textarea>
                                </div>

                                <div class="p-5" >
                                    <button type="submit" class=" w-full px-5 py-2 md:px-7 md:py-3 lg:px-10 lg:py-4 rounded-md bg-white hover:bg-slate-100  text-[#FFCC00] hover:text-black font-semibold  hover:shadow-xl transform hover:-translate-y-2 transition duration-300 text-center">
                                        Update
                                    </button>
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
