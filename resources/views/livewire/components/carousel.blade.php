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
                <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}"
                    data-slide-index="{{ $index }}">
                    <a href="{{ route($route, $slide->slug) }}" class="block w-full h-full">
                        <img src="{{ asset('storage/' . $slide->thumbnail) }}" alt="{{ $slide->title }}"
                            class="w-full h-full max-h-[70vh] md:max-h-[82vh] object-cover object-center"
                            loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
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
                </div>
            @empty
                <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-10">
                    <img src="{{ asset('image/banner.jpg') }}" alt="Default Slide"
                        class="w-full h-full max-h-[70vh] md:max-h-[82vh] object-cover" loading="eager">
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
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/30 p-2 rounded-full hover:bg-black/50 transition-all duration-300 focus:outline-none z-20 opacity-0 group-hover:opacity-100"
            aria-label="Previous slide">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button id="nextButton"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/30 p-2 rounded-full hover:bg-black/50 transition-all duration-300 focus:outline-none z-20 opacity-0 group-hover:opacity-100"
            aria-label="Next slide">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Indicator Dots -->
        @if(count($slides) > 1)
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
            @foreach ($slides as $index => $slide)
                <button data-slide-index="{{ $index }}"
                    class="indicator-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white w-6' : 'bg-white/30' }} hover:bg-white/70 focus:outline-none"
                    aria-label="Go to slide {{ $index + 1 }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}">
                </button>
            @endforeach
        </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector('[data-carousel]');
        if (!carousel) return;

        const slides = document.querySelectorAll(".carousel-item");
        const indicatorDots = document.querySelectorAll(".indicator-dot");
        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");

        if (slides.length <= 1) {
            // Hide controls if only one slide
            if (prevButton) prevButton.style.display = 'none';
            if (nextButton) nextButton.style.display = 'none';
            return;
        }

        let currentIndex = 0;
        let slideInterval;
        let isHovering = false;
        let isTransitioning = false;
        let touchStartX = 0;
        let touchEndX = 0;

        // Function to show slide with transition control
        function showSlide(index) {
            if (isTransitioning) return;

            isTransitioning = true;

            // Wrap around if index is out of bounds
            if (index >= slides.length) {
                index = 0;
            } else if (index < 0) {
                index = slides.length - 1;
            }

            // Update z-index and opacity
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.add("opacity-100", "z-10");
                    slide.classList.remove("opacity-0", "z-0");
                } else {
                    slide.classList.add("opacity-0", "z-0");
                    slide.classList.remove("opacity-100", "z-10");
                }
            });

            // Update indicator dots
            indicatorDots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add("bg-white", "w-6");
                    dot.classList.remove("bg-white/30");
                    dot.setAttribute("aria-current", "true");
                } else {
                    dot.classList.remove("bg-white", "w-6");
                    dot.classList.add("bg-white/30");
                    dot.setAttribute("aria-current", "false");
                }
            });

            currentIndex = index;

            // Reset transitioning flag after animation completes
            setTimeout(() => {
                isTransitioning = false;
            }, 700);
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
        if (prevButton) {
            prevButton.addEventListener("click", (e) => {
                e.preventDefault();
                goToPrevSlide();
            });
        }

        if (nextButton) {
            nextButton.addEventListener("click", (e) => {
                e.preventDefault();
                goToNextSlide();
            });
        }

        if (indicatorDots.length > 0) {
            indicatorDots.forEach((dot, index) => {
                dot.addEventListener("click", (e) => {
                    e.preventDefault();
                    goToSlide(index);
                });
            });
        }

        // Keyboard navigation
        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                e.preventDefault();
                goToPrevSlide();
            } else if (e.key === "ArrowRight") {
                e.preventDefault();
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
        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(slideInterval);
        }, { passive: true });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startInterval();
        }, { passive: true });

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

        // Cleanup on unmount
        window.addEventListener('beforeunload', () => {
            clearInterval(slideInterval);
        });
    });
</script>
