@props(['categories'])

<section id="Categories" class="w-full max-w-[1280px] mx-auto px-4 md:px-[52px] mt-16 md:mt-[100px]">
    <div class="flex flex-col gap-6 md:gap-8">
        <div class="flex flex-col gap-y-4 md:flex-row md:items-center md:justify-between">
            <h2 class="font-Neue-Plak-bold text-2xl md:text-[32px] leading-tight md:leading-[44.54px] capitalize">
                Browse Workshop Categories 🌟
            </h2>
            <a href="#"
                class="flex items-center self-end md:self-auto rounded-full py-3 px-4 md:py-4 md:px-6 h-12 md:h-[56px] gap-2 md:gap-3 bg-aktiv-orange hover:shadow-lg transition-all duration-300">
                <span class="font-semibold text-white text-sm md:text-base">See All</span>
                <span
                    class="w-5 h-5 md:w-6 md:h-6 rounded-full bg-white flex items-center justify-center text-aktiv-orange font-bold text-xs md:text-base">></span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach ($categories as $itemCategory)
                <a href="{{ route('front.category', $itemCategory->slug) }}" class="card group">
                    <div
                        class="flex items-center h-full rounded-3xl p-4 md:p-5 gap-3 bg-white border border-[#E6E7EB] group-hover:border-aktiv-orange group-hover:shadow-lg transition-all duration-300">
                        <img src="{{ Storage::url($itemCategory->icon) }}"
                            class="w-12 h-12 md:w-[56px] md:h-[56px] flex shrink-0" alt="icon">
                        <div class="flex flex-col gap-[2px] overflow-hidden">
                            <h3 class="font-semibold text-base md:text-lg leading-[24px] md:leading-[27px] break-words">
                                {{ $itemCategory->name }}
                            </h3>
                            <p class="font-medium text-sm md:text-base text-aktiv-grey">
                                {{ $itemCategory->tagline }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
