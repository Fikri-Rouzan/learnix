<div class="h-[112px]">
    <nav x-data="{ open: false }" class="fixed top-0 flex flex-col w-full bg-white z-30 shadow-sm">
        <div class="flex items-center justify-between w-full p-8">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" class="flex shrink-0" alt="logo">
            </a>

            <button @click="open = !open" class="lg:hidden flex items-center justify-center p-2 text-aktiv-grey">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <ul class="hidden lg:flex items-center justify-center gap-8">
                <li
                    class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="{{ route('front.check_booking') }}">My Booking</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Workshop</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Community</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Testimony</a>
                </li>
            </ul>
            <a href="#"
                class="hidden lg:flex items-center rounded-full h-12 px-6 gap-[10px] w-fit shrink-0 bg-aktiv-green hover:bg-[#068449] transition-all duration-300">
                <span class="font-semibold text-white">Contact CS</span>
                <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" class="w-6 h-6" alt="icon">
            </a>
        </div>
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden flex flex-col w-full bg-white border-t border-gray-100 px-8 pb-8 gap-6 shadow-lg" x-cloak>
            <ul class="flex flex-col gap-6 mt-4">
                <li class="font-medium text-aktiv-grey hover:text-aktiv-orange">
                    <a href="{{ route('front.check_booking') }}" class="block w-full">My Booking</a>
                </li>
                <li class="font-medium text-aktiv-grey hover:text-aktiv-orange">
                    <a href="#" class="block w-full">Workshop</a>
                </li>
                <li class="font-medium text-aktiv-grey hover:text-aktiv-orange">
                    <a href="#" class="block w-full">Community</a>
                </li>
                <li class="font-medium text-aktiv-grey hover:text-aktiv-orange">
                    <a href="#" class="block w-full">Testimony</a>
                </li>
            </ul>
            <a href="#"
                class="flex items-center justify-center rounded-full h-12 px-6 gap-[10px] w-full bg-aktiv-green hover:bg-[#068449] transition-all duration-300">
                <span class="font-semibold text-white">Contact CS</span>
                <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" class="w-6 h-6" alt="icon">
            </a>
        </div>
    </nav>
</div>
