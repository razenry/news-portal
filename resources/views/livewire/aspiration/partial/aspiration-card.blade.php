<div class="relative group h-full">
    <!-- Enhanced Elegant Card Container with consistent dimensions -->
    <div class="h-full flex flex-col bg-white dark:bg-gray-800 border border-gray-200/70 dark:border-gray-700/50 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 ease-[cubic-bezier(0.25,0.8,0.25,1)] group-hover:-translate-y-1 backdrop-blur-sm bg-opacity-80 dark:bg-opacity-80">
        <!-- Glow Effect (Modern Touch) -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 to-transparent dark:from-blue-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

        <!-- Card Content with Improved Spacing -->
        <div class="p-6 flex flex-col h-full">
            <!-- Content Section with Scrollable Area if Needed -->
            <div class="flex-1 overflow-hidden space-y-4">
                <!-- Header with Category and Unit -->
                <div class="flex justify-between items-start gap-2">
                    <!-- Enhanced Category Badge -->
                    <a href="{{ route('category.show', $aspiration->category->slug) }}"
                        class="px-3 py-1 text-xs font-semibold tracking-wide text-white bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 rounded-full shadow-md hover:shadow-lg transition-shadow duration-300 line-clamp-1">
                        {{ $aspiration->category->name }}
                    </a>

                    <!-- Unit Badge with consistent styling -->
                    <a href="{{ route('unit.show', $aspiration->unit->slug) }}" class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-full shadow-sm hover:from-purple-600 hover:to-indigo-700 transition-all duration-300">
                        <svg class="w-4 h-4 mr-1 text-white opacity-80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 13V7a2 2 0 012-2h8a2 2 0 012 2v6m-2 4H6a2 2 0 01-2-2v-1h12v1a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="line-clamp-1">{{ $aspiration->unit->name }}</span>
                    </a>
                </div>

                @php
                    $route = $type->value === 'Aspirasi' ? 'aspiration.show' : 'blog.show';
                @endphp

                <!-- Title with improved hover effect -->
                <a href="{{ route($route, $aspiration->slug) }}" class="block group/title">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white transition-colors duration-300 relative pb-2">
                        <span class="relative z-10 line-clamp-2">{{ $aspiration->title }}</span>
                        <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-gradient-to-r from-blue-500 to-blue-600 group-hover/title:w-full transition-all duration-500 ease-out"></span>
                    </h3>
                </a>

                <!-- Metadata with consistent spacing -->
                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 dark:text-gray-400">
                    <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 6a1 1 0 0 1 2 0v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-1a1 1 0 0 1 2 0v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1z"/>
                        </svg>
                        <span class="font-medium line-clamp-1">{{ $aspiration->author->name }}</span>
                    </div>
                    <span class="text-gray-300 dark:text-gray-600">•</span>
                    <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-medium">{{ $aspiration->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <!-- Description with constrained height -->
                <p class="text-gray-600 dark:text-gray-300 line-clamp-3 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200 leading-relaxed">
                    {{ $aspiration->description }}
                </p>
            </div>

            <!-- Button Container with Fixed Position at Bottom -->
            <div class="pt-4 mt-4 border-t border-gray-100/50 dark:border-gray-700/50">
                <a href="{{ route($route, $aspiration->slug) }}" class="relative inline-flex items-center justify-center w-full px-4 py-2.5 overflow-hidden font-medium text-white transition-all duration-300 ease-out rounded-lg group bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800">
                    <span class="absolute bottom-0 right-0 w-8 h-8 -mb-2 -mr-2 transition-all duration-300 ease-linear transform rotate-45 translate-x-1 bg-blue-800 opacity-10 group-hover:translate-x-0"></span>
                    <span class="absolute top-0 left-0 w-8 h-8 -mt-2 -ml-2 transition-all duration-300 ease-linear transform -rotate-45 -translate-x-1 bg-blue-800 opacity-10 group-hover:translate-x-0"></span>
                    <span class="relative z-20 flex items-center text-sm font-semibold tracking-wide">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
