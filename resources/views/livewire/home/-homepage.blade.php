<div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Insights</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Stay in the know with insights from industry experts.
            </p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($posts as $key => $post)

                <!-- Card -->
                <a class="group flex flex-col focus:outline-hidden" href="{{ $post->slug }}">
                    <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                        <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                            src="{{ asset('storage/' . $post->image) }}" alt="Blog Image">
                        <span
                            class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                            {{ $post->category->name }}
                        </span>
                    </div>

                    <div class="mt-7">
                        <h3
                            class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                            {{ $post->title }}
                        </h3>
                        <p class="mt-3 text-gray-800 dark:text-neutral-200">

                            {{ $post->created_at->format('M d, Y') }}
                        </p>
                        <p
                            class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                            Read more
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </p>
                    </div>
                </a>
                <!-- End Card -->
            @endforeach

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
</div>


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
            <div class="text-center">
                <h1 class="text-4xl sm:text-6xl font-bold text-gray-800 dark:text-gray-200">
                    Insights
                </h1>

                <p class="mt-3 text-gray-600 dark:text-gray-400">
                    Stay in the know with insights from industry experts.
                </p>

                <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                    <!-- Form -->
                    <form>
                        <div
                            class="relative z-10 flex gap-x-3 p-3 bg-white border border-gray-200 rounded-lg shadow-lg shadow-gray-100 dark:bg-gray-900 dark:border-gray-700 dark:shadow-gray-900/20">
                            <div class="w-full">
                                <label for="hs-search-article-1"
                                    class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                        class="sr-only">Search article</span></label>
                                <input type="email" name="hs-search-article-1" id="hs-search-article-1"
                                    class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-transparent dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                                    placeholder="Search article">
                            </div>
                            <div>
                                <a class="size-11 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="#">
                                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->

                    <!-- SVG Element -->
                    <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                        <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                        </svg>
                    </div>
                    <!-- End SVG Element -->

                    <!-- SVG Element -->
                    <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                        <svg class="w-40 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                        </svg>
                    </div>
                    <!-- End SVG Element -->
                </div>

                <div class="mt-10 sm:mt-20">

                    @foreach ($categories as $key => $category)

                        <a class="m-1 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                            href="#">
                            <img class="shrink-0 size-4" src="{{ asset('storage/' . $category->icon) }}" alt="" srcset="">
                            {{ $category->name }}
                        </a>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->