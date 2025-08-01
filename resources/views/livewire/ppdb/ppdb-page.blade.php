<div class="min-h-screen w-full bg-gray-50 dark:bg-gray-900">
    <!-- Glassmorphism Header -->
    <header
        class="w-full bg-white/80 dark:bg-gray-800/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-row items-center justify-center gap-6">
                <!-- Logo Container with Neumorphism Effect -->
                <div class="p-2 bg-white dark:bg-gray-800 rounded-2xl ">
                    @if ($ppdb->image)
                        <img src="{{ asset('storage/' . $ppdb->image) }}" alt="{{ $ppdb->name }} logo"
                            class="w-20 h-20 md:w-24 md:h-24 object-contain transition-all duration-500 hover:scale-110">
                    @else
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 dark:from-blue-600 dark:to-indigo-800 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- ppdb Name with Animated Underline -->
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                       PPDB {{ $ppdb->name }}
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Section with Perfect Containment -->
    <main class="w-full my-12">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Glassmorphism Content Card -->
            <div
                class="bg-white/80 dark:bg-gray-800/90 backdrop-blur-md rounded-3xl shadow overflow-hidden border border-gray-200/50 dark:border-gray-700/50 ">
                <div class="p-6 sm:p-8 md:p-10 lg:p-12 ">
                    <div class="tiptap-prose text-gray-900 dark:text-white ">
                        {!! $ppdb->content   !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
     <!-- Enhanced Text-Only Related Articles Section -->
    <aside aria-label="Related articles"
        class="py-12 lg:py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="px-4 mx-auto max-w-screen-xl">
            <!-- Berita Terbaru -->
            <section class="mt-4">
                <div class="flex items-center justify-between gap-4 mb-3">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Berita terkini di {{ $title }}</h2>

                    <a href="{{ route('unit.all', $unit->slug) }}" title=""
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
                                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Berita belum
                                    tersedia
                                </h2>
                                <p class="text-gray-600 dark:text-gray-400 mb-6">Kami belum memiliki berita terbaru
                                    untuk
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

            <!-- Trend -->
            <section class="mt-12">
                <div class="flex items-center justify-between gap-4 mb-3">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Topik terkini di {{ $title }}</h2>

                    <a href="{{ route('unit.all', $unit->slug) }}" title=""
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
                    @forelse ($aspirations as $aspiration)
                        <livewire:aspiration.partial.aspiration-card :aspiration="$aspiration" :type="$aspiration->type" />
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
                                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Berita belum
                                    tersedia
                                </h2>
                                <p class="text-gray-600 dark:text-gray-400 mb-6">Kami belum memiliki berita terbaru
                                    untuk
                                    ditampilkan saat
                                    ini.</p>
                                <a href="#"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 inline-flex items-center">
                                    Segera hadir
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
        </div>
    </aside>
</div>
