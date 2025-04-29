<div class="min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300">
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <!-- Enhanced User Info Section -->
                <header class="mb-8 lg:mb-10 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="flex items-center space-x-4 md:space-x-5">
                            <!-- Avatar with subtle animation -->
                            <div class="relative group flex-shrink-0">
                                <div
                                    class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-800 flex items-center justify-center text-white font-bold text-xl shadow-md group-hover:shadow-lg transition-all duration-300">
                                    @if ($aspiration->author->profile_photo_path)
                                        <img class="w-full h-full rounded-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                                            src="{{ $aspiration->author->profile_photo_path }}"
                                            alt="{{ $aspiration->author->name }}'s profile photo">
                                    @else
                                        <span class="transform transition-transform duration-300 group-hover:scale-110">
                                            {{ strtoupper(substr($aspiration->author->name, 0, 1)) }}
                                            @if (strpos($aspiration->author->name, ' ') !== false)
                                                {{ strtoupper(substr($aspiration->author->name, strpos($aspiration->author->name, ' ') + 1, 1)) }}
                                            @endif
                                        </span>
                                    @endif
                                </div>
                                <!-- Online status indicator -->
                                <div
                                    class="absolute bottom-0 right-0 w-3.5 h-3.5 md:w-4 md:h-4 bg-green-400 dark:bg-green-500 rounded-full border-2 border-white dark:border-gray-900">
                                </div>
                            </div>

                            <!-- User details with better hierarchy -->
                            <div class="space-y-1.5">
                                <a href="#" rel="author"
                                    class="block text-xl md:text-2xl font-semibold text-gray-800 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                    {{ $aspiration->author->name }}
                                </a>

                                <!-- Role badge with verification -->
                                <div class="flex items-center space-x-2">
                                    @if ($aspiration->author->roles)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs md:text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ $aspiration->author->roles->first()->name }}
                                        </span>
                                    @endif

                                    <!-- Verification badge -->
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-500 dark:text-blue-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>

                                <!-- Date with icon -->
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <time pubdate datetime="{{ $aspiration->created_at->format('Y-m-d') }}"
                                        title="{{ $aspiration->created_at->format('F j, Y, g:i a') }}">
                                        {{ $aspiration->created_at->diffForHumans() }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </address>

                    <!-- Article Title with gradient text -->
                    <h1
                        class="mb-6 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white lg:leading-[1.2]">
                        <span class="bg-clip-text bg-gradient-to-r text-gray-900 dark:text-white">
                            {{ $aspiration->title }}
                        </span>
                    </h1>

                    <!-- Article meta -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $aspiration->author->name }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $aspiration->created_at->format('F j, Y') }}
                        </span>
                    </div>
                </header>

                <!-- Article Content with improved typography -->
                <div
                    class="tiptap-prose text-gray-900 dark:text-white">
                    {!! $aspiration->body !!}
                </div>
                @auth
                    @if ($aspiration->comments_enabled)
                        <livewire:aspiration.partial.aspiration-comments :slug="$aspiration->slug" />
                    @else
                        <div class="mt-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Komentar dinonaktifkan untuk artikel ini.
                            </p>
                        </div>
                    @endif
                @endauth
            </article>
        </div>
    </main>

    <!-- Enhanced Text-Only Related Articles Section -->
    <aside aria-label="Related articles"
        class="py-12 lg:py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div class="px-4 mx-auto max-w-screen-xl">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Berita serupa</h2>
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

                    @forelse ($relatedAspiration as $ra)
                        <livewire:news.news-card :blog="$ra" />
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
    </aside>
</div>
