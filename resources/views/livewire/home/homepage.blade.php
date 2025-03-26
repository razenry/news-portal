<main class="container mx-auto px-4 py-8">
    <style>
        .carousel-item {
            display: none;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-item.active {
            display: block;
        }
    </style>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

        <div class="">
            <div class="flex items-center justify-between gap-4 md">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
            </div>
            <!-- Carousel Container -->
            <div class="relative w-full max-w-2xl mx-auto overflow-hidden rounded-lg shadow-lg">
                <!-- Carousel Slides -->
                <div class="carousel-inner relative w-full h-full">
                    <!-- Slide 1 -->
                    <div class="carousel-item active transition-opacity duration-700 ease-in-out aspect-[16/9]">
                        <img src="{{ asset('image/banner.jpg') }}" alt="Slide 1" class="w-full h-full object-fit">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h2 class="text-xl font-bold">Judul Slide 1</h2>
                            <p class="text-sm opacity-90">Deskripsi singkat untuk slide 1.</p>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9]">
                        <img src="{{ asset('image/banner.jpg') }}" alt="Slide 2" class="w-full h-full object-fit">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h2 class="text-xl font-bold">Judul Slide 2</h2>
                            <p class="text-sm opacity-90">Deskripsi singkat untuk slide 2.</p>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9]">
                        <img src="{{ asset('image/banner.jpg') }}" alt="Slide 3" class="w-full h-full object-fit">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h2 class="text-xl font-bold">Judul Slide 3</h2>
                            <p class="text-sm opacity-90">Deskripsi singkat untuk slide 3.</p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Navigasi -->
                <button id="prevButton"
                    class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/30 p-2 rounded-full hover:bg-white/50 transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <button id="nextButton"
                    class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/30 p-2 rounded-full hover:bg-white/50 transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Side -->
        <div class="space-y-2">

            <div class="flex items-center justify-between gap-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kata mereka</h2>

                <a href="#" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 justify-center place-items-center">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 
             dark:border-gray-700 h-full flex flex-col">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Noteworthy technology acquisitions 2021
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological
                        order.
                    </p>
                    <div class="">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 
                     rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                     dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 
             dark:border-gray-700 h-full flex flex-col">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Noteworthy technology acquisitions 2021
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                        This is another example with different content, which might be longer or shorter than the first
                        one.
                        But the card size remains the same.
                    </p>
                    <div class="">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 
                     rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                     dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section class="bg-white dark:bg-gray-900 my-8 antialiased  md:py-8">
        <div class="mx-auto max-w-screen-xl 2xl:px-0 space-y-2">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kategori berita</h2>

                <a href="#" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <!-- Kategori -->

                @forelse($categories as $category)
                    <a href="#"
                        class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="me-2 h-4 w-4 shrink-0 text-gray-900 dark:text-white" aria-hidden="true"
                            src="{{ asset('storage/' . $category->icon) }}"/>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $category->name }}</span>
                    </a>
                @empty
                    <a href="#"
                        class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <svg class="me-2 h-4 w-4 shrink-0 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Computer &amp; Office</span>
                    </a>
                @endforelse



            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="mt-12">
        <div class="flex items-center justify-between gap-4 mb-3">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Berita terkini</h2>

            <a href="#" title=""
                class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                Lihat semua
                <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Berita  -->
            @forelse ($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
                    <!-- Gambar -->
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}"
                        class="w-full h-48 object-cover">

                    <div class="p-6 flex flex-col flex-grow">
                
                        <!-- Judul -->
                        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">{{ $post->title }}
                        </h3>

                        <!-- Informasi Penulis & Tanggal -->
                        <div class="text-gray-500 dark:text-gray-400 text-sm mb-2 flex flex-col">
                            <span class="font-semibold">{{ $post->author->name }}</span>
                            <div class="flex gap-1.5">
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                                <span>|</span>
                                <span>{{ $post->category->name }}</span>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">{{ $post->description }}</p>

                        <!-- Hashtag -->
                        <div class="flex flex-wrap gap-1 mb-4">
                            @foreach($post->tags as $tag)
                                <span class=" text-blue-600 dark:text-blue-300 text-sm ">
                                    #{{ $tag }}
                                </span>
                            @endforeach
                        </div>

                        <!-- Tombol Baca Selengkapnya -->
                        <a href="#" title=""
                            class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                            Baca selengkapnya
                            <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>

            @empty
                <div class="flex flex-col items-center justify-center text-center ">
                    <img src="https://placehold.co/300x200?text=No+News" alt="No News" class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Berita belum tersedia</h2>
                    <p class="text-gray-600 dark:text-gray-400">Kami belum memiliki berita terbaru untuk ditampilkan saat
                        ini.</p>
                    <a href="#" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Segera
                        hadir</a>
                </div>
            @endforelse

        </div>
    </section>

    <style>
        .title-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .description-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <!-- JavaScript untuk Carousel -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;

        // Fungsi untuk menampilkan slide
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        // Fungsi untuk slide berikutnya
        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Fungsi untuk slide sebelumnya
        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        }

        // Event listener untuk tombol navigasi
        document.getElementById('nextButton').addEventListener('click', nextSlide);
        document.getElementById('prevButton').addEventListener('click', prevSlide);

        // Otomatis pindah slide setiap 5 detik
        setInterval(nextSlide, 5000);
    </script>
</main>