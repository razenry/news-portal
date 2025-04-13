<main class="container mx-auto px-4 py-4">
    <!-- Berita Terbaru -->
    <section class="mt-8">
        <div class="flex items-center justify-between gap-4 mb-3">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Berita terkini</h2>

            <a href="/  " title=""
                class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                Kembali
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
</main>
