<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'News Portal' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        <style>
            .tiptap-prose {
                @apply prose prose-lg max-w-none dark:prose-invert overflow-x-auto;
            }

            /* Reset semua anak agar tidak kacau */
            .tiptap-prose * {
                all: revert;
            }

            /* Styling ulang satu-satu */
            .tiptap-prose h1 {
                @apply text-4xl font-bold tracking-tight text-gray-900 dark:text-white mb-4;
            }

            .tiptap-prose h2 {
                @apply text-3xl font-semibold tracking-tight text-gray-900 dark:text-white mt-8 mb-4;
            }

            .tiptap-prose h3 {
                @apply text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mt-6 mb-3;
            }

            .tiptap-prose h4 {
                @apply text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-6 mb-2;
            }

            .tiptap-prose p {
                @apply text-gray-700 dark:text-gray-300 mb-4 leading-relaxed;
            }

            .tiptap-prose a {
                @apply text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 underline;
            }

            .tiptap-prose ul {
                @apply list-disc list-inside mb-4 text-gray-700 dark:text-gray-300;
            }

            .tiptap-prose ol {
                @apply list-decimal list-inside mb-4 text-gray-700 dark:text-gray-300;
            }

            .tiptap-prose li {
                @apply mb-2;
            }

            .tiptap-prose strong {
                @apply font-bold text-gray-900 dark:text-white;
            }

            .tiptap-prose em {
                @apply italic text-gray-700 dark:text-gray-300;
            }

            .tiptap-prose blockquote {
                @apply border-l-4 border-blue-600 dark:border-blue-400 pl-6 italic text-gray-700 dark:text-gray-300 my-6;
                overflow-wrap: break-word;
                word-break: break-word;
            }

            .tiptap-prose pre {
                @apply bg-gray-100 dark:bg-gray-900 rounded-lg p-4 overflow-x-auto my-6 text-sm font-mono text-gray-800 dark:text-gray-200;
            }

            .tiptap-prose code {
                @apply bg-gray-200 dark:bg-gray-700 rounded px-1 py-0.5 text-pink-600 dark:text-pink-400;
            }

            .tiptap-prose table {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                display: block;
                @apply my-6;
            }

            .tiptap-prose th {
                @apply border-b font-semibold p-2 text-left;
            }

            .tiptap-prose td {
                @apply border-t p-2 text-gray-700 dark:text-gray-300;
            }

            .tiptap-prose img {
                @apply rounded-xl shadow-lg w-full max-h-[480px] object-cover my-6;
            }

            .tiptap-prose iframe {
                width: 100%;
                max-width: 100%;
                aspect-ratio: 16/9;
                border-radius: 0.75rem;
                box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
                overflow: hidden;
                margin: 2rem 0;
            }

            .tiptap-prose hr {
                @apply border-t border-gray-300 dark:border-gray-600 my-8;
            }

            .tiptap-prose .toc {
                @apply bg-gray-100 dark:bg-gray-800 rounded-lg p-4 my-6;
            }
        </style>
    @else
        <style>

        </style>
    @endif
</head>

<body class="bg-white dark:bg-gray-900">


    <livewire:layout.navbar />

    <div class="mt-14">
        {{ $slot ?? 'Not Found' }}
    </div>

    <livewire:layout.footer />

    @livewireScripts
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> -->
</body>

</html>
