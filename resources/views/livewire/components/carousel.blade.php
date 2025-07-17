<div class="w-full">
    <!-- Carousel Container -->
    <div class="relative w-full mx-auto overflow-hidden rounded-xl shadow-2xl aspect-[16/9] max-h-[70vh] md:max-h-[82vh] group"
        data-carousel>
        <!-- Carousel Slides -->
        <div class="carousel-inner relative w-full h-full">
            @forelse ($slides as $index => $slide)
                @php
                    $route = $slide->type === "Aspirasi" ? 'aspiration.show' : 'blog.show';
                @endphp
                <a href="{{ route($route, $slide->slug) }}"
                    class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                    data-slide-index="{{ $index }}">
                    <img src="{{ asset('storage/' . $slide->thumbnail) }}" alt="{{ $slide->title }}"
                        class="w-full h-full max-h-[70vh] md:max-h-[82vh] object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 text-white space-y-2">
                        <div>
                            <a href="{{ route('unit.show', $slide->unit->slug) }}"
                                class="inline-flex items-center px-3 py-1 text-xs font-medium bg-gradient-to-r from-purple-600 to-indigo-700 text-white rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                                {{ $slide->unit->name }}
                            </a>
                        </div>
                        <h2 class="text-xl md:text-4xl font-bold leading-tight line-clamp-2">
                            {{ $slide->title }}
                        </h2>
                        <p class="text-sm md:text-lg text-gray-200 opacity-90 mt-1 md:mt-2 line-clamp-2">
                            {{ $slide->description }}
                        </p>
                    </div>
                </a>
            @empty
                <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100">
                    <img src="{{ asset('image/banner.jpg') }}" alt="Default Slide"
                        class="w-full h-full max-h-[70vh] md:max-h-[82vh] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 text-white">
                        <h2 class="text-xl md:text-4xl font-bold">Judul Slide</h2>
                        <p class="text-sm md:text-lg text-gray-200 opacity-90 mt-2">Deskripsi singkat untuk slide.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Navigation Buttons -->
        <button id="prevButton"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/30 p-2 rounded-full hover:bg-black/50 transition-all duration-300 focus:outline-none z-10 opacity-0 group-hover:opacity-100"
            aria-label="Previous slide">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button id="nextButton"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/30 p-2 rounded-full hover:bg-black/50 transition-all duration-300 focus:outline-none z-10 opacity-0 group-hover:opacity-100"
            aria-label="Next slide">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Indicator Dots -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            @foreach ($slides as $index => $slide)
                <button data-slide-index="{{ $index }}"
                    class="indicator-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white w-6' : 'bg-white/30' }} hover:bg-white/70"
                    aria-label="Go to slide {{ $index + 1 }}">
                </button>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector('[data-carousel]');
        const slides = document.querySelectorAll(".carousel-item");
        const indicatorDots = document.querySelectorAll(".indicator-dot");
        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");

        let currentIndex = 0;
        let slideInterval;
        let isHovering = false;

        // Function to show slide
        function showSlide(index) {
            // Wrap around if index is out of bounds
            if (index >= slides.length) {
                index = 0;
            } else if (index < 0) {
                index = slides.length - 1;
            }

            slides.forEach((slide, i) => {
                slide.classList.toggle("opacity-100", i === index);
                slide.classList.toggle("opacity-0", i !== index);
            });

            // Update indicator dots
            indicatorDots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add("bg-white", "w-6");
                    dot.classList.remove("bg-white/30");
                } else {
                    dot.classList.remove("bg-white", "w-6");
                    dot.classList.add("bg-white/30");
                }
            });

            currentIndex = index;
        }

        // Navigation functions
        function goToPrevSlide() {
            showSlide(currentIndex - 1);
            resetInterval();
        }

        function goToNextSlide() {
            showSlide(currentIndex + 1);
            resetInterval();
        }

        function goToSlide(index) {
            showSlide(index);
            resetInterval();
        }

        // Auto-rotation functions
        function startInterval() {
            if (!isHovering) {
                slideInterval = setInterval(goToNextSlide, 5000);
            }
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
        }

        // Event listeners
        prevButton.addEventListener("click", goToPrevSlide);
        nextButton.addEventListener("click", goToNextSlide);

        indicatorDots.forEach((dot, index) => {
            dot.addEventListener("click", () => goToSlide(index));
        });

        // Keyboard navigation
        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                goToPrevSlide();
            } else if (e.key === "ArrowRight") {
                goToNextSlide();
            }
        });

        // Pause on hover
        carousel.addEventListener('mouseenter', () => {
            isHovering = true;
            clearInterval(slideInterval);
        });

        carousel.addEventListener('mouseleave', () => {
            isHovering = false;
            startInterval();
        });

        // Touch events for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(slideInterval);
        }, {
            passive: true
        });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startInterval();
        }, {
            passive: true
        });

        function handleSwipe() {
            const threshold = 50; // minimum swipe distance
            if (touchStartX - touchEndX > threshold) {
                goToNextSlide(); // swipe left
            } else if (touchEndX - touchStartX > threshold) {
                goToPrevSlide(); // swipe right
            }
        }

        // Initialize
        showSlide(currentIndex);
        startInterval();
    });
</script>
