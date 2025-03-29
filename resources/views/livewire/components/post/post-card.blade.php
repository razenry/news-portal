<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Berita  -->
    @forelse ($posts as $post)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden min-h-[400px] flex flex-col">
            <!-- Gambar -->
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}"
                class="w-full h-48 object-cover">

            <div class="p-6 flex flex-col flex-grow">

                <!-- Judul -->
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white title-clamp">{{ $post->title }}
                </h3>

                <!-- Informasi Penulis & Tanggal -->
                <div class="text-gray-500 dark:text-gray-400 text-sm mb-2 flex flex-col">
                    <span class="font-semibold">{{ $post->author->name }}</span>
                    <div class="flex gap-1.5">
                        <span>{{ $post->created_at->format('d M Y') }}</span>
                        <span>|</span>
                        <span>{{ $post->category->name }}</span>
                    </div>
                </div>

                <!-- Deskripsi -->
                <p class="text-gray-600 dark:text-gray-300 mb-4 description-clamp">{{ $post->description }}</p>

                <!-- Hashtag -->
                <div class="flex flex-wrap gap-1 mb-4">
                    @foreach($post->tags as $tag)
                        <span class=" text-blue-600 dark:text-blue-300 text-sm ">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>

                <!-- Tombol Baca Selengkapnya -->
                <a href="#" title=""
                    class="flex items-center text-base font-medium text-blue-700 hover:underline dark:text-blue-500">
                    Baca selengkapnya
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
        </div>

    @empty
        <div class="flex flex-col items-center justify-center text-center shadow-lg py-3">
            <img src="https://placehold.co/300x200?text=No+News" alt="No News" class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Berita belum tersedia</h2>
            <p class="text-gray-600 dark:text-gray-400">Kami belum memiliki berita terbaru untuk ditampilkan saat
                ini.</p>
            <a href="#" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Segera
                hadir</a>
        </div>
    @endforelse
</div>