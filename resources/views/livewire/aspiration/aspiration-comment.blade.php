<div class="relative w-full">
    <!-- Comment Section (scrollable area) -->
    <section id="comment-section"
        class="not-format mt-12 md:mt-16 max-h-[65vh] md:max-h-[70vh] overflow-y-auto px-4 md:px-6 space-y-6">

        <!-- Section Title -->
        <div class="flex justify-between items-center mb-6 md:mb-8 sticky top-0 bg-white dark:bg-gray-800 z-10 p-4">
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                <svg class="w-5 h-5 md:w-6 md:h-6 mr-2 text-blue-500 dark:text-blue-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                        clip-rule="evenodd" />
                </svg>
                Diskusi ({{ $aspiration->comment->count() }})

                <!-- Buat Ayok sampaikan aspirasi mu, belum punya akun? ayo daftar -->

            </h2>
        </div>

        @guest
            <div
                class="mb-6 md:mb-8 p-5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm flex items-start gap-4">

                <!-- Icon -->
                <div class="p-2.5 rounded-lg bg-white dark:bg-gray-700">
                    <svg class="w-8 h-8 md:w-10 md:h-10 mr-2 text-blue-500 dark:text-blue-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Ingin ikut berkomentar?
                    </h3>

                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1 leading-relaxed">
                        Daftar atau login terlebih dahulu untuk menyampaikan aspirasi dan berdiskusi dengan nyaman.
                    </p>

                    <div class="flex flex-wrap items-center gap-3 mt-4">
                        <a href="{{ route('filament.admin.auth.login') }}"
                            class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition-all duration-200 shadow-sm">
                            Login
                        </a>

                        <a href="{{ route('filament.admin.auth.register') }}"
                            class="px-4 py-2 rounded-lg border border-blue-300 dark:border-blue-500 text-blue-600 dark:text-blue-400 text-sm font-medium hover:bg-blue-50 dark:hover:bg-gray-700 transition-all duration-200">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        @endguest


        <!-- Comment List -->
        <div wire:poll.60s class="space-y-5">
            @foreach ($comments as $comment)
                @include('livewire.aspiration.partial.aspiration-comments', ['comment' => $comment])
            @endforeach
        </div>
    </section>

    <!-- Sticky Comment Form -->
    @auth
        <div
            class="sticky bottom-0 w-full bg-white dark:bg-gray-800 shadow-lg border-t border-gray-200 dark:border-gray-600 z-20 px-4 md:px-6 py-4">
            <form wire:submit.prevent="addComment" class="space-y-2">
                <label for="comment" class="block text-sm font-medium text-gray-900 dark:text-white">
                    @if ($parentId)
                        Membalas <strong class="text-blue-600 dark:text-blue-400">
                            {{ optional(\App\Models\CommentAspiration::find($parentId))->user->name }}
                        </strong>
                    @else
                        Berikan pendapatmu
                    @endif
                </label>

                <textarea id="comment" wire:model.defer="content" rows="3"
                    class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Tulis komentar kamu..."></textarea>

                @error('content')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="flex justify-between items-center pt-2">
                    @if ($parentId)
                        <button type="button" wire:click="$set('parentId', null)"
                            class="text-sm text-gray-500 hover:underline dark:text-gray-300">
                            Batalkan balasan
                        </button>
                    @endif

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition duration-300 disabled:opacity-50"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>Kirim</span>

                        <svg wire:loading class="ml-2 w-4 h-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    @endauth
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('focus-comment', () => {
                document.getElementById('comment').focus();
            });

            Livewire.on('comment-added', () => {
                const section = document.getElementById('comment-section');
                section.scrollTo({
                    top: section.scrollHeight,
                    behavior: 'smooth'
                });
            });

            Livewire.on('comment-deleted', () => {
                Toastify({
                    text: "Komentar berhasil dihapus",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#10B981",
                }).showToast();
            });
        });
    </script>
@endpush
