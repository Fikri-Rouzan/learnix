@extends('layouts.app')

@section('title', 'Booking Finished')

@section('content')
    <div class="flex flex-col items-center w-full min-h-screen px-4">
        <div
            class="flex flex-col w-full max-w-[856px] rounded-3xl p-6 md:p-8 gap-8 bg-white my-auto shadow-sm border border-[#E6E7EB]">
            <div class="flex flex-col gap-4 md:gap-6">
                <img src="{{ asset('assets/images/icons/receipt-2.svg') }}"
                    class="w-16 h-16 md:w-[72px] md:h-[72px] flex shrink-0 mx-auto" alt="icon">
                <h1 class="font-bold text-2xl md:text-[32px] leading-snug md:leading-[48px] text-center">
                    Booking Successful! 🙌🏻
                </h1>
            </div>
            <div class="flex flex-col gap-6">
                <div
                    class="flex flex-col md:flex-row items-center justify-between w-full rounded-2xl md:rounded-full border border-[#E6E7EB] p-4 md:p-3 md:pl-8 gap-4 md:gap-0">
                    <div class="flex flex-col md:flex-row items-center gap-2 text-center md:text-left">
                        <img src="{{ asset('assets/images/icons/receipt.svg') }}" class="w-8 h-8 flex shrink-0"
                            alt="icon">
                        <div class="flex flex-col md:flex-row gap-1 md:gap-2">
                            <p class="font-medium text-base md:text-lg leading-[27px] text-aktiv-grey">Booking ID:</p>
                            <p class="font-bold text-lg leading-[27px]">{{ $bookingTransaction->booking_trx_id }}</p>
                        </div>
                    </div>

                    <a href="{{ route('front.check_booking') }}"
                        class="flex items-center justify-center shrink-0 w-full md:w-fit gap-2 rounded-full py-3 px-6 md:py-4 md:px-8 bg-aktiv-orange hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}"
                            class="w-6 h-6 md:w-8 md:h-8 flex shrink-0" alt="icon">
                        <span class="font-semibold text-base md:text-lg leading-[27px] text-white text-nowrap">View My
                            Booking</span>
                    </a>
                </div>

                <p class="font-medium text-sm md:text-base leading-[25.6px] text-center text-aktiv-grey">
                    Your workshop booking is confirmed. A receipt has been sent to your email.
                </p>
            </div>
        </div>

        <a href="{{ route('front.index') }}"
            class="font-semibold mb-[52px] mt-4 hover:text-aktiv-orange transition-all duration-300">
            Back to Home
        </a>
    </div>
@endsection
