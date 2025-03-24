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

        <!-- Carousel Container -->
        <div class="relative w-full max-w-2xl mx-auto overflow-hidden rounded-lg shadow-lg">
            <!-- Carousel Slides -->
            <div class="carousel-inner relative w-full h-full">
                <!-- Slide 1 -->
                <div class="carousel-item active transition-opacity duration-700 ease-in-out aspect-[16/9]">
                    <img src="https://placehold.co/800x450" alt="Slide 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 text-white">
                        <h2 class="text-lg font-bold">Judul Slide 1</h2>
                        <p class="text-sm opacity-90">Deskripsi singkat untuk slide 1.</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9]">
                    <img src="https://placehold.co/800x450" alt="Slide 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 text-white">
                        <h2 class="text-lg font-bold">Judul Slide 2</h2>
                        <p class="text-sm opacity-90">Deskripsi singkat untuk slide 2.</p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9]">
                    <img src="https://placehold.co/800x450" alt="Slide 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 text-white">
                        <h2 class="text-lg font-bold">Judul Slide 3</h2>
                        <p class="text-sm opacity-90">Deskripsi singkat untuk slide 3.</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Navigasi -->
            <button id="prevButton"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/30 p-2 rounded-full hover:bg-white/50 transition-all duration-300">
                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
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

        <!-- Side -->
         <div class="">

            <div class="flex justify-between px-3 items-center mb-3">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Kata Mereka</h2>
                <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Lihat semua</a>
            </div>


             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 justify-center place-items-center">
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
                             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 14 10">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M1 5h12m0 0L9 1m4 4L9 9" />
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
                         This is another example with different content, which might be longer or shorter than the first one.
                         But the card size remains the same.
                     </p>
                     <div class="">
                         <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 
                     rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                     dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                             Read more
                             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 14 10">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M1 5h12m0 0L9 1m4 4L9 9" />
                             </svg>
                         </a>
                     </div>
                 </div>
             </div>
         </div>

    </div>


    <!-- Berita Terbaru -->
    <section class="mt-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-white">Berita</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Berita 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
                <img src="https://placehold.co/400x200" alt="Gambar Berita 1" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">Kegiatan Lomba
                        Melipat Kertas Origami</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">Kegiatan lomba melipat kertas
                        origami telah dilaksanakan dengan sukses.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-auto">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Berita 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
                <img src="https://placehold.co/400x200" alt="Gambar Berita 2" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">Peringatan HUT RI
                        ke-77</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">Peringatan HUT RI ke-77 di YPP Al
                        Amanah Al Bantani berlangsung meriah.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-auto">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Berita 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
                <img src="https://placehold.co/400x200" alt="Gambar Berita 3" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">Literasi Bersama
                        Perpustakaan Keliling</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">Kegiatan literasi bersama
                        perpustakaan keliling telah dilaksanakan.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-auto">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Berita 4 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
                <img src="https://placehold.co/400x200" alt="Gambar Berita 4" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">Literasi Bersama
                        Perpustakaan Keliling</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">Kegiatan literasi bersama
                        perpustakaan keliling telah dilaksanakan.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-auto">Baca Selengkapnya</a>
                </div>
            </div>
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