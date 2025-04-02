<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse ($posts as $post)
        <!-- News Card -->
        <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up">
            <!-- Image with overlay -->
            <div class="relative overflow-hidden h-48">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/30 to-transparent"></div>
                <!-- Category Badge -->
                <span
                    class="absolute top-4 right-4 px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full shadow">
                    {{ $post->category->name }}
                </span>
            </div>

            <div class="p-6 flex flex-col flex-grow">
                <!-- Title -->
                <h3
                    class="text-xl font-bold mb-3 text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                    {{ $post->title }}
                </h3>

                <!-- Author & Date -->
                <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400 mb-4">
                    <div class="flex items-center">
                      
                        {{ $post->author->name }}
                    </div>
                    <span>•</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $post->created_at->format('d M Y') }}
                    </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 dark:text-gray-300 mb-5 line-clamp-3">
                    {{ $post->description }}
                </p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-5">
                    @foreach($post->tags as $tag)
                        <span
                            class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 rounded-full">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>

                <!-- Read More Button -->
                <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700">
                    <a href="#"
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
    @empty
        <!-- Empty State -->
        <div class="col-span-full">
            <div
                class="flex flex-col items-center justify-center text-center bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">Berita belum tersedia</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Kami belum memiliki berita terbaru untuk ditampilkan saat
                    ini.</p>
                <a href="#"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 inline-flex items-center">
                    Segera hadir
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    @endforelse
</div>