<div class="min-h-screen w-full bg-gray-50 dark:bg-gray-900">
    <!-- Glassmorphism Header -->
    <header
        class="w-full bg-white/80 dark:bg-gray-800/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-3">
                <!-- Logo Container with Neumorphism Effect -->
                <div class="p-2 bg-white dark:bg-gray-800 rounded-2xl ">
                    @if ($unit->logo)
                        <img src="{{ asset('storage/' . $unit->logo) }}" alt="{{ $unit->name }} Logo"
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

                <!-- Unit Name with Animated Underline -->
                <div class="text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                        {{ $unit->name }}
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
                class="bg-white/80 dark:bg-gray-800/90 backdrop-blur-md rounded-3xl shadow overflow-hidden border border-gray-200/50 dark:border-gray-700/50">
                <div class="p-6 sm:p-8 md:p-10 lg:p-12">
                    <div class="tiptap-prose text-gray-900 dark:text-white">
                        {!! $unit->description !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Enhanced Text-Only Related Articles Section -->
    <aside aria-label="Related articles"
        class="py-12 lg:py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="px-4 mx-auto max-w-screen-xl">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">Artikel terkait
                    {{ $unit->name }}</h2>
                <a href="{{ route('unit.all', $unit->slug) }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 inline-flex items-center">
                    Lihat semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($blogs as $blog)
                    @if ($blog->type->value === 'Blog')
                        <livewire:news.news-card :blog="$blog" />
                    @endif
                    @if ($blog->type->value === 'Aspirasi')
                        <livewire:aspiration.partial.aspiration-card :aspiration="$blog" :type="$blog->type" />
                    @endif
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
        </div>
    </aside>
</div>
