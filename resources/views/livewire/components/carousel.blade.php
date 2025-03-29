<div>
    <div class="">
        <div class="flex items-center justify-between gap-4 md">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"></h2>
        </div>

        <!-- Carousel Container -->
        <div class="relative w-full max-w-2xl mx-auto overflow-hidden rounded-lg shadow-lg" data-carousel>
            <!-- Carousel Slides -->
            <div class="carousel-inner relative w-full h-full">
                @forelse ($slides as $index => $slide)
                    <div
                        class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9] {{ $index === 0 ? '' : 'hidden' }} shadow-lg">
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="Slide {{ $index + 1 }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h2 class="text-xl font-bold">{{ $slide->title }}</h2>
                            <p class="text-sm opacity-90">{{ $slide->description ?? 'Deskripsi tidak tersedia' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item transition-opacity duration-700 ease-in-out aspect-[16/9]">
                        <img src="{{ asset('image/banner.jpg') }}" alt="Default Slide" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                            <h2 class="text-xl font-bold">Judul Slide 1</h2>
                            <p class="text-sm opacity-90">Deskripsi singkat untuk slide 1.</p>
                        </div>
                    </div>
                @endforelse
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slides = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle("hidden", i !== index);
                });
            }

            document.getElementById("prevButton").addEventListener("click", function () {
                currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
                showSlide(currentIndex);
            });

            document.getElementById("nextButton").addEventListener("click", function () {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            });

            showSlide(currentIndex);
        });
    </script>
</div>