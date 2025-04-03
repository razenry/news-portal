<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 justify-center place-items-center">

    @forelse ($aspirations as $aspiration)
        <div class="relative group h-full">
            <!-- Elegant Card Container -->
            <div
                class="h-full flex flex-col bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-lg transition-all duration-300 transform group-hover:shadow-xl group-hover:-translate-y-1">
                <!-- Card Content -->
                <div class="p-6 flex flex-col flex-grow">
                    <!-- Category Badge -->
                    <span
                        class="self-start mb-3 px-3 py-1 text-xs font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 rounded-full shadow">
                        {{ $aspiration->category->name }}
                    </span>

                    <!-- Title with elegant underline effect -->
                    <a href="{{ route('aspiration.show', $aspiration->slug) }}" class="mb-3">
                        <h3
                            class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200 relative inline-block">
                            {{ $aspiration->title }}
                            <span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 group-hover:w-full transition-all duration-300"></span>
                        </h3>
                    </a>

                    <!-- Description with fade effect -->
                    <p
                        class="mb-6 text-gray-600 dark:text-gray-300 line-clamp-3 transition-all duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
                        {{ $aspiration->description }}
                    </p>

                    <!-- Bottom section with button -->
                    <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('aspiration.show', $aspiration->slug) }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 rounded-lg shadow-sm transition-all duration-300 transform hover:scale-[1.02]">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <!-- Empty State Card -->
        <div class="relative group h-full col-span-full">
            <div
                class="h-full flex flex-col bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-lg p-6 items-center justify-center text-center">
                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-2">Belum ada aspirasi</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Jadilah yang pertama mengajukan aspirasi!</p>
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