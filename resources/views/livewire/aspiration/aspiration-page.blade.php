<div class="min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300">
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <!-- Enhanced User Info Section -->
                <header class="mb-8 lg:mb-10 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="flex items-center space-x-4 md:space-x-5">
                            <!-- Avatar with subtle animation -->
                            <div class="relative group flex-shrink-0">
                                <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-800 flex items-center justify-center text-white font-bold text-xl shadow-md group-hover:shadow-lg transition-all duration-300">
                                    @if($aspiration->author->profile_photo_path)
                                        <img class="w-full h-full rounded-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                                            src="{{ $aspiration->author->profile_photo_path }}"
                                            alt="{{ $aspiration->author->name }}'s profile photo">
                                    @else
                                        <span class="transform transition-transform duration-300 group-hover:scale-110">
                                            {{ strtoupper(substr($aspiration->author->name, 0, 1)) }}
                                            @if(strpos($aspiration->author->name, ' ') !== false)
                                                {{ strtoupper(substr($aspiration->author->name, strpos($aspiration->author->name, ' ') + 1, 1)) }}
                                            @endif
                                        </span>
                                    @endif
                                </div>
                                <!-- Online status indicator -->
                                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 md:w-4 md:h-4 bg-green-400 dark:bg-green-500 rounded-full border-2 border-white dark:border-gray-900"></div>
                            </div>
                            
                            <!-- User details with better hierarchy -->
                            <div class="space-y-1.5">
                                <a href="#" rel="author"
                                    class="block text-xl md:text-2xl font-semibold text-gray-800 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                    {{ $aspiration->author->name }}
                                </a>
                                
                                <!-- Role badge with verification -->
                                <div class="flex items-center space-x-2">
                                    @if($aspiration->author->roles)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs md:text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ $aspiration->author->roles->first()->name }}
                                        </span>
                                    @endif
                                    
                                    <!-- Verification badge -->
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                
                                <!-- Date with icon -->
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
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
                    <h1 class="mb-6 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white lg:leading-[1.2]">
                        <span class="bg-clip-text bg-gradient-to-r text-gray-900 dark:text-white">
                            {{ $aspiration->title }}
                        </span>
                    </h1>
                    
                    <!-- Article meta -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $aspiration->author->name }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $aspiration->created_at->format('F j, Y') }}
                        </span>
                    </div>
                </header>

                <!-- Article Content with improved typography -->
                <div class="prose max-w-none dark:prose-invert prose-lg 
                           prose-p:text-gray-700 dark:prose-p:text-gray-300 
                           prose-headings:text-gray-900 dark:prose-headings:text-white
                           prose-a:text-blue-600 dark:prose-a:text-blue-400
                           prose-img:rounded-xl prose-img:shadow-lg
                           prose-blockquote:border-l-4 prose-blockquote:border-blue-500 
                           prose-blockquote:bg-gray-50 dark:prose-blockquote:bg-gray-800
                           prose-pre:bg-gray-900 dark:prose-pre:bg-gray-800 text-gray-900 dark:text-white">
                    {!! $aspiration->body !!}
                </div>

                <!-- Enhanced Comments Section -->
                <section class="not-format mt-16">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                            </svg>
                            Discussion (20)
                        </h2>
                    </div>

                    <!-- Modern Comment Form -->
                    <form class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 transition-all duration-300 hover:shadow-lg">
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Share your thoughts</label>
                        <textarea id="comment" rows="5"
                            class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write a thoughtful comment..."></textarea>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex space-x-2">
                                <button type="button" class="p-2 text-gray-500 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                    </svg>
                                    <span class="sr-only">Attach file</span>
                                </button>
                                <button type="button" class="p-2 text-gray-500 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="sr-only">Upload image</span>
                                </button>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 transition-all duration-300 transform hover:-translate-y-0.5">
                                Post comment
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Comments List with improved styling -->
                    <div class="space-y-6">
                        <!-- Comment 1 -->
                        <article class="p-6 text-base bg-white rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                            <footer class="flex justify-between items-center mb-4">
                                <div class="flex items-center">
                                    <div class="inline-flex items-center mr-3">
                                        <img class="mr-3 w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Michael Gough</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-700 dark:text-gray-300">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the instruments for the UX designers. The knowledge of the design tools are as important as the creation of the design strategy.</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="mr-1.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"/>
                                    </svg>
                                    Helpful (12)
                                </button>
                                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="mr-1.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                    Reply
                                </button>
                            </div>
                        </article>

                        <!-- Comment 2 (Reply) -->
                        <article class="p-6 ml-6 lg:ml-12 text-base bg-white rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                            <footer class="flex justify-between items-center mb-4">
                                <div class="flex items-center">
                                    <div class="inline-flex items-center mr-3">
                                        <img class="mr-3 w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Jese Leos">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 dark:text-white">Jese Leos</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <time pubdate datetime="2022-02-12" title="February 12th, 2022">Feb. 12, 2022</time>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment2" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-700 dark:text-gray-300">Much appreciated! Glad you liked it ☺️</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="mr-1.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"/>
                                    </svg>
                                    Helpful (3)
                                </button>
                                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="mr-1.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                    Reply
                                </button>
                            </div>
                        </article>
                    </div>
                </section>
            </article>
        </div>
    </main>

    <!-- Enhanced Text-Only Related Articles Section -->
<aside aria-label="Related articles" class="py-12 lg:py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
    <div class="px-4 mx-auto max-w-screen-xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Related Articles</h2>
            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 inline-flex items-center">
                View all
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Article 1 -->
            <article class="group p-6 bg-white rounded-lg shadow-sm dark:bg-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                <div class="flex items-center mb-3">
                    <span class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-full">Office</span>
                    <span class="ml-2 text-xs text-gray-500 dark:text-gray-300">5 min read</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    <a href="#">Our First Office</a>
                </h3>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white">Jese Leos</p>
                        <p class="text-xs">Feb 15, 2022</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 2 -->
            <article class="group p-6 bg-white rounded-lg shadow-sm dark:bg-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                <div class="flex items-center mb-3">
                    <span class="inline-block px-3 py-1 text-xs font-medium text-white bg-purple-600 rounded-full">Design</span>
                    <span class="ml-2 text-xs text-gray-500 dark:text-gray-300">8 min read</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    <a href="#">Enterprise Design Tips</a>
                </h3>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white">Michael Gough</p>
                        <p class="text-xs">Mar 10, 2022</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 3 -->
            <article class="group p-6 bg-white rounded-lg shadow-sm dark:bg-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                <div class="flex items-center mb-3">
                    <span class="inline-block px-3 py-1 text-xs font-medium text-white bg-green-600 rounded-full">Partnership</span>
                    <span class="ml-2 text-xs text-gray-500 dark:text-gray-300">6 min read</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    <a href="#">We Partnered With Google</a>
                </h3>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white">Bonnie Green</p>
                        <p class="text-xs">Apr 22, 2022</p>
                    </div>
                </div>
            </article>
            
            <!-- Article 4 -->
            <article class="group p-6 bg-white rounded-lg shadow-sm dark:bg-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                <div class="flex items-center mb-3">
                    <span class="inline-block px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-full">Development</span>
                    <span class="ml-2 text-xs text-gray-500 dark:text-gray-300">4 min read</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    <a href="#">Our First Project With React</a>
                </h3>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white">Helene Engels</p>
                        <p class="text-xs">Jun 05, 2022</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</aside>
</div>