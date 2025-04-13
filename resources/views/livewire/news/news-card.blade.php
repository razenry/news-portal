<div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
    data-aos="fade-up">
    <!-- Image with overlay -->
    <div class="relative overflow-hidden h-48">
        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Gambar {{ $blog->title }}"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/30 to-transparent"></div>
        <!-- Category Badge -->
        <span class="absolute top-4 right-4 px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full shadow">
            {{ $blog->category->name }}
        </span>
    </div>

    <div class="p-6 flex flex-col flex-grow">
        <!-- Title -->
        <h3
            class="text-xl font-bold mb-3 text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
           <a href="{{ route('blog.show', $blog->slug) }}"> {{ $blog->title }}</a>
        </h3>

        <!-- Author & Date -->
        <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400 mb-4">
            <div class="flex items-center">

                {{ $blog->author->name }}
            </div>
            <span>•</span>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                {{ $blog->created_at->format('d M Y') }}
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 mb-5 line-clamp-3">
            {{ $blog->description }}
        </p>

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 mb-5">
            @foreach ($blog->tags as $blog->tag)
                <span
                    class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 rounded-full">
                    #{{ $blog->tag }}
                </span>
            @endforeach
        </div>

        <!-- Read More Button -->
        <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700">
            <a href="{{ route('blog.show', $blog->slug) }}"
                class="inline-flex items-center text-base font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                Baca selengkapnya
                <svg class="ms-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>
</div>
