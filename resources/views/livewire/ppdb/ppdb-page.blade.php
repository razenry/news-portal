<div class="min-h-screen w-full bg-gray-50 dark:bg-gray-900">
    <!-- Glassmorphism Header -->
    <header
        class="w-full bg-white/80 dark:bg-gray-800/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
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
                <div class="text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                       PPDB {{ $ppdb->name }}
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Section with Perfect Containment -->
    <main class="w-full py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Glassmorphism Content Card -->
            <div
                class="bg-white/80 dark:bg-gray-800/90 backdrop-blur-md rounded-3xl shadow overflow-hidden border border-gray-200/50 dark:border-gray-700/50">
                <div class="p-6 sm:p-8 md:p-10 lg:p-12">
                    <div class="tiptap-prose text-gray-900 dark:text-white">
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
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">Artikel terkait
                    {{ $ppdb->name }}</h2>
                <a href="#"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 inline-flex items-center">
                    Lihat semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center place-items-center">

                @forelse ($blogs as $ra)
                    <livewire:aspiration.partial.aspiration-card :aspiration="$ra" :type="$ra->type" />
                @empty
                    <!-- Empty State Card -->
                    <div class="relative group h-full col-span-full">
                        <div
                            class="h-full flex flex-col bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-lg p-6 items-center justify-center text-center">
                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-2">Belum ada aspirasi
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-4">Jadilah yang pertama mengajukan
                                aspirasi!</p>
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200">
                                Buat Aspirasi
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </aside>
</div>
