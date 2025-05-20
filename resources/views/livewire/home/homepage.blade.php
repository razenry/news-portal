<main class="container mx-auto px-4 py-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

        {{-- Carousel --}}

        <livewire:components.carousel />

        <!-- Side -->
        <div class="space-y-2">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kata mereka</h2>

                <a href="/aspirasi" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 justify-center place-items-center">
                @forelse ($aspirations as $aspiration)
                    <livewire:aspiration.partial.aspiration-card :aspiration="$aspiration" :type="$aspiration->type" />
                @empty
                @endforelse
            </div>
        </div>

    </div>

    <section class="bg-white dark:bg-gray-900 my-8 antialiased  md:py-8">
        <div class="mx-auto max-w-screen-xl 2xl:px-0 space-y-2">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kategori berita</h2>

                <a href="{{ route('category.all') }}"
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <livewire:components.category.category-card />

        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="mt-12">
        <div class="flex items-center justify-between gap-4 mb-3">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Berita terkini</h2>

            <a href="/blog" title=""
                class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                Lihat semua
                <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($blogs as $blog)
                <livewire:news.news-card :blog="$blog" />
            @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div
                        class="flex flex-col items-center justify-center text-center bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Berita belum tersedia
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Kami belum memiliki berita terbaru untuk
                            ditampilkan saat
                            ini.</p>
                        <a href="#"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 inline-flex items-center">
                            Segera hadir
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

    </section>

    <livewire:about.about-section />

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
