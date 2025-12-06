@extends('layouts.app')

@section('title', 'Booking ' . $workshop->name)

@section('content')
    <x-nav />

    <div id="background" class="relative w-full">
        <div class="absolute w-full h-[300px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
    </div>

    <section id="Content" class="w-full max-w-[1280px] mx-auto px-4 md:px-[52px] mt-8 md:mt-16 mb-16 md:mb-[100px]">
        <div class="flex flex-col gap-8 md:gap-16">
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="font-bold text-2xl md:text-[32px] leading-snug md:leading-[48px] capitalize text-white">
                    Booking {{ $workshop->name }}
                </p>

                <div class="flex flex-wrap justify-center items-center gap-2 text-white text-sm md:text-base">
                    <a class="last:font-semibold">Home</a>
                    <span>></span>
                    <a class="last:font-semibold">{{ $workshop->name }} Details</a>
                    <span>></span>
                    <a class="last:font-semibold">Booking {{ $workshop->name }}</a>
                </div>
            </div>

            <main class="flex flex-col lg:flex-row gap-8">
                <section id="Sidebar"
                    class="group flex flex-col w-full lg:w-[420px] shrink-0 h-fit rounded-3xl p-6 md:p-8 bg-white shadow-lg md:shadow-none">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Details</h2>
                        <div
                            class="thumbnail-container relative h-[200px] md:h-[240px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{ Storage::url($workshop->thumbnail) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </div>
                        <div class="card-detail flex flex-col gap-2">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/calendar.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6 flex shrink-0" alt="icon">
                                    <span class="font-medium text-aktiv-grey text-sm md:text-base">
                                        {{ $workshop->started_at->format('d M, Y') }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/images/icons/timer.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6 flex shrink-0" alt="icon">
                                    <span class="font-medium text-aktiv-grey text-sm md:text-base">
                                        {{ $workshop->time_at->format('h:i A') }} Onwards
                                    </span>
                                </div>
                            </div>
                            <h3 class="font-Neue-Plak-bold text-lg md:text-xl">{{ $workshop->name }}</h3>
                        </div>
                    </div>
                    <div id="closes-section"
                        class="accordion flex flex-col gap-8 transition-all duration-300 mt-8 group-has-[:checked]:mt-0 group-has-[:checked]:!h-0 overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Instructor Details</h2>
                            <div class="flex items-center gap-3 rounded-xl border border-[#E6E7EB] p-4">
                                <div class="flex w-16 h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
                                    <img src="{{ Storage::url($workshop->instructor->avatar) }}"
                                        class="w-full h-full object-cover" alt="photo">
                                </div>
                                <div class="flex flex-col gap-[2px] flex-1">
                                    <p class="font-semibold text-base md:text-lg leading-[27px]">
                                        {{ $workshop->instructor->name }}</p>
                                    <p class="font-medium text-sm md:text-base text-aktiv-grey">
                                        {{ $workshop->instructor->occupation }}</p>
                                </div>
                                <img src="{{ asset('assets/images/icons/verify.svg') }}"
                                    class="flex w-[50px] h-[50px] md:w-[62px] md:h-[62px] shrink-0" alt="icon">
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">What This Workshop Covers</h2>

                            @foreach ($workshop->benefits as $itemBenefit)
                                <div class="flex flex-col gap-6">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/tick-circle.svg') }}"
                                            class="w-6 h-6 flex shrink-0" alt="icon">
                                        <p class="font-semibold text-base md:text-lg leading-[27px]">
                                            {{ $itemBenefit->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Location Details</h2>
                            <div class="flex flex-col gap-4 rounded-xl border border-[#E6E7EB] p-5 pb-[21px]">
                                <div class="flex w-full h-[180px] rounded-xl overflow-hidden">
                                    <img src="{{ Storage::url($workshop->venue_thumbnail) }}"
                                        class="w-full h-full object-cover" alt="location">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <p class="font-medium text-sm md:text-base leading-[25.6px] text-aktiv-grey">
                                        {{ $workshop->address }}
                                    </p>
                                    <a href="https://www.google.com/maps/place/{{ $workshop->address }}"
                                        class="font-semibold text-aktiv-orange text-sm md:text-base" target="_blank">View in
                                        Google Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="group mt-8 cursor-pointer">
                        <input type="checkbox" name="hidden" class="hidden">
                        <p
                            class="before:content-['Show_Less'] group-has-[:checked]:before:content-['Show_More'] before:font-semibold before:text-lg before:leading-[27px] flex items-center justify-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                                class="w-6 h-6 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                        </p>
                    </label>
                </section>

                <form id="Form" method="POST" action="{{ route('front.booking_store', $workshop->slug) }}"
                    class="flex flex-col w-full lg:w-[724px] gap-8 flex-1">
                    @csrf
                    <div class="flex items-center rounded-3xl p-6 md:p-8 gap-4 bg-white shadow-lg md:shadow-none">
                        <img src="{{ asset('assets/images/icons/shield-tick.svg') }}"
                            class="w-[50px] h-[50px] md:w-[62px] md:h-[62px] flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-semibold text-base md:text-lg leading-[27px]">Ultimate Data Security</p>
                            <p class="font-medium text-sm md:text-base text-aktiv-grey">Rest assured, your data is kept
                                private and fully protected.</p>
                        </div>
                    </div>
                    <div class="flex flex-col rounded-3xl p-6 md:p-8 gap-4 bg-white shadow-lg md:shadow-none">
                        <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Personal Informations</h2>
                        <div class="flex flex-col gap-6">
                            <p
                                class="w-full border-l-[5px] border-aktiv-red py-4 px-3 bg-[linear-gradient(270deg,rgba(235,87,87,0)_0%,rgba(235,87,87,0.09)_100%)] font-semibold text-sm md:text-base text-aktiv-red">
                                Please ensure all information is correct. The order receipt will be sent to your email.
                            </p>
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey">Full Name</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange transition-all">
                                    <img src="{{ asset('assets/images/icons/profile-circle.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/profile-circle-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="text" name="name" id="name"
                                        class="appearance-none bg-transparent w-full outline-none text-base md:text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Type your full name" autocomplete="name" required>
                                </div>
                            </label>
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey">Phone Number</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange transition-all">
                                    <img src="{{ asset('assets/images/icons/call.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/call-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="tel" name="phone" id="phone"
                                        class="appearance-none bg-transparent w-full outline-none text-base md:text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Type your phone number" autocomplete="phone" required>
                                </div>
                            </label>
                            <label class="flex flex-col gap-4">
                                <p class="font-medium text-aktiv-grey">Email</p>
                                <div
                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange transition-all">
                                    <img src="{{ asset('assets/images/icons/sms.svg') }}"
                                        class="w-6 h-6 flex shrink-0 group-focus-within:hidden group-has-[:valid]:hidden"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/sms-black.svg') }}"
                                        class="w-6 h-6 shrink-0 hidden group-focus-within:flex group-has-[:valid]:flex"
                                        alt="icon">
                                    <input type="email" name="email" id="email"
                                        class="appearance-none bg-transparent w-full outline-none text-base md:text-lg leading-[27px] font-semibold placeholder:font-medium placeholder:text-aktiv-grey"
                                        placeholder="Type your email" autocomplete="email" required>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col rounded-3xl p-6 md:p-8 gap-8 bg-white shadow-lg md:shadow-none">
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Workshop Price</h2>
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 sm:gap-0">
                                <div class="flex items-center gap-[6px]">
                                    <p class="font-bold text-2xl md:text-[32px] leading-[48px] text-aktiv-red">Rp
                                        {{ number_format($workshop->price, 0, ',', '.') }}</p>
                                    <p class="font-semibold text-aktiv-grey text-sm md:text-base">/person</p>
                                </div>
                                <div
                                    class="counter relative flex items-center w-fit rounded-lg border border-[#E6E7EB] p-2 md:p-3 gap-3">
                                    <button type="button" id="decrement"
                                        class="w-6 h-6 flex items-center justify-center">
                                        <img src="{{ asset('assets/images/icons/minus.svg') }}" alt="icon">
                                    </button>
                                    <p id="quantity" class="font-semibold text-lg md:text-xl leading-[30px] w-fit">1</p>
                                    <input type="number" name="quantity" id="quantity_input"
                                        class="absolute top-0 left-1/2 opacity-0 -z-10" value="1">
                                    <button type="button" id="increment"
                                        class="increment w-6 h-6 flex items-center justify-center">
                                        <img src="{{ asset('assets/images/icons/add.svg') }}" alt="icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Attendants Details</h2>
                            <div id="Attendants-Section" class="flex flex-col gap-6">
                                <div class="attendant-wrapper flex flex-col gap-[10px]">
                                    <div id="Attendant-1"
                                        class="group/accordion peer flex flex-col rounded-2xl border border-[#E6E7EB] p-6 transition-all duration-300">
                                        <label class="relative flex items-center justify-between cursor-pointer">
                                            <p class="font-semibold text-lg leading-[27px]">Attendant 1</p>
                                            <input type="checkbox" name="accodion" class="hidden">
                                            <img src="{{ asset('assets/images/icons/arrow-square-up.svg') }}"
                                                class="w-6 h-6 transition-all duration-300 group-has-[:checked]/accordion:rotate-180"
                                                alt="icon">
                                        </label>
                                        <div
                                            class="accordion flex flex-col gap-6 mt-6 transition-all duration-300 group-has-[:checked]/accordion:!h-0 group-has-[:checked]/accordion:mt-0 overflow-y-hidden">
                                            <hr class="border-[#E6E7EB]">
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey text-sm">Full Name</p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange focus-within:ring-inset transition-all">
                                                    <img src="{{ asset('assets/images/icons/profile-circle-black.svg') }}"
                                                        class="w-6 h-6 flex shrink-0" alt="icon">
                                                    <input type="text" name="participants[0][name]"
                                                        class="bg-transparent w-full outline-none text-base font-semibold"
                                                        placeholder="Type name" required>
                                                </div>
                                            </label>
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey text-sm">Occupation</p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange focus-within:ring-inset transition-all">
                                                    <img src="{{ asset('assets/images/icons/briefcase-black.svg') }}"
                                                        class="w-6 h-6 flex shrink-0" alt="icon">
                                                    <input type="text" name="participants[0][occupation]"
                                                        class="bg-transparent w-full outline-none text-base font-semibold"
                                                        placeholder="Type occupation" required>
                                                </div>
                                            </label>
                                            <label class="flex flex-col gap-4">
                                                <p class="font-medium text-aktiv-grey text-sm">Email</p>
                                                <div
                                                    class="group input-wrapper flex items-center rounded-xl p-4 gap-2 bg-[#FBFBFB] overflow-hidden focus-within:ring-1 focus-within:ring-aktiv-orange focus-within:ring-inset transition-all">
                                                    <img src="{{ asset('assets/images/icons/sms-black.svg') }}"
                                                        class="w-6 h-6 flex shrink-0" alt="icon">
                                                    <input type="email" name="participants[0][email]"
                                                        class="bg-transparent w-full outline-none text-base font-semibold"
                                                        placeholder="Type email" required>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h2 class="font-Neue-Plak-bold text-xl leading-[27.5px]">Payments Details</h2>
                            <div class="flex flex-col rounded-xl border border-[#E6E7EB] p-6 gap-4">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm md:text-base">Quantity</p>
                                    <p id="display_quantity" class="font-semibold text-lg leading-[27px] text-right"></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm md:text-base">Price</p>
                                    <p id="sub_total" class="font-semibold text-lg leading-[27px] text-right"></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm md:text-base">PPN 11%</p>
                                    <p id="tax" class="font-semibold text-lg leading-[27px] text-right"></p>
                                </div>
                                <hr class="border-[#E6E7EB]">
                                <div class="flex items-center justify-between">
                                    <p class="font-medium text-aktiv-grey text-sm md:text-base">Total Price</p>
                                    <p id="total_amount"
                                        class="font-semibold text-lg leading-[27px] text-right text-aktiv-red"></p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="workshopPrice" id="workshopPrice" value="{{ $workshop->price }}">

                        <button type="submit"
                            class="w-full rounded-xl h-14 md:h-16 px-6 text-center bg-aktiv-orange font-semibold text-lg leading-[27px] text-white hover:shadow-lg hover:bg-[#e05a00] transition-all duration-300">
                            Pay Now
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/accodion.js') }}"></script>
    <script src="{{ asset('assets/js/booking.js') }}"></script>
@endsection
