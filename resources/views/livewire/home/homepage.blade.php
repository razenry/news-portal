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