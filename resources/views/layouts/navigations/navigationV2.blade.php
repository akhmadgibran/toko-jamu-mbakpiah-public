    {{-- navbar --}}
    <header class="fixed top-0 w-full bg-transparent" >
        <div class="container mx-auto" >
            <nav class="flex justify-between items-center p-5" >
                <div class="flex flex-row items-center" >
                    <img class="h-[80px] w-[80px]" src="/images/logojamumbakpiah.png" alt="">
                    {{-- <p class="text-[24px] text-[#FFCC00] font-bold">Jamu Mbak Piah</p> --}}
                </div>
                <div id="nav-links" class="duration-500 md:static absolute min-h-[60vh] md:min-h-fit left-0 top-[-1000%] w-full md:w-auto flex items-center px-5 " >
                    <div class="bg-white md:bg-[#FFCC00] px-5 py-2 rounded-md" >
                        <ul class="flex flex-col md:flex-row md:items-center md:gap-[4vw] gap-12" >
                            <li>
                                <a class="hover:text-gray-500"  href="">Home</a>
                            </li>
                            <li>
                                <a class="hover:text-gray-500" href="">Tentang</a>
                            </li>
                            <li>
                                <a class="hover:text-gray-500" href="">Products</a>
                            </li>
                            <li>
                                <a class="hover:text-gray-500" href="">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="flex flex-row gap-5 items-center">
                        <a href="{{ route('user.cart.index') }}">
                            <img class="h-[40px] w-[40px]" src="images/icons/mage_basket.png" alt="">
                        </a>
                        <a href="{{ route('login') }}">
                            <div class="bg-[#FFCC00] px-5 py-2 rounded-md hover:bg-[#E9CF67]" >
                                Login
                            </div>
                        </a>
                        <ion-icon onclick="onToggleMenu(this)" name="menu" class="h-[40px] w-[40px] text-3xl cursor-pointer md:hidden  " style="color: #FFCC00" ></ion-icon>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    {{-- navbar end --}}


    <script>

        const navLinks = document.querySelector('#nav-links');
        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
            navLinks.classList.toggle('top-[60px]');
            navLinks.classList.toggle('top-[-1000%]');
        }
    </script>