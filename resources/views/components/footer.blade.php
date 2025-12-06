<footer class="w-full px-4 py-8 md:p-[52px] bg-white">
    <div class="flex flex-col w-full max-w-[1176px] mx-auto gap-8">
        <div class="flex flex-col items-center gap-4 text-center">
            <img src="{{ asset('assets/images/logos/logo-blue.svg') }}" class="h-10" alt="logo">
            <p class="font-medium text-aktiv-grey text-sm md:text-base">
                Learnix delivers high-quality education through dedicated,
                <br class="hidden md:block">
                face-to-face learning experiences.
            </p>
        </div>

        <hr class="border-[#E6E7EB]">

        <div class="flex flex-col gap-8 md:grid md:grid-cols-3 items-center">
            <p
                class="flex font-medium text-aktiv-grey order-3 md:order-1 justify-center md:justify-start w-full text-sm md:text-base">
                <span>Copyright &copy; <span id="year"></span> Learnix</span>
            </p>
            <ul class="flex flex-wrap items-center justify-center gap-4 md:gap-6 order-1 md:order-2 w-full">
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Workshop</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Community</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Testimony</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">About Us</a>
                </li>
            </ul>
            <ul class="flex items-center justify-center md:justify-end gap-6 order-2 md:order-3 w-full">
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Instagram</a>
                </li>
                <li
                    class="font-medium text-aktiv-grey text-sm md:text-base text-nowrap hover:font-semibold hover:text-aktiv-orange transition-all duration-300">
                    <a href="#">Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script>
    document.getElementById("year").innerText = new Date().getFullYear();
</script>
