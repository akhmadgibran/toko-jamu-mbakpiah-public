@if (Auth::check() && Auth::user()->usertype == 'user')
            {{-- navbar --}}
            <header class="fixed top-0 w-full bg-transparent shadow-lg z-50" >
                <div class="container mx-auto" >
                    <nav class="flex justify-between items-center p-5" >
                        <div class="flex flex-row items-center" >
                            <a href="/">
                                <img class="h-[40px] w-[190px]" src="/images/logoOri.png" alt="">
                            </a>
                            {{-- <p class="text-[24px] text-[#FFCC00] font-bold">Jamu Mbak Piah</p> --}}
                        </div>
                        <div id="nav-links" class="duration-500 lg:static absolute min-h-[60vh] lg:min-h-fit left-0 top-[-1000%] w-full lg:w-auto flex items-center px-5 bg-white lg:bg-transparent" >
                            <div class="bg-white lg:bg-[#FFCC00] px-5 py-2 rounded-md" >
                                <ul class="flex flex-col lg:flex-row lg:items-center lg:gap-[4vw] gap-12" >
                                    <li>
                                        <a class="hover:text-gray-500 font-semibold lg:text-white"  href="/">Home</a>
                                    </li>
                                    <li>
                                        <a class="hover:text-gray-500 font-semibold lg:text-white" href="/about">Tentang</a>
                                    </li>
                                    <li>
                                        <a class="hover:text-gray-500 font-semibold lg:text-white" href="{{ route('product.index') }}">Products</a>
                                    </li>
 

                                    <li class="lg:hidden" >
                                        <a class="hover:text-gray-500 font-semibold lg:text-white lg:hidden" href="{{ route('user.order.index') }}">Your Order</a>
                                    </li>

                                    {{-- * Button Account Mobile --}}
                                    <a class="lg:hidden" href="{{ route('profile.edit') }}">
                                        <div class="lg:hidden bg-[#FFCC00] px-5 py-2 rounded-md hover:bg-[#E9CF67] font-semibold" >
                                                Account
                                        </div>
                                    </a>

                                    {{-- ! button logout mobile --}}
                                    <form class="lg:hidden"  method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    <div class="lg:hidden bg-[#ff0f0f] px-5 py-2 rounded-md hover:bg-[#E9CF67] font-semibold text-center" >
                                                        Logout
                                                    </div>
                                                    </a>
                                    </form>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row gap-5 items-center">
                                <a href="{{ route('user.cart.index') }}">
                                    <img class="h-[40px] w-[40px]  " src="{{ asset('images/icons/mage_basket.png') }}" alt="">
                                </a>
                                <a class="hidden lg:block" href="{{ route('user.order.index') }}">
                                    <img class="h-[40px] w-[40px]  " src="{{ asset('images/icons/icon-park-solid_transaction.png') }}" alt="">
                                </a>
                                <a class="hidden lg:block" href="{{ route('profile.edit') }}">
                                    <div class="" >
                                        <img class="h-[40px] w-[40px]" src="{{ asset('images/icons/codicon_account.png') }} " alt="">
                                    </div>
                                </a>
                                <form class="hidden lg:block"  method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <div class="hidden md:block bg-[#ff0f0f] px-5 py-2  hover:bg-opacity-20 text-center  text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300" >
                                                    Logout
                                                </div>
                                                </a>
                                </form>
                                <ion-icon onclick="onToggleMenu(this)" name="menu" class="h-[40px] w-[40px] text-3xl cursor-pointer lg:hidden  " style="color: #FFCC00" ></ion-icon>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            {{-- navbar end --}}
@endif
@if (!Auth::check())
        {{-- navbar --}}
        <header class="fixed  top-0 w-full bg-transparent shadow-lg z-50" >
            <div class="container mx-auto" >
                <nav class="flex justify-between items-center p-5" >
                    <div class="flex flex-row items-center" >
                        <a href="/">
                            <img class="h-[40px] w-[190px]" src="/images/logoOri.png" alt="">
                        </a>
                        {{-- <p class="text-[24px] text-[#FFCC00] font-bold">Jamu Mbak Piah</p> --}}
                    </div>
                    <div id="nav-links" class="duration-500 lg:static absolute min-h-[60vh] lg:min-h-fit left-0 top-[-1000%] w-full lg:w-auto flex items-center px-5 bg-white lg:bg-transparent" >
                        <div class="bg-white lg:bg-[#FFCC00] px-5 py-2 rounded-md" >
                            <ul class="flex flex-col lg:flex-row lg:items-center lg:gap-[4vw] gap-12" >
                                <li>
                                    <a class="hover:text-gray-500 font-semibold lg:text-white"  href="/">Home</a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-500 font-semibold lg:text-white" href="/about">Tentang</a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-500 font-semibold lg:text-white" href="{{ route('product.index') }}">Products</a>
                                </li>

                                <a class="lg:hidden" href="{{ route('login') }}">
                                    <div class="lg:hidden bg-[#FFCC00] px-5 py-2 rounded-md hover:bg-[#E9CF67] font-semibold text-center" >
                                        Login
                                    </div>
                                </a>
                                <a class="lg:hidden" href="{{ route('register') }}">
                                    <div class="lg:hidden bg-[#7F3F09] px-5 py-2  hover:bg-opacity-20 text-center  text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 " >
                                        Register
                                    </div>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row gap-5 items-center">
                            <a href="{{ route('user.cart.index') }}">
                                <img class="h-[40px] w-[40px]" src="{{ asset('images/icons/mage_basket.png') }}" alt="">
                            </a>
                            <a class="hidden lg:block" href="{{ route('login') }}">
                                <div class="hidden lg:block bg-[#836b0e] px-5 py-2  hover:bg-opacity-20 text-center  text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 " >
                                    Login
                                </div>
                            </a>
                            <a class="hidden lg:block" href="{{ route('register') }}">
                                <div class="hidden lg:block bg-[#7F3F09] px-5 py-2  hover:bg-opacity-20 text-center  text-white hover:text-black rounded-md  font-semibold hover:shadow-xl transform hover:-translate-y-2 transition duration-300 " >
                                    Register
                                </div>
                            </a>
                            <ion-icon onclick="onToggleMenu(this)" name="menu" class="h-[40px] w-[40px] text-3xl cursor-pointer lg:hidden" style="color: #FFCC00" ></ion-icon>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{-- navbar end --}}
@endif


    <script>
                // navbar fixed
        window.onscroll = function () {
        const header = document.querySelector("header");
        const fixednav = header.offsetTop;

        if (window.scrollY > fixednav) {
            header.classList.remove("bg-transparent");
            header.classList.add("bg-white");
        } else {
            header.classList.remove("bg-white");
            header.classList.add("bg-transparent");
        }
        };

        const navLinks = document.querySelector('#nav-links');
        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
            navLinks.classList.toggle('top-[10px]');
            navLinks.classList.toggle('top-[-1000%]');
        }
    </script>