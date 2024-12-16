@extends('layouts.master-shopper')

@section('content')
    <section class="w-full min-h-screen " >
            {{-- * Page title --}}
            <div class="my-2 bg-white shadow-lg p-2" >
                {{-- * Section title --}}
                <div class="" >
                    <div class="px-5 py-2 lg:py-10 lg:px-10 " >
                        <div class="text-black text-[28px] font-extrabold" >
                            Orderan Saya
                        </div>

                    </div>
                </div>
            </div>

            {{-- * content container --}}

            <div class="flex flex-col my-2 shadow-md" >
                {{-- * progress filter tab --}}
                <div class=" p-5 bg-white flex flex-row gap-2 justify-center" >
                    {{-- * Filter waiting for verification --}}
                    <form action="{{ route('user.order.filtered') }}" method="POST" class="bg-[#FFCC00] p-2 rounded-md" >
                        @csrf
                        <input type="hidden" value="Menunggu Verifikasi" name="status">
                        <button class="flex justify-center" >
                            <img class="" src="{{ asset('images/icons/white-icons/icon-park-solid_time-white.png') }}" alt="">
                        </button>
                    </form>

                    {{-- * filter in process --}}
                    <form action="{{ route('user.order.filtered') }}" method="POST" class="bg-[#FFCC00] p-2 rounded-md" >
                        @csrf
                        <input type="hidden" value="Dalam Proses" name="status">
                        <button class="flex justify-center" >
                            <img class="" src="{{ asset('images/icons/white-icons/solar_box-bold-white.png') }}" alt="">
                        </button>
                    </form>

                    {{-- * filter in delivery --}}
                    <form action="{{ route('user.order.filtered') }}" method="POST" class="bg-[#FFCC00] p-2 rounded-md" >
                        @csrf
                        <input type="hidden" value="Delivery" name="status">
                        <button class="flex justify-center" >
                       
                            <img class="" src="{{ asset('images/icons/white-icons/mage_delivery-truck-fill-white.png') }}" alt="">
                        </button>
                    </form>

                    {{-- * filter in done --}}
                    <form action="{{ route('user.order.filtered') }}" method="POST" class="bg-[#FFCC00] p-2 rounded-md" >
                        @csrf
                        <input type="hidden" value="Selesai" name="status">
                        <button class="flex justify-center" >

                            <img class="" src="{{ asset('images/icons/white-icons/icon-park-solid_data-arrival-white.png') }}" alt="">
                        </button>
                    </form>

                    {{-- * filter in rejected --}}
                    <form action="{{ route('user.order.filtered') }}" method="POST" class="bg-[#FFCC00] p-2 rounded-md" >
                        @csrf
                        <input type="hidden" value="Ditolak" name="status">
                        <button class="flex justify-center" >
                            <img class="" src="{{ asset('images/icons/white-icons/zondicons_close-solid-white.png') }}" alt="">
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex flex-col my-2 shadow-md" >
                                {{-- * content based on filter --}}
                                <div class="p-5 flex flex-col justify-center bg-white min-h-screen" >
                                    <div class="p-5 max-w-full mx-auto  overflow-x-scroll " >
                
                                        @if ($userOrderItems->isEmpty())
                                            <p class="text-center text-black text-[24px] font-bold" >Tidak ada orderan sesuai filter tersebut</p>
                                            
                                        @else
                                        <div class="" >
                                            {{ $userOrderItems->links() }}
                                        </div>
                
                                            @foreach ($userOrderItems as $item)
                                                {{-- * content wrapper per items --}}
                                                <div class="min-w-[400px] mt-2 flex flex-row justify-between shadow-lg rounded-md  bg-white p-5 max-w-[500px]  " >
                
                                                    {{-- * column name & price --}}
                                                        <div class="p-4 flex flex-col justify-center  " >
                                                            <div>
                                                                <p class="font-semibold text-xs" >{{ $item->id }}</p>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold text-xs text-[#FFCC00]" >Rp. {{ $item->total_price }}</p>
                                                            </div>
                                                        </div>
                
                                                        {{-- * status --}}
                                                        <div class="p-4 flex flex-col justify-center  " >
                                                            <div>
                                                                <p class="font-semibold text-xs" >{{ $item->status }}</p>
                                                            </div>
                                                        </div>
                
                                                    {{-- * column action --}}
                                                        <div class="py-4 px-2 md:px-6 text-center flex justify-center" >
                                                            <a href="{{ route('user.order.show', $item->id) }}" class="text-[#FFCC00] hover:text-black hover:shadow-xl transform hover:-translate-y-2 transition duration-300 flex align-center" >
                                                                <p class="font-semibold text-xs flex flex-col justify-center" >Lihat Detail</p>
                                                                </a>
                                                        </div>
                                                </div>
                                            @endforeach
                                        @endif
                
                                    </div>
                                </div>
            </div>
    </section>
@endsection