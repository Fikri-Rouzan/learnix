@extends('layouts.app')

@section('title', $category->name . ' Category')

@section('content')
    <x-nav />

    <section id="Category" class="w-full max-w-[1280px] mx-auto px-4 md:px-[52px] mt-8 md:mt-[52px] mb-16 md:mb-[100px]">
        <div class="flex flex-col gap-6 md:gap-9">
            <div class="flex flex-col items-center gap-2 md:gap-1 text-center">
                <h1 class="font-Neue-Plak-bold text-2xl md:text-[32px] leading-snug md:leading-[44.54px] capitalize">
                    {{ $category->name }} ({{ $category->workshops->count() }})
                </h1>

                <div class="flex items-center gap-2 text-sm md:text-base">
                    <a class="font-medium text-aktiv-grey last:font-semibold last:text-aktiv-black">Home</a>
                    <span>></span>
                    <a class="font-medium text-aktiv-grey last:font-semibold last:text-aktiv-black">
                        {{ $category->name }} Category
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($category->workshops as $itemNewWorkshop)
                    <a href="{{ route('front.details', $itemNewWorkshop->slug) }}" class="card group">
                        <div
                            class="flex flex-col h-full justify-between rounded-3xl p-6 gap-6 md:gap-9 bg-white border border-[#E6E7EB] hover:border-aktiv-orange hover:shadow-lg transition-all duration-300">
                            <div class="flex flex-col gap-[18px]">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full flex shrink-0 overflow-hidden">
                                        <img src="{{ Storage::url($itemNewWorkshop->instructor->avatar) }}"
                                            class="w-full h-full object-cover" alt="avatar">
                                    </div>
                                    <div class="flex flex-col gap-[2px]">
                                        <p class="font-semibold text-base md:text-lg leading-[24px] md:leading-[27px]">
                                            {{ $itemNewWorkshop->instructor->name }}
                                        </p>
                                        <p class="font-medium text-sm md:text-base text-aktiv-grey">
                                            {{ $itemNewWorkshop->instructor->occupation }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="thumbnail-container relative h-[180px] md:h-[200px] rounded-xl bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ Storage::url($itemNewWorkshop->thumbnail) }}"
                                        class="w-full h-full object-cover" alt="thumbnail">

                                    @if ($itemNewWorkshop->is_open)
                                        @if ($itemNewWorkshop->has_started)
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
                                        <div
                                            class="absolute top-3 left-3 flex items-center rounded-full py-2 px-4 md:py-3 md:px-5 gap-1 bg-aktiv-red text-white z-10">
                                            <img src="{{ asset('assets/images/icons/sand-timer.svg') }}"
                                                class="w-5 h-5 md:w-6 md:h-6" alt="icon">
                                            <span class="font-semibold text-xs md:text-base">CLOSED</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-detail flex flex-col gap-2">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-1">
                                            <img src="{{ asset('assets/images/icons/calendar.svg') }}"
                                                class="w-5 h-5 md:w-6 md:h-6 flex shrink-0" alt="icon">
                                            <span class="font-medium text-aktiv-grey text-sm md:text-base">
                                                {{ $itemNewWorkshop->started_at->format('d M, Y') }}
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <img src="{{ asset('assets/images/icons/timer.svg') }}"
                                                class="w-5 h-5 md:w-6 md:h-6 flex shrink-0" alt="icon">
                                            <span class="font-medium text-aktiv-grey text-sm md:text-base">
                                                {{ $itemNewWorkshop->time_at->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>

                                    <h3
                                        class="title min-h-[48px] md:min-h-[56px] font-semibold text-lg md:text-xl line-clamp-2 hover:line-clamp-none transition-all">
                                        {{ $itemNewWorkshop->name }}
                                    </h3>
                                    <p class="font-medium text-aktiv-grey text-sm md:text-base">
                                        {{ $itemNewWorkshop->category->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1 md:gap-[6px]">
                                    <p class="font-semibold text-lg md:text-2xl leading-7 md:leading-8 text-aktiv-red">
                                        Rp {{ number_format($itemNewWorkshop->price, 0, ',', '.') }}
                                    </p>
                                    <p class="font-medium text-sm md:text-base text-aktiv-grey">/person</p>
                                </div>
                                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}"
                                    class="w-10 h-10 md:w-12 md:h-12 flex shrink-0" alt="icon">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />
@endsection
