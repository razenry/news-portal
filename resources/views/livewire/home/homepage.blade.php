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

    <!-- Carousel Container -->
    <div class="relative w-full mx-auto overflow-hidden rounded-xl shadow-2xl">
        <!-- Carousel Slides -->
        <div class="carousel-inner relative w-full">
            <!-- Slide 1 -->
            <div class="carousel-item active transition-opacity duration-700 ease-in-out aspect-video">
                <img src="https://placehold.co/1200x500" alt="Slide 1" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">Judul Slide 1</h2>
                    <p class="text-sm md:text-lg opacity-90">Deskripsi singkat untuk slide 1.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-video">
                <img src="https://placehold.co/1200x500" alt="Slide 2" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">Judul Slide 2</h2>
                    <p class="text-sm md:text-lg opacity-90">Deskripsi singkat untuk slide 2.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-video">
                <img src="https://placehold.co/1200x500" alt="Slide 3" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 text-white">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">Judul Slide 3</h2>
                    <p class="text-sm md:text-lg opacity-90">Deskripsi singkat untuk slide 3.</p>
                </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <button id="prevButton"
            class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/30 dark:bg-gray-800/30 p-2 rounded-full hover:bg-white/50 dark:hover:bg-gray-800/50 transition-all duration-300">
            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-800 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button id="nextButton"
            class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/30 dark:bg-gray-800/30 p-2 rounded-full hover:bg-white/50 dark:hover:bg-gray-800/50 transition-all duration-300">
            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-800 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

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

    <!-- Berita Terbaru -->
    <section class="mt-12">
        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-white">Berita Terbaru</h2>
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
</main>