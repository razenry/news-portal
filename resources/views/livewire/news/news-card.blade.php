<div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1 h-full border border-gray-200/50 dark:border-gray-700/30"
    data-aos="fade-up">
    <!-- Enhanced Image with overlay -->
    <div class="relative overflow-hidden h-48">
        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Gambar {{ $blog->title }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
        <!-- Enhanced Category Badge -->
        <span class="absolute top-4 right-4 px-3 py-1 text-xs font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 rounded-full shadow-md hover:shadow-lg transition-shadow duration-300">
            {{ $blog->category->name }}
        </span>
    </div>

    <div class="p-6 flex flex-col flex-grow">
        <!-- Enhanced Title with gradient hover effect -->
        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white transition-colors line-clamp-2">
           <a href="{{ route('blog.show', $blog->slug) }}" class="group/title block">
               <span class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600 bg-clip-text text-transparent group-hover/title:opacity-100 opacity-0 absolute transition-opacity duration-300">{{ $blog->title }}</span>
               <span class="group-hover/title:opacity-0 transition-opacity duration-300">{{ $blog->title }}</span>
           </a>
        </h3>

        <!-- Enhanced Author & Date -->
        <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400 mb-4">
            <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 6a1 1 0 0 1 2 0v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-1a1 1 0 0 1 2 0v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1z"/>
                </svg>
                <span class="font-medium">{{ $blog->author->name }}</span>
            </div>
            <span class="text-gray-300 dark:text-gray-600">•</span>
            <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">{{ $blog->created_at->format('d M Y') }}</span>
            </div>
        </div>

        <!-- Enhanced Description -->
        <p class="text-gray-600 dark:text-gray-300 mb-5 line-clamp-3 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-200 transition-colors duration-300">
            {{ $blog->description }}
        </p>

        <!-- Enhanced Tags -->
        <div class="flex flex-wrap gap-2 mb-5">
            @foreach ($blog->tags as $blog->tag)
                <span class="px-2.5 py-1 text-xs font-medium bg-blue-100/80 hover:bg-blue-200 text-blue-800 dark:bg-blue-900/30 dark:hover:bg-blue-900/50 dark:text-blue-300 rounded-full transition-colors duration-200 cursor-default">
                    #{{ $blog->tag }}
                </span>
            @endforeach
        </div>

        <!-- Enhanced Read More Button -->
        <div class="mt-auto pt-4 border-t border-gray-100/50 dark:border-gray-700/50">
            <a href="{{ route('blog.show', $blog->slug) }}"
                class="inline-flex items-center text-base font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors group/button">
                Baca selengkapnya
                <svg class="ms-2 h-5 w-5 transition-transform duration-300 group-hover/button:translate-x-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover/button:w-full transition-all duration-300"></span>
            </a>
        </div>
    </div>
</div>
