@php
    $isReply = $comment->parent_id !== null;
@endphp

<article
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-lg shadow-sm transition-all duration-200 hover:shadow p-4 md:p-5 {{ $isReply ? 'ml-3 md:ml-6' : 'ml-0' }}"
    x-data="{ showDeleteConfirm: false, showReplies: false, isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
    :class="{ 'border-blue-100 dark:border-blue-900': isHovered }">
    <!-- HEADER KOMENTAR - Simplified for mobile -->
    <div class="flex justify-between items-start mb-2 md:mb-3">
        <div class="flex items-start space-x-2 md:space-x-3">
            <!-- AVATAR - Smaller on mobile -->
            <img class="w-7 h-7 md:w-8 md:h-8 rounded-full object-cover flex-shrink-0"
                src="{{ $comment->user->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) . '&color=7F9CF5&background=EBF4FF' }}"
                alt="{{ $comment->user->name }}">

            <!-- NAMA & INFO - Optimized layout -->
            <div class="min-w-0 flex-1">
                <div class="flex flex-wrap gap-1 md:gap-2 items-center">
                    <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                        {{ $comment->user->name }}
                    </p>
                    @if ($comment->user_id === $comment->aspiration->user_id)
                        <span
                            class="text-xs font-medium bg-blue-50 dark:bg-blue-900 text-blue-600 dark:text-blue-100 rounded px-1.5 py-0.5">
                            Penulis
                        </span>
                    @endif
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">
                    <time datetime="{{ $comment->created_at->format('Y-m-d') }}">
                        {{ $comment->created_at->diffForHumans() }}
                    </time>
                    @if ($isReply)
                        <span class="hidden md:inline">•</span>
                        <span class="block md:inline mt-0.5 md:mt-0 md:ml-1">{{ __('Membalas') }}
                            {{ $comment->parent->user->name }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- AKSI DELETE - More compact -->
        @if (auth()->user())
            @if (auth()->id() === $comment->user_id ||
                    auth()->id() === $comment->aspiration->user_id ||
                    auth()->user()->hasRole('super_admin'))
                <div class="relative ml-2">
                    <button @click="showDeleteConfirm = !showDeleteConfirm"
                        class="p-1 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="{ 'text-gray-600 dark:text-gray-200': isHovered }">
                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>

                    <div x-show="showDeleteConfirm" @click.away="showDeleteConfirm = false" x-transition x-cloak
                        class="absolute right-0 mt-1 w-28 md:w-32 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-10">
                        <button wire:click="deleteComment({{ $comment->id }})"
                            class="w-full px-3 py-1.5 text-xs md:text-sm text-left text-red-600 dark:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <svg class="w-3.5 h-3.5 md:w-4 md:h-4 inline mr-1.5 -mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- KONTEN KOMENTAR - Better spacing for mobile -->
    <div class="pl-9 md:pl-11">
        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed break-words">
            {{ $comment->content }}
        </p>

        <!-- AKSI: Balas & Lihat Balasan - More compact on mobile -->
        <div class="flex items-center mt-2 md:mt-3 space-x-3 md:space-x-4">
            @if (!$isReply)
                <button type="button" wire:click="reply({{ $comment->id }})"
                    class="text-xs font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                    </svg>
                    <span class="whitespace-nowrap">Balas</span>
                </button>
            @endif

            @if ($comment->replies->count())
                <button @click="showReplies = !showReplies"
                    class="text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-300 flex items-center">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5 transition-transform duration-200"
                        :class="{ 'rotate-180': showReplies }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span x-text="showReplies ? 'Sembunyikan' : `({{ $comment->replies->count() }}) Balasan`"
                        class="whitespace-nowrap"></span>
                </button>
            @endif
        </div>
    </div>

    <!-- LIST BALASAN - Better mobile indentation -->
    @if ($comment->replies->count())
        <div x-show="showReplies" x-collapse x-cloak
            class="mt-2 md:mt-3 pl-4 md:pl-6 border-l border-gray-100 dark:border-gray-700">
            <div class="space-y-2 md:space-y-3">
                @foreach ($comment->replies as $reply)
                    @include('livewire.aspiration.partial.aspiration-comments', ['comment' => $reply])
                @endforeach
            </div>
        </div>
    @endif
</article>
