<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 justify-center place-items-center">

    @forelse ($aspirations as $aspiration)
        <div class="max-w-sm w-full h-full p-6 bg-white border border-gray-300 rounded-xl shadow-xl transition-transform transform hover:scale-105 dark:bg-gray-800 dark:border-gray-700 flex flex-col">
            <a href="#">
                <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $aspiration->title }}
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                {{ $aspiration->description }}
            </p>
            <div class="mt-auto">
                <a href="{{ route('aspiration.show', $aspiration->slug) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg shadow-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Baca selengkapnya
                    <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

    @empty
        <div class="max-w-sm w-full h-full p-6 bg-white border border-gray-300 rounded-xl shadow-xl transition-transform transform hover:scale-105 dark:bg-gray-800 dark:border-gray-700 flex flex-col">
            <a href="#">
                <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Noteworthy technology acquisitions 2021
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 flex-grow">
                This is another example with different content, which might be longer or shorter than the first one.
                But the card size remains the same.
            </p>
            <div class="mt-auto">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg shadow-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Baca selengkapnya
                    <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    @endforelse
</div>