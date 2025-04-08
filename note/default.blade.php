<article class="p-6 text-base bg-white rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 hover:shadow-md
           @if($comment->parent_id) ml-4 sm:ml-6 lg:ml-12 @endif" x-data="{ showDeleteConfirm: false }">
    <footer class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <div class="inline-flex items-center mr-3">
                <div>
                    <p class="text-sm font-semibold text-gray-900 dark:text-white flex items-center gap-2 flex-wrap">
                        {{ $comment->user->name }}

                        {{-- Role Badge --}}
                        @foreach ($comment->user->roles as $role)
                            <span
                                class="text-[11px] font-semibold uppercase tracking-wide bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-100 px-2 py-0.5 rounded-md">
                                {{ $role->name }}
                            </span>
                        @endforeach

                        {{-- Author Badge --}}
                        @if($comment->user_id === $comment->aspiration->user_id)
                            <span
                                class="text-[11px] font-semibold uppercase tracking-wide bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-white px-2 py-0.5 rounded-md">
                                Penulis
                            </span>
                        @endif
                    </p>

                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                        <time pubdate datetime="{{ $comment->created_at->format('Y-m-d') }}"
                            title="{{ $comment->created_at->format('F j, Y') }}">
                            {{ $comment->created_at->diffForHumans() }}
                        </time>
                    </p>
                </div>
            </div>
        </div>


        @if(auth()->id() === $comment->user_id || auth()->id() === $comment->aspiration->user_id)
            <div class="relative">
                <button @click="showDeleteConfirm = !showDeleteConfirm"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:focus:ring-gray-600"
                    type="button">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    <span class="sr-only">Delete comment</span>
                </button>

                <!-- Delete confirmation dropdown -->
                <div x-show="showDeleteConfirm" @click.away="showDeleteConfirm = false"
                    class="absolute right-0 z-10 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5"
                    style="display: none;">
                    <button wire:click="deleteComment({{ $comment->id }})"
                        class="block w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600">
                        Confirm Delete
                    </button>
                </div>
            </div>
        @endif
    </footer>

    <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>

    <div class="flex items-center mt-4 space-x-4">
        <button type="button" wire:click="reply({{ $comment->id }})"
            class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
            <svg class="mr-1.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
            </svg>
            Reply
        </button>
    </div>
</article>

@if($comment->replies->count())
    <div class="space-y-4 sm:space-y-6 mt-4 sm:mt-6">
        @foreach($comment->replies as $reply)
            @include('livewire.aspiration.partial.aspiration-comments', ['comment' => $reply])
        @endforeach
    </div>
@endif
