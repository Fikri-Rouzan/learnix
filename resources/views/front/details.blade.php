@extends('layouts.app')

@section('title', $workshop->name . ' Details')

@section('content')
    <x-nav />

    <div id="background" class="relative w-full">
        <div class="absolute w-full h-[300px] bg-[linear-gradient(0deg,#4EB6F5_0%,#5B8CE9_100%)] -z-10"></div>
    </div>

    <section id="Category" class="w-full max-w-[1280px] mx-auto px-4 md:px-[52px] mt-8 md:mt-16 mb-16 md:mb-[100px]">
        <div class="flex flex-col gap-8 md:gap-16">
            <div class="flex flex-col items-center gap-1 text-center">
                <h1 class="font-bold text-2xl md:text-[32px] leading-snug md:leading-[48px] capitalize text-white">
                    {{ $workshop->name }} Details
                </h1>

                <div class="flex items-center gap-2 text-white text-sm md:text-base">
                    <a class="last:font-semibold">Home</a>
                    <span>></span>
                    <a class="last:font-semibold">{{ $workshop->name }} Details</a>
                </div>
            </div>

            <main class="flex flex-col lg:flex-row gap-8">
                <section id="Details"
                    class="flex flex-col w-full lg:w-[724px] rounded-2xl gap-8 p-4 md:p-8 bg-white shadow-lg md:shadow-none">
                    <div id="Thumbnail"
                        class="relative flex w-full h-[240px] md:h-[369px] rounded-2xl overflow-hidden bg-[#D9D9D9]">
                        <img src="{{ Storage::url($workshop->thumbnail) }}" class="w-full h-full object-cover"
                            alt="thumbnail">

                        @if ($workshop->is_open)
                            @if ($workshop->has_started)
                                <div
                                    class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 md:py-3 md:px-5 gap-1 bg-aktiv-orange text-white z-10">
                                    <img src="{{ asset('assets/images/icons/timer-start.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6" alt="icon">
                                    <span class="font-semibold text-xs md:text-base">STARTED</span>
                                </div>
                            @else
                                <div
                                    class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 md:py-3 md:px-5 gap-1 bg-aktiv-green text-white z-10">
                                    <img src="{{ asset('assets/images/icons/medal-star.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6" alt="icon">
                                    <span class="font-semibold text-xs md:text-base">OPEN</span>
                                </div>
                            @endif
                        @else
                            @if ($workshop->has_started)
                                <div
                                    class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 md:py-3 md:px-5 gap-1 bg-aktiv-orange text-white z-10">
                                    <img src="{{ asset('assets/images/icons/timer-start.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6" alt="icon">
                                    <span class="font-semibold text-xs md:text-base">STARTED</span>
                                </div>
                            @else
                                <div
                                    class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 md:py-3 md:px-5 gap-1 bg-aktiv-red text-white z-10">
                                    <img src="{{ asset('assets/images/icons/sand-timer.svg') }}"
                                        class="w-5 h-5 md:w-6 md:h-6" alt="icon">
                                    <span class="font-semibold text-xs md:text-base">CLOSED</span>
                                </div>
                            @endif
                        @endif
                    </div>

                    <section id="Header" class="flex flex-col gap-6">
                        <div id="Rating" class="flex flex-wrap items-center gap-4">
                            <div
                                class="flex items-center rounded-md border border-aktiv-green py-2 px-3 gap-[5px] bg-aktiv-green/[9%]">
                                <img src="{{ asset('assets/images/icons/format-circle.svg') }}"
                                    class="w-6 h-6 flex shrink-0" alt="icon">
                                <p class="font-medium text-aktiv-green capitalize text-sm md:text-base">
                                    {{ $workshop->category->name }}
                                </p>
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="flex items-center">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('assets/images/icons/star.svg') }}" class="p-[4px] w-6 h-6"
                                            alt="star">
                                    @endforeach
                                </div>
                                <p class="font-semibold text-lg leading-[27px]">5.0 <span
                                        class="font-medium text-aktiv-grey"></span></p>
                            </div>
                        </div>
                        <div id="Title" class="flex flex-col gap-3">
                            <h1 class="font-Neue-Plak-bold text-xl md:text-2xl leading-snug md:leading-[33.6px] capitalize">
                                {{ $workshop->name }}
                            </h1>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <div
                                    class="flex items-center justify-between rounded-2xl border border-[#E6E7EB] p-4 md:p-5 gap-4 bg-white">
                                    <div class="flex flex-col gap-2">
                                        <p class="font-medium text-aktiv-grey text-sm md:text-base">Time</p>
                                        <p class="font-semibold text-base md:text-lg leading-[27px]">
                                            {{ $workshop->time_at->format('h:i A') }} Onwards
                                        </p>
                                    </div>
                                    <img src="{{ asset('assets/images/icons/duration.png') }}"
                                        class="w-12 h-12 md:w-16 md:h-16 flex shrink-0" alt="icon">
                                </div>
                                <div
                                    class="flex items-center justify-between rounded-2xl border border-[#E6E7EB] p-4 md:p-5 gap-4 bg-white">
                                    <div class="flex flex-col gap-2">
                                        <p class="font-medium text-aktiv-grey text-sm md:text-base">Kick-off</p>
                                        <p class="font-semibold text-base md:text-lg leading-[27px]">
                                            {{ $workshop->started_at->format('d M, Y') }}
                                        </p>
                                    </div>
                                    <img src="{{ asset('assets/images/icons/date.png') }}"
                                        class="w-12 h-12 md:w-16 md:h-16 flex shrink-0" alt="icon">
                                </div>
                            </div>
                        </div>
                    </section>

                    <div id="Descriptions" class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-lg md:text-xl leading-[27.5px]">Descriptions</h2>
                        <p
                            class="group relative font-medium text-sm md:text-base leading-[26px] md:leading-[28.8px] text-aktiv-grey">
                            <span>{{ $workshop->about }}</span>
                        </p>
                    </div>
                    <div id="Location" class="flex flex-col gap-4">
                        <h2 class="font-Neue-Plak-bold text-lg md:text-xl leading-[27.5px]">Location Details</h2>
                        <div class="relative flex w-full h-[300px] md:h-[360px] rounded-2xl overflow-hidden bg-[#D9D9D9]">
                            <div
                                class="absolute left-4 md:left-5 top-1/2 transform -translate-y-1/2 flex flex-col w-[240px] md:w-[260px] h-fit max-h-[320px] gap-4 rounded-2xl p-4 md:p-5 bg-white shadow-md">
                                <div class="flex w-full h-[100px] md:h-[124px] rounded-xl overflow-hidden">
                                    <img src="{{ Storage::url($workshop->venue_thumbnail) }}"
                                        class="w-full h-full object-cover" alt="location">
                                </div>
                                <div class="flex flex-col gap-3 justify-between">
                                    <p class="font-medium text-sm leading-[24px] text-aktiv-grey line-clamp-4">
                                        {{ $workshop->address }}
                                    </p>
                                    <a href="https://www.google.com/maps/place/{{ $workshop->address }}"
                                        class="font-semibold text-aktiv-orange text-sm md:text-base" target="_blank">View In
                                        Google Maps</a>
                                </div>
                            </div>
                            <img src="{{ Storage::url($workshop->bg_map) }}" class="w-full h-full object-cover"
                                alt="maps">
                        </div>
                    </div>
                </section>
                <section id="Sidebar" class="flex flex-col w-full lg:w-[420px] gap-8">
                    <div class="flex flex-col rounded-3xl p-6 md:p-8 gap-4 bg-white shadow-lg md:shadow-none">
                        <h2 class="font-Neue-Plak-bold text-lg md:text-xl leading-[27.5px]">Instructor Details</h2>
                        <div class="flex items-center gap-3">
                            <div class="flex w-12 h-12 md:w-16 md:h-16 shrink-0 rounded-full overflow-hidden bg-[#D9D9D9]">
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
                    <div class="flex flex-col rounded-3xl pt-8 gap-6 bg-white shadow-lg md:shadow-none">
                        <div class="flex flex-col mx-6 md:mx-8 gap-4">
                            <h2 class="font-Neue-Plak-bold text-lg md:text-xl leading-[27.5px]">Workshop Price</h2>
                            <div class="flex items-center gap-[6px]">
                                <p class="font-bold text-2xl md:text-[32px] leading-[48px] text-aktiv-red">Rp
                                    {{ number_format($workshop->price, 0, ',', '.') }}</p>
                                <p class="font-semibold text-aktiv-grey text-sm md:text-base">/person</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between mx-6 md:mx-8 rounded-2xl border border-r-2 border-b-2 border-[#E6E7EB] py-4 px-6 gap-2">
                            <div class="flex flex-col gap-1">
                                <p class="font-medium text-aktiv-grey text-sm md:text-base">Total Attendants:</p>
                                <p class="font-semibold text-base md:text-lg leading-[27px]">
                                    {{ $workshop->participants->count() }} People Has Joined
                                </p>
                            </div>
                            <img src="{{ asset('assets/images/icons/user.svg') }}"
                                class="w-[48px] h-[48px] md:w-[56px] md:h-[56px]" alt="icon">
                        </div>
                        <div class="flex flex-col mx-6 md:mx-8 gap-4">
                            <h2 class="font-Neue-Plak-bold text-lg md:text-xl leading-[27.5px]">What This Workshop Covers
                            </h2>

                            <div class="flex flex-col gap-6">
                                @foreach ($workshop->benefits as $itemBenefit)
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/icons/tick-circle.svg') }}"
                                            class="w-6 h-6 flex shrink-0" alt="icon">
                                        <p class="font-semibold text-base md:text-lg leading-[27px]">
                                            {{ $itemBenefit->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-col">
                            @if ($workshop->is_open)
                                <a href="{{ route('front.booking', $workshop->slug) }}"
                                    class="flex items-center justify-center mx-6 md:mx-8 h-14 md:h-16 rounded-xl px-6 gap-[10px] bg-aktiv-orange font-semibold text-lg leading-[27px] text-white mb-8 hover:shadow-lg transition-all">
                                    Join Workshop
                                </a>
                            @else
                                <a
                                    class="flex items-center justify-center mx-6 md:mx-8 h-14 md:h-16 rounded-xl px-6 gap-[10px] bg-[#E6E7EB] font-semibold text-lg leading-[27px] text-white mb-8 cursor-not-allowed">
                                    Join Workshop
                                </a>
                                <div class="p-4 bg-aktiv-red">
                                    <p class="font-semibold text-base md:text-lg leading-[27px] text-center text-white">
                                        Oops! Registration for this workshop is now closed 🙌🏻
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </section>
@endsection
