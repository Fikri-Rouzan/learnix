<section id="Testimony">
    <div class="flex flex-col gap-8">
        <div
            class="flex flex-col gap-y-4 md:flex-row w-full max-w-[1280px] mx-auto items-center justify-between px-4 md:px-[52px]">
            <h2
                class="font-Neue-Plak-bold text-2xl md:text-[32px] leading-tight md:leading-[44.54px] capitalize text-center md:text-left">
                See What People Are Saying 💗
                <br class="hidden md:block">About Our Workshops
            </h2>
            <a href="#"
                class="flex items-center rounded-full py-3 px-4 md:py-4 md:px-6 h-12 md:h-[56px] gap-2 md:gap-3 bg-aktiv-orange hover:shadow-lg transition-all duration-300">
                <span class="font-semibold text-white text-sm md:text-base">See All</span>
                <span
                    class="w-5 h-5 md:w-6 md:h-6 rounded-full bg-white flex items-center justify-center text-aktiv-orange font-bold text-xs md:text-base">></span>
            </a>
        </div>
        <div class="swiper w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide px-4 md:px-0">
                    <div
                        class="testimony-card w-full max-w-[1176px] h-auto md:h-[413px] mx-auto flex flex-col md:flex-row rounded-2xl overflow-hidden shadow-lg md:shadow-none">
                        <div
                            class="flex w-full h-[250px] md:h-full md:w-[436px] shrink-0 bg-aktiv-orange overflow-hidden">
                            <img src="{{ asset('assets/images/photos/testimony.png') }}"
                                class="w-full h-full object-cover object-top md:object-center" alt="photo">
                        </div>
                        <div
                            class="h-auto md:h-full w-full flex flex-col justify-between p-6 md:p-[42px] bg-[linear-gradient(280.42deg,#5B8CE9_-42.59%,#4EB6F5_50.66%,#5B8CE9_143.91%)] gap-6 md:gap-0">
                            <p
                                class="font-['Times_New_Roman'] font-bold text-2xl md:text-[38px] leading-snug md:leading-[60.8px] text-white">
                                "The support from the behind-the-scenes team is exceptional. They are responsive,
                                helpful, and genuinely invested in their members ❤️."
                            </p>

                            <div
                                class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 md:gap-0">
                                <div class="flex flex-col gap-1">
                                    <p class="font-semibold text-lg leading-[27px] text-white">Sophie</p>
                                    <p class="font-medium text-white text-sm md:text-base">Liam's Mother</p>
                                </div>
                                <div class="flex items-center">
                                    @foreach (range(1, 5) as $i)
                                        <img src="{{ asset('assets/images/icons/star.svg') }}"
                                            class="p-[2px] md:p-[5px] w-6 h-6 md:w-8 md:h-8" alt="star">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="absolute w-full max-w-[1244px] mx-auto left-1/2 top-1/2 transform -translate-x-1/2 z-10 px-2 md:px-0 pointer-events-none">
                <div class="flex justify-between w-full">
                    <div
                        class="swiper-button-prev !static !w-10 !h-10 md:!w-12 md:!h-12 rounded-full after:hidden cursor-pointer pointer-events-auto bg-white/20 hover:bg-white/40 backdrop-blur-sm md:bg-transparent">
                        <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full"
                            alt="icon">
                    </div>
                    <div
                        class="swiper-button-next !static !w-10 !h-10 md:!w-12 md:!h-12 rounded-full after:hidden cursor-pointer pointer-events-auto bg-white/20 hover:bg-white/40 backdrop-blur-sm md:bg-transparent">
                        <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-full h-full rotate-180"
                            alt="icon">
                    </div>
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
            autoHeight: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
