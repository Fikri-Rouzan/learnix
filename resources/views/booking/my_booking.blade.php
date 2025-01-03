@extends('layouts.app')

@section('title')
    My Booking
@endsection

@section('content')
    <div class="h-[112px]">
        <x-nav />
    </div>
    <div id="background" class="relative w-full">
        <div class="absolute w-full h-[356px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
    </div>
    <section id="Header" class="w-full max-w-[1280px] mx-auto px-[52px] my-16">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-1">
                <p class="font-bold text-[32px] leading-[48px] capitalize text-white">View Your Booking</p>
                <p class="text-white">Enter the booking code sent to your email to check the status of your booking.</p>
            </div>
            <main class="flex gap-8">
                <form action="{{ route('front.check_booking_details') }}" method="POST"
                    class="flex items-center justify-between w-full rounded-full p-3 pl-8 gap-6 bg-white overflow-hidden">
                    @csrf
                    <label class="flex items-center gap-2 w-full">
                        <img src="{{ asset('assets/images/icons/receipt-black.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <input type="text" name="booking_trx_id" id="bookingid"
                            class="appearance-none outline-none font-semibold text-lg leading-[27px] placeholder:text-aktiv-black"
                            placeholder="Booking ID">
                    </label>
                    <div class="h-12 border-[1.5px] border-[#E6E7EB]"></div>
                    <label class="flex items-center gap-2 w-full">
                        <img src="{{ asset('assets/images/icons/call-black.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <input type="tel" name="phone" id="phone"
                            class="appearance-none outline-none font-semibold text-lg leading-[27px] placeholder:text-aktiv-black"
                            placeholder="Phone No">
                    </label>
                    <button type="submit" class="flex items-center shrink-0 gap-2 rounded-full py-4 px-8 bg-aktiv-orange">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <span class="font-semibold text-lg leading-[27px] text-white text-nowrap">View My Booking</span>
                    </button>
                </form>
            </main>
        </div>
    </section>
    <section id="Benefits" class="py-[100px] bg-white mb-8">
        <div class="flex flex-col gap-8 w-full max-w-[1280px] px-[52px] mx-auto">
            <x-benefit />
        </div>
    </section>
    <x-footer />
@endsection

@section('after-scripts')
    <script src="{{ asset('assets/js/accodion.js') }}"></script>
@endsection
