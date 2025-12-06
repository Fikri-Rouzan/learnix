@props(['categories'])

<section id="Categories" class="w-full max-w-[1280px] mx-auto px-[52px] mt-[100px]">
    <div class="flex flex-col gap-8">
        <div class="flex items-center justify-between">
            <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">We have several 🌟 <br> workshop
                categories</h2>
            <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                <span class="font-semibold text-white">See All</span>
                <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
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
