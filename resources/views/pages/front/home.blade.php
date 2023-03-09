<x-front-layout>

    {{-- hero section --}}
    <section
        class="hero bg-[url('/public/assets/img/hero-bg.jpg')] bg-cover bg-no-repeat bg-fixed hero h-[85.5vh] flex items-center relative">
        <div class="container">
            <div class=" flex flex-col items-end gap-4">
                <h1 class="primary-heading text-right">Pagrindinis šūkis</h1>
                <p class="font-['Josefin_Sans'] text-white lg:w-1/2 text-right mb-4">Curabitur aliquet quam amet,
                    consectetur
                    adipiscing elit lorem ut libero malesuada luctus et ultrices posuere cubilia feugiat adipiscing elit
                    ac diam sit amet.</p>
                <button class="primary-btn">Paslaugos</button>
            </div>

            <a href="#products"
                class="text-3xl opacity-85 text-cyan-800 absolute right-[50%] translate-x-1/2 bottom-8 animate-pulse"><i
                    class="fa-solid fa-angles-down"></i></a>
        </div>
    </section>

    {{-- products section --}}
    <section class="products container" id="products">
        <h2 class="primary-heading text-center">Paslaugos</h2>
    </section>

    {{-- slider section --}}
    <section class="slider-section relative p-0">
        <div class="slider-container">
            <div class="slide">
                <h3 class="slider-heading">Slide 1</h3>
                <img src="/assets/img/slide-1.jpg" alt="abstraction image" class="slide-img">
            </div>
            <div class="slide">
                <h3 class="slider-heading">Slide 2</h3>
                <img src="/assets/img/slide-2.jpg" alt="abstraction image" class="slide-img">
            </div>
            <div class="slide">
                <h3 class="slider-heading">Slide 3</h3>
                <img src="/assets/img/slide-3.jpg" alt="abstraction image" class="slide-img">
            </div>
        </div>
        <div class="btns-container">
            <button type="button" class="prevBtn pl-5 text-white text-2xl absolute left-0 top-1/2 -translate-y-1/3"><i
                    class="fa-solid fa-chevron-left"></i></button>
            <button type="button" class="nextBtn pr-5 text-white text-2xl absolute right-0 top-1/2 -translate-y-1/3"><i
                    class="fa-solid fa-chevron-right"></i></button>
        </div>
    </section>

    {{-- about section --}}
    <section class="about container" id="about">
        <h2 class="primary-heading text-center mb-16">Apie mus</h2>
        <div class="features grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-amber-300 flex items-center justify-center">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <p class="text-gray-600">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Vestibulum ante ipsum primis in
                    faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-[#a9ecea] flex items-center justify-center">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <p class="text-gray-600">Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque
                    in ipsum id orci porta dapibus. Proin eget tortor risus.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-amber-300 flex items-center justify-center">
                    <i class="fa-solid fa-paperclip"></i>
                </div>
                <p class="text-gray-600">Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin
                    eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-[#a9ecea] flex items-center justify-center">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <p class="text-gray-600">Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Sed porttitor lectus nibh.</p>
            </div>
        </div>
    </section>

    {{-- contact us section --}}
    {{-- <section class="items bg-gray-100" id="contacts">
        <div class="container">
            <h2 class="primary-heading text-center">Susisiekite</h2>
        </div class="container">
    </section> --}}

</x-front-layout>
