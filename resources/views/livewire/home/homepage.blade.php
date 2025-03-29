<main class="container mx-auto px-4 py-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <livewire:components.carousel />   
        <!-- Side -->
        <div class="space-y-2">
            <div class="flex items-center justify-between gap-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kata mereka</h2>

                <a href="#" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 justify-center place-items-center">


                @forelse ($aspirations as $aspiration)
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800
                         dark:border-gray-700 h-full flex flex-col">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $aspiration->title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                            {{ $aspiration->description }}
                        </p>
                        <div class="">
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700
                                 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                                 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>

                @empty
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800
                         dark:border-gray-700 h-full flex flex-col">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Noteworthy technology acquisitions 2021
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                            This is another example with different content, which might be longer or shorter than the first
                            one.
                            But the card size remains the same.
                        </p>
                        <div class="">
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700
                                 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                                 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>

                @endforelse


            </div>
        </div>

    </div>

    <section class="bg-white dark:bg-gray-900 my-8 antialiased  md:py-8">
        <div class="mx-auto max-w-screen-xl 2xl:px-0 space-y-2">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kategori berita</h2>

                <a href="#" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Lihat semua
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                @forelse($categories as $category)
                    <a href="#" 
                        class="flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-3 w-full hover:bg-gray-50 dark:text-gray-900 dark:border-gray-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-lg">
                        <img class="h-6 w-6 shrink-0" aria-hidden="true"
                            src="{{ asset('storage/' . $category->icon) }}" />
                        <span class="text-sm text-gray-900 font-bold">{{ $category->name }}</span>
                    </a>
                @empty
                    <a href="#" 
                        class="flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-3 w-full hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 shadow-lg">
                        <svg class="h-6 w-6 shrink-0 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-900">Computer &amp; Office</span>
                    </a>
                @endforelse
            
            </div>
            
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="mt-12">
        <div class="flex items-center justify-between gap-4 mb-3">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Berita terkini</h2>

            <a href="#" title=""
                class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                Lihat semua
                <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>

            <livewire:components.post.post-card paginate="8"/>

    </section>

    <style>
        .title-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .description-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</main>