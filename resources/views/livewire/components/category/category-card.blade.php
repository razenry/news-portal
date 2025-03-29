<div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @forelse($categories as $category)
        <a href="#"
            class="flex items-center gap-3 rounded-xl border border-gray-300 bg-white px-5 py-4 w-full shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="h-8 w-8 shrink-0 rounded-full" aria-hidden="true" src="{{ asset('storage/' . $category->icon) }}"
                alt="{{ $category->name }}" />
            <span class="text-base font-semibold text-gray-900 dark:text-white">{{ $category->name }}</span>
        </a>
    @empty
        <a href="#"
            class="flex items-center gap-3 rounded-xl border border-gray-300 bg-white px-5 py-4 w-full shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <svg class="h-8 w-8 shrink-0 text-gray-600 dark:text-gray-300" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z">
                </path>
            </svg>
            <span class="text-base font-semibold text-gray-900 dark:text-white">Computer &amp; Office</span>
        </a>
    @endforelse
</div>