@extends('layouts.app')

@section('title', 'My Booking')

@section('content')
    <x-nav />

    <div id="background" class="relative w-full">
        <div class="absolute w-full h-[300px] md:h-[356px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
    </div>

    <section id="Header" class="w-full max-w-[1280px] mx-auto px-4 md:px-[52px] my-10 md:my-16">
        <div class="flex flex-col gap-10 md:gap-16">
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="font-bold text-2xl md:text-[32px] leading-snug md:leading-[48px] capitalize text-white">
                    Find Your Booking
                </p>
                <p class="text-white text-sm md:text-base px-4">
                    Enter the booking code from your email to check its status.
                </p>
            </div>

            <main class="flex gap-8 w-full">
                <form action="{{ route('front.check_booking_details') }}" method="POST"
                    class="flex flex-col md:flex-row items-center justify-between w-full rounded-3xl md:rounded-full p-6 md:p-3 md:pl-8 gap-6 bg-white overflow-hidden shadow-lg md:shadow-none">
                    @csrf
                    <label class="flex items-center gap-2 w-full">
                        <img src="{{ asset('assets/images/icons/receipt-black.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <input type="text" name="booking_trx_id" id="bookingid"
                            class="appearance-none outline-none font-semibold text-base md:text-lg leading-[27px] placeholder:text-aktiv-black w-full"
                            placeholder="Booking ID">
                    </label>

                    <div class="w-full h-[1px] md:w-[1.5px] md:h-12 bg-[#E6E7EB]"></div>

                    <label class="flex items-center gap-2 w-full">
                        <img src="{{ asset('assets/images/icons/call-black.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <input type="tel" name="phone" id="phone" autocomplete="phone"
                            class="appearance-none outline-none font-semibold text-base md:text-lg leading-[27px] placeholder:text-aktiv-black w-full"
                            placeholder="Phone Number">
                    </label>

                    <button type="submit"
                        class="flex items-center justify-center w-full md:w-auto shrink-0 gap-2 rounded-full py-3 px-6 md:py-4 md:px-8 bg-aktiv-orange hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}"
                            class="w-6 h-6 md:w-8 md:h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-base md:text-lg leading-[27px] text-white text-nowrap">
                            View My Booking
                        </span>
                    </button>
                </form>
            </main>
        </div>
    </section>

    <div class="w-full px-4 md:px-0">
        <x-benefit />
    </div>

    <x-footer />
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/accodion.js') }}"></script>
@endsection
