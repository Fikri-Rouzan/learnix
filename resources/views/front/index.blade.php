@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="h-[112px]">
        <x-nav />
    </div>
    <header class="flex flex-col w-full max-h-[1210px] bg-[linear-gradient(0deg,_#5B8CE9_0%,_#4EB6F5_100%)] -mb-[128px]">
        <div class="flex flex-col items-center gap-6 mt-20">
            <div class="flex items-center w-fit rounded-full p-1 pr-4 gap-[10px] bg-[#DFEFFF]">
                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 bg-aktiv-blue overflow-hidden">
                    <img src="{{ asset('assets/images/icons/medal-star.svg') }}" class="w-6 h-6" alt="icon">
                </div>
                <p class="font-semibold text-lg leading-[27px] text-aktiv-blue">#1 Best Workshop in Indonesia</p>
            </div>
            <h1 class="w-[800px] text-center text-[42px] leading-[58.8px] text-white font-['Neue_Plak_bold'] capitalize">
                Revitalize your daily routine with<br> powerful productivity 💪</h1>
            <div class="flex w-fit rounded-full p-4 bg-[#FFFFFF17]">
                <a href="#" class="flex items-center rounded-full px-9 h-[56px] gap-[10px] bg-aktiv-orange">
                    <span class="font-semibold text-white">Get Started ></span>
                </a>
            </div>
        </div>
        <div class="flex w-full overflow-hidden">
            <img src="{{ asset('assets/images/backgrounds/wadedan_A_cheerful_workshop_scene_showing_a_man_presenting_his__f 1.png') }}"
                class="w-full h-full object-cover object-top" alt="">
        </div>
    </header>
    <section id="Goals" class="w-full max-w-[1280px] mx-auto px-[52px] z-10">
        <div class="bg-[linear-gradient(0deg,rgba(230,231,235,0)_0%,#E6E7EB_100%)] rounded-3xl p-[1px]">
            <div class="grid grid-cols-4 items-center gap-6 rounded-3xl p-[32px_52px] bg-white">
                <x-goal />
            </div>
        </div>
    </section>
    <section id="Categories" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
        <div class="flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">We have several 🌟 <br> workshop
                    categories</h2>
                <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                    <span class="font-semibold text-white">See All</span>
                    <span
                        class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
                </a>
            </div>
            <div class="grid grid-cols-4 gap-6">
                @foreach ($categories as $itemCategory)
                    <a href="{{ route('front.category', $itemCategory->slug) }}" class="card">
                        <div class="flex items-center h-full rounded-3xl p-5 pr-1 gap-3 bg-white">
                            <img src="{{ Storage::url($itemCategory->icon) }}" class="w-[56px] h-[56px] flex shrink-0"
                                alt="icon">
                            <div class="flex flex-col gap-[2px] overflow-hidden">
                                <h3 class="font-semibold text-lg leading-[27px] break-words">{{ $itemCategory->name }}</h3>
                                <p class="font-medium text-aktiv-grey">{{ $itemCategory->tagline }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section id="Trending" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
        <div class="flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">Highly sought-after
                    🔥<br>workshops are trending </h2>
                <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                    <span class="font-semibold text-white">See All</span>
                    <span
                        class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($newWorkshops as $itemNewWorkshop)
                    <a href="{{ route('front.details', $itemNewWorkshop->slug) }}" class="card">
                        <div class="flex flex-col h-full justify-between rounded-3xl p-6 gap-9 bg-white">
                            <div class="flex flex-col gap-[18px]">
                                <div class="flex items-center gap-3">
                                    <div class="w-16 h-16 rounded-full flex shrink-0 overflow-hidden">
                                        <img src="{{ Storage::url($itemNewWorkshop->instructor->avatar) }}"
                                            class="w-full h-full object-cover" alt="avatar">
                                    </div>
                                    <div class="flex flex-col gap-[2px]">
                                        <p class="font-semibold text-lg leading-[27px]">
                                            {{ $itemNewWorkshop->instructor->name }}</p>
                                        <p class="font-medium text-aktiv-grey">
                                            {{ $itemNewWorkshop->instructor->occupation }}</p>
                                    </div>
                                </div>
                                <div class="thumbnail-container relative h-[200px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ Storage::url($itemNewWorkshop->thumbnail) }}"
                                        class="w-full h-full object-cover" alt="thumbnail">
                                    @if ($itemNewWorkshop->is_open)
                                        @if ($itemNewWorkshop->has_started)
                                            <div
                                                class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-orange text-white z-10">
                                                <img src="{{ asset('assets/images/icons/timer-start.svg') }}"
                                                    class="w-6 h-6" alt="icon">
                                                <span class="font-semibold">STARTED</span>
                                            </div>
                                        @else
                                            <div
                                                class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-green text-white z-10">
                                                <img src="{{ asset('assets/images/icons/medal-star.svg') }}"
                                                    class="w-6 h-6" alt="icon">
                                                <span class="font-semibold">OPEN</span>
                                            </div>
                                        @endif
                                    @else
                                        <div
                                            class="absolute top-3 left-3 flex items-center rounded-full py-3 px-5 gap-1 bg-aktiv-red text-white z-10">
                                            <img src="{{ asset('assets/images/icons/sand-timer.svg') }}" class="w-6 h-6"
                                                alt="icon">
                                            <span class="font-semibold">CLOSED</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-detail flex flex-col gap-2">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-1">
                                            <img src="{{ asset('assets/images/icons/calendar-2.svg') }}"
                                                class="w-6 h-6 flex shrink-0" alt="icon">
                                            <span
                                                class="font-medium text-aktiv-grey">{{ $itemNewWorkshop->started_at->format('d M, Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <img src="{{ asset('assets/images/icons/timer.svg') }}"
                                                class="w-6 h-6 flex shrink-0" alt="icon">
                                            <span
                                                class="font-medium text-aktiv-grey">{{ $itemNewWorkshop->time_at->format('h:i A') }}</span>
                                        </div>
                                    </div>
                                    <h3 class="title min-h-[56px] font-semibold text-xl line-clamp-2 hover:line-clamp-none">
                                        {{ $itemNewWorkshop->name }}</h3>
                                    <p class="font-medium text-aktiv-grey">{{ $itemNewWorkshop->category->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-[6px]">
                                    <p class="font-semibold text-2xl leading-8 text-aktiv-red">Rp
                                        {{ number_format($itemNewWorkshop->price, 0, ',', '.') }}</p>
                                    <p class="font-medium text-aktiv-grey">/person</p>
                                </div>
                                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}"
                                    class="w-12 h-12 flex shrink-0" alt="icon">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <div class="w-full py-[52px] bg-white mt-[100px]">
        <section id="Testimony">
            <div class="flex flex-col gap-8">
                <div class="flex w-full max-w-[1280px] mx-auto items-center justify-between px-[52px]">
                    <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">Let’s Hear what people 💗
                        <br>say about our workshop
                    </h2>
                    <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                        <span class="font-semibold text-white">See All</span>
                        <span
                            class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
                    </a>
                </div>
                <div class="swiper w-full">
                    <div class="swiper-wrapper">
                        <x-testimonial />
                    </div>
                    <div class="absolute w-full max-w-[1244px] mx-auto left-1/2 top-1/2 transform -translate-x-1/2 z-10">
                        <div class="swiper-button-prev !w-12 !h-12 rounded-full after:hidden">
                            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full"
                                alt="icon">
                        </div>
                        <div class="swiper-button-next !w-12 !h-12 rounded-full after:hidden">
                            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full rotate-180"
                                alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="Benefits" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
            <div class="flex flex-col gap-8">
                <x-benefit />
            </div>
        </section>
    </div>
    <div id="Join-Now" class="relative w-full overflow-hidden">
        <img src="{{ asset('assets/images/backgrounds/lines.svg') }}" class="w-full h-full object-cover absolute"
            alt="backgrounds">
        <div
            class="relative flex items-center w-full max-w-[1176px] mx-auto my-[52px] h-[464px] rounded-2xl bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)] overflow-hidden z-10">
            <div class="flex flex-col justify-center p-[90px] pr-[60px] gap-8">
                <p class="rounded-full w-fit py-3 px-8 font-semibold text-aktiv-blue bg-[#DFEFFF]">What are you waiting
                    for? Join now 🔥 </p>
                <p class="font-bold text-[32px] leading-[48px] text-white">Study more purposefully and fill your day with
                    productivity</p>
                <a href="#" class="flex items-center w-fit rounded-full px-9 h-[56px] gap-[10px] bg-aktiv-orange">
                    <span class="font-semibold text-white">Join Now ></span>
                </a>
            </div>
            <div class="flex w-[496px] h-full shrink-0 overflow-hidden">
                <img src="{{ asset('assets/images/photos/join-now.png') }}" class="w-full h-full object-contain"
                    alt="photo">
            </div>
        </div>
    </div>
    <x-footer />
@endsection

@section('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
