<div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1 h-full border border-gray-200/50 dark:border-gray-700/30"
    data-aos="fade-up">

    <!-- Image (16:9 Aspect Ratio) -->
    <div class="relative overflow-hidden aspect-[16/9] group">
        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Gambar {{ $blog->title }}"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>

        <!-- Views Badge — biru solid -->
        <div
            class="absolute top-3 right-3 z-20 px-3 py-2 text-xs font-bold flex items-center gap-1.5
                   rounded-xl shadow-lg
                   bg-blue-600 text-white
                   dark:bg-blue-700]
                   transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">

            <!-- Eye Icon -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <span class="font-bold tracking-wide">
                @if ($blog->views >= 1000000)
                    {{ number_format($blog->views / 1000000, 1) }}m
                @elseif($blog->views >= 1000)
                    {{ number_format($blog->views / 1000, 1) }}k
                @else
                    {{ $blog->views }}
                @endif
            </span>
        </div>
    </div>

    <!-- Card Content -->
    <div class="p-5 flex flex-col flex-grow">

        <!-- Title -->
        <h3 class="min-h-[3.5rem] mb-3">
            <a href="{{ route('blog.show', $blog->slug) }}" class="block">
                <span
                    class="text-xl font-bold text-gray-900 dark:text-white line-clamp-2 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                    {{ $blog->title }}
                </span>
            </a>
        </h3>

        <!-- Category Badge -->
        <div class="mb-3">
            <a href="{{ route('category.show', $blog->category->slug) }}"
                class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white
                       bg-gradient-to-r from-blue-500 to-blue-600
                       dark:from-blue-600 dark:to-blue-700
                       rounded-full shadow hover:shadow-md transition-all duration-300">
                {{ $blog->category->name }}
            </a>
        </div>

        <!-- Metadata -->
        <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400 mb-4 min-h-[1.5rem]">

            <!-- Author -->
            <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5 opacity-70" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 6a1 1 0 0 1 2 0v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-1a1 1 0 0 1 2 0v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1z" />
                </svg>
                <span class="font-medium">{{ $blog->author->name }}</span>
            </div>

            <span class="text-gray-300 dark:text-gray-600">•</span>

            <!-- Published Date -->
            <div class="flex items-center hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">{{ $blog->created_at->format('d M Y') }}</span>
            </div>

        </div>

        <!-- Description -->
        <p
            class="text-gray-600 dark:text-gray-300 mb-5 line-clamp-3 leading-relaxed min-h-[4.5rem] group-hover:text-gray-700 dark:group-hover:text-gray-200 transition-colors duration-300">
            {{ $blog->description }}
        </p>

        <!-- Tags -->
        <div class="mb-5">
            <div
                class="flex flex-wrap gap-2 max-h-20 overflow-y-auto py-1
               scrollbar-thin scrollbar-thumb-gray-300
               dark:scrollbar-thumb-gray-700 scrollbar-track-transparent">

                @foreach ($blog->tags as $tag)
                    <span
                        class="px-2.5 py-1 text-xs font-medium
                       rounded-full transition-all duration-200
                       bg-blue-100 text-blue-800 hover:bg-blue-200
                       dark:bg-blue-800/40 dark:text-blue-800
                       dark:hover:bg-blue-800/60">

                        #{{ $tag }}
                    </span>
                @endforeach

            </div>
        </div>


        <!-- Unit -->
        <div class="mt-auto">
            <a href="{{ route('unit.show', $blog->unit->slug) }}"
                class="inline-flex items-center px-3 py-1 text-xs font-semibold
               text-white rounded-full shadow-sm
               bg-gradient-to-r from-purple-500 to-indigo-600
               hover:from-purple-600 hover:to-indigo-700
               dark:from-purple-600 dark:to-indigo-700
               dark:hover:from-purple-700 dark:hover:to-indigo-800
               transition-all duration-300">

                <svg class="w-4 h-4 mr-1 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 13V7a2 2 0 012-2h8a2 2 0 012 2v6m-2 4H6a2 2 0 01-2-2v-1h12v1a2 2 0 01-2 2z" />
                </svg>

                {{ $blog->unit->name }}
            </a>
        </div>

        <!-- Read More -->
        <div class="mt-4 pt-4 border-t border-gray-100/50 dark:border-gray-700/50">
            <a href="{{ route('blog.show', $blog->slug) }}"
                class="inline-flex items-center text-base font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors group/button">
                Baca selengkapnya
                <svg class="ms-2 h-5 w-5 transition-transform duration-300 group-hover/button:translate-x-1"
                    aria-hidden="true" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>

    </div>
</div>
