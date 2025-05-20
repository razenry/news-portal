<main class="container mx-auto px-4 py-4">

    <section class="bg-white dark:bg-gray-900 my-4 antialiased  md:py-4">
        <div class="mx-auto max-w-screen-xl 2xl:px-0 space-y-2">
            <div class="flex items-center justify-between gap-4 ">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Semua kategori</h2>

                <a href="{{ route('home') }}"
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Kembali
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

            <livewire:components.category.category-card />

        </div>
    </section>
</main>
