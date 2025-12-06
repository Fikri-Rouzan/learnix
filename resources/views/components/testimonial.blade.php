<section id="Testimony">
    <div class="flex flex-col gap-8">
        <div class="flex w-full max-w-[1280px] mx-auto items-center justify-between px-[52px]">
            <h2 class="font-Neue-Plak-bold text-[32px] leading-[44.54px] capitalize">See What People Are Saying 💗
                <br>About Our Workshops
            </h2>
            <a href="#" class="flex items-center rounded-full py-4 px-6 h-[56px] gap-3 bg-aktiv-orange">
                <span class="font-semibold text-white">See All</span>
                <span class="w-6 h-6 rounded-full bg-white text-center align-middle text-aktiv-orange font-bold">></span>
            </a>
        </div>
        <div class="swiper w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div
                        class="testimony-card w-full max-w-[1176px] h-[413px] mx-auto flex items-center rounded-2xl overflow-hidden">
                        <div class="flex h-full w-[436px] shrink-0 bg-aktiv-orange overflow-hidden">
                            <img src="{{ asset('assets/images/photos/testimony.png') }}"
                                class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div
                            class="h-full w-full flex flex-col justify-between p-[42px] bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)]">
                            <p class="font-['Times_New_Roman'] font-bold text-[38px] leading-[60.8px] text-white">
                                "The support from the behind-the-scenes team is exceptional. They are responsive,
                                helpful, and genuinely
                                invested in their members ❤️."
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col gap-1">
                                    <p class="font-semibold text-lg leading-[27px] text-white">Sophie</p>
                                    <p class="font-medium text-white">Liam's Mother</p>
                                </div>
                                <div class="flex items-center">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('assets/images/icons/star.svg') }}" class="p-[5px] w-8 h-8"
                                            alt="star">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute w-full max-w-[1244px] mx-auto left-1/2 top-1/2 transform -translate-x-1/2 z-10">
                <div class="swiper-button-prev !w-12 !h-12 rounded-full after:hidden">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full" alt="icon">
                </div>
                <div class="swiper-button-next !w-12 !h-12 rounded-full after:hidden">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full rotate-180"
                        alt="icon">
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
