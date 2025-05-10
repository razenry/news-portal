<main class="container mx-auto px-4 py-8">

    <div class="flex items-center justify-between gap-4 mb-3">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Hasil pencarian {{ $keyword }}</h2>

        <a href="/  " title=""
            class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
            Kembali
            <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 justify-center place-items-center">
        @forelse ($aspirations as $aspiration)
            <livewire:aspiration.partial.aspiration-card :aspiration="$aspiration" :type="$aspiration->type" />
        @empty
        @endforelse
    </div>
</main>
